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
     * Show the form for creating a new resource.
     */
    public function orderDish()
    {
        // Lógica para elegir aleatoriamente una recipe
        $data = $this->chooseRandomRecipe();

        // Lógica para comprobar si disponemos de los ingredients
        $needToBuy = true;
        while ($needToBuy) {
            $missingIngredients = $this->checkIngredients($data['recipe']);
            if (count($missingIngredients) > 0) {
                $this->buyIngredients($missingIngredients);
                $missingIngredients = $this->checkIngredients($data['recipe']);
                if (count($missingIngredients) == 0) {
                    $needToBuy = false;
                }
            } else {
                $needToBuy = false;
            }
        }
        $this->subtractIngredients($data['recipe']);
        $orderToFinish = OrderHistory::where('id', $data['order'])->first();
        // Para que de tiempo a recargar la tabla
        sleep(3);
        if (isset($orderToFinish)) {
            $orderToFinish->finished = 1;
            $orderToFinish->updated_at = Carbon::now();
            $orderToFinish->save();
        }

        // Devolvemos la respuesta
        return response()->json(['ordersHistory' => $orderToFinish]);
    }

    private function chooseRandomRecipe()
    {
        $recipes = Recipe::all()->toArray();
        $chosenRecipe = $recipes[array_rand($recipes)];
        $orderHistory = OrderHistory::insertGetId([
            'finished' => 0,
            'recipe_id' => $chosenRecipe['id'],
            'quantity' => 1,
            'created_at' => Carbon::now(),
        ]);
        return ['recipe' => $chosenRecipe, 'order' => $orderHistory];
    }

    private function subtractIngredients($recipe)
    {
        // Lógica para restar los componentes de la bodega
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        if (isset($ingredientsRecipe)) {
            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->ingredient_id)->first();
                if (isset($ingredientStore)) {
                    $ingredientStore->quantity_available =
                        $ingredientStore->quantity_available - $ingredientRecipe->quantity;
                }
            }
        } else {
            return "The recipe doesn't exists.";
        }
        return "Recipe ready";
    }
    private function buyIngredients($missingIngredients)
    {
        /// Validamos el ingrediente que nos llega con los que acepta el mercado
        $Ingredientssold = [];
        foreach ($missingIngredients as $ingredient) {
            $ingredientToBuy = Ingredient::where('id', $ingredient['ingredient'])->first();
            // Hacer la solicitud a la plaza de mercado
            if (isset($ingredientToBuy)) {
                $successfulBuy = false;
                while (!$successfulBuy) {
                    $response = Http::get(
                        'https://recruitment.alegra.com/api/farmers-market/buy',
                        ['ingredient' => $ingredientToBuy->slug]
                    );
                    if ($response->successful()) {
                        $quantitySold = $response->json()['quantitySold'];

                        // Actualizamos en db con la cantidad comprada
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
                            // Si no hay ingredientes
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
    private function checkIngredients($recipe)
    {
        // Lógica para comprobar si tenemos los ingredients necesarios
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $missingIngredients = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->ingredient_id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->quantity > $ingredientStore->quantity_available
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->ingredient_id,
                        'quantity' => $ingredientRecipe->quantity - $ingredientStore->quantity_available
                    ];
                    $missingIngredients[] = $ingredientsFaltante;
                } else {
                    if (isset($ingredientStore)) {
                        $ingredientStore->quantity_available =
                            $ingredientStore->quantity_available - $ingredientRecipe->quantity;
                        $ingredientStore->save();
                    } else {
                        return 0;
                    }
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $missingIngredients;
    }
    public function getOrdersHistory()
    {
        // Historial de orders sin realizar
        $ordersHistory = OrderHistory::orderByDesc('created_at')->get();
        $orders = [];
        foreach ($ordersHistory as $order) {
            $orders[] = [
                'name' => $order->recipe->name,
                'created_at' => $order->created_at->toDateTimeString(),
                'quantity' => $order->quantity,
                'updated_at' => isset($order->updated_at) ? $order->updated_at->toDateTimeString() : "",
            ];
        }

        return response()->json(['ordersHistory' => $orders]);
    }
    public function getIngredients()
    {
        // Historial de orders sin realizar
        $ingredientsStore = Store::with('ingredient')->get();

        return $ingredientsStore;
    }
}
