<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Store;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Models\RecipeIngredient;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Main action to order a new dish.
     */
    public function orderDish()
    {
        // Choose a random recipe
        $data = $this->chooseRandomRecipe();

        // Check if we have the all the ingredients for the chosen recipe
        $needToBuy = true;
        while ($needToBuy) {
            $missingIngredients = $this->checkIngredients($data['recipe']);
            if (count($missingIngredients) > 0) {
                $boughtIngredients = $this->buyIngredients($missingIngredients);
                $missingIngredients = $this->checkIngredients($data['recipe']);
                if (count($missingIngredients) == 0) {
                    $needToBuy = false;
                }
            } else {
                $boughtIngredients = 0;
                $needToBuy = false;
            }
        }
        // We substract the ingredients when we know that we have all of them
        $this->subtractIngredients($data['recipe']);
        $orderToFinish = OrderHistory::where('id', $data['order'])->first();
        // We use the sleep because of the quickness of the petition,
        // only to make all the logics more visual to the user
        sleep(3);
        // We update the order history
        if (isset($orderToFinish)) {
            $orderToFinish->finished = 1;
            $orderToFinish->updated_at = Carbon::now();
            $orderToFinish->save();
        }

        // Return the response in json format
        return response()->json(['ordersHistory' => $orderToFinish, 'marketBuy', $boughtIngredients]);
    }

    /**
     * Action to choose a random recipe.
     */
    private function chooseRandomRecipe()
    {
        // We transfor the recipes into array in order to use array_rand
        $recipes = Recipe::all()->toArray();
        $chosenRecipe = $recipes[array_rand($recipes)];
        // We create the register of the new order
        $orderHistory = OrderHistory::insertGetId([
            'finished' => 0,
            'recipe_id' => $chosenRecipe['id'],
            'quantity' => 1,
            'created_at' => Carbon::now(),
        ]);
        // Return the response with the object and array we need
        return ['recipe' => $chosenRecipe, 'order' => $orderHistory];
    }

    /**
     * Action to substract ingredients from the store
     */
    private function subtractIngredients($recipe)
    {
        // We check the ingredients we need
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        if (isset($ingredientsRecipe)) {
            // Check in the store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->ingredient_id)->first();
                if (isset($ingredientStore)) {
                    // Substract the ingredients from the store
                    $ingredientStore->quantity_available =
                        $ingredientStore->quantity_available - $ingredientRecipe->quantity;
                }
            }
        } else {
            return "The recipe doesn't exists.";
        }
        return "Recipe ready";
    }
    /**
     * Action to buy ingredients in the market.
     */
    private function buyIngredients($missingIngredients)
    {
        // We need to do a foreach to search all the ingredients we need t buy
        $Ingredientssold = [];
        foreach ($missingIngredients as $ingredient) {
            $ingredientToBuy = Ingredient::where('id', $ingredient['ingredient'])->first();
            // Make the API call
            if (isset($ingredientToBuy)) {
                $successfulBuy = false;
                // If the buy isn't successful, we make the API call again
                while (!$successfulBuy) {
                    $response = Http::get(
                        'https://recruitment.alegra.com/api/farmers-market/buy',
                        ['ingredient' => $ingredientToBuy->slug]
                    );
                    // We get the quantity sold
                    if ($response->successful()) {
                        $quantitySold = $response->json()['quantitySold'];

                        // Update the store with the new ingredients
                        if ($quantitySold > 0) {
                            $ingredientSold = [
                                'quantitySold' => $quantitySold,
                                'ingredient'  => $ingredientToBuy->name,
                                'message'   =>  'Successful buy'
                            ];
                            $storeIngredient = Store::where('ingredient_id', $ingredientToBuy->id)->first();
                            if (isset($storeIngredient)) {
                                $storeIngredient->quantity_available =
                                    $storeIngredient->quantity_available + $quantitySold;
                                $storeIngredient->save();
                                $successfulBuy = true;
                            } else {
                                return "The ingredient doesn't exist in the store";
                            }
                        } else {
                            // If there's no ingredients in the market
                            $ingredientSold = [
                                'quantitySold' => $quantitySold,
                                'ingredient'  => $ingredientToBuy->name,
                                'message'   =>  'No existences available in the market'
                            ];
                        }
                    }
                }
                $Ingredientssold[] = $ingredientSold;
            } else {
                return 'Wrong ingredient';
            }
        }
        return response()->json($Ingredientssold);
    }
    /**
     * Check the ingredient in the store.
     */
    private function checkIngredients($recipe)
    {
        // Logic to check if we have enough ingredients
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $missingIngredients = [];
        if (isset($ingredientsRecipe)) {

            // Checking the store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->ingredient_id)->first();
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->quantity > $ingredientStore->quantity_available
                ) {
                    // We push into a single array and into the total to have a key-value
                    // array with the id and quantity of the ingredient
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->ingredient_id,
                        'quantity' => $ingredientRecipe->quantity - $ingredientStore->quantity_available
                    ];
                    $missingIngredients[] = $ingredientsFaltante;
                }
            }
        }
        // We return the array
        return $missingIngredients;
    }
    /**
     * Get the orders history.
     */
    public function getOrdersHistory()
    {
        // We get all the orders
        $ordersHistory = OrderHistory::orderByDesc('created_at')->get();
        $orders = [];
        foreach ($ordersHistory as $order) {
            $orders[] = [
                'name' => $order->recipe->name,
                'created_at' => $order->created_at->toDateTimeString(),
                'quantity' => $order->quantity,
                'updated_at' => isset($order->updated_at) ? $order->updated_at->toDateTimeString() : "Not finished yet",
            ];
        }
        // Return in JSON
        return response()->json(['ordersHistory' => $orders]);
    }
    /**
     * Get the ingredients in the store.
     */
    public function getIngredients()
    {
        // We get all the ingredients and return them
        return Store::with('ingredient')->get();
    }
}
