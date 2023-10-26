<?php

namespace App\Http\Controllers;

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
        // Lógica para obtener el historial de orders
        $ordersHistory = $this->getOrdersHistory();

        return view('home', ['ordersHistory' => $ordersHistory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function orderDish()
    {
        // Lógica para elegir aleatoriamente una recipe
        $recipeElegida = $this->chooseRandomRecipe();

        // Lógica para comprobar si disponemos de los ingredients
        $missingIngredients = $this->checkIngredients($recipeElegida);
        if (count($missingIngredients) > 0) {
            $comprarMarket = $this->buyIngredients($missingIngredients);
        } else {
            $this->subtractIngredients($recipeElegida);
        }

        // Devolvemos la respuesta según haya o no ingredients
        return response()->json(['recipe' => $recipeElegida, 'missingIngredients' => $missingIngredients]);
    }

    private function chooseRandomRecipe()
    {
        $recipes = Recipe::all()->toArray();
        return $recipes[array_rand($recipes)];
    }

    private function subtractIngredients($recipe)
    {
        // Lógica para comprobar si tenemos los ingredients necesarios
        dd('hay');
        // $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        // $missingIngredients = [];
        // if (isset($ingredientsRecipe)) {

        //     // Comprobamos en la store
        //     foreach ($ingredientsRecipe as $ingredientRecipe) {
        //         $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
        //         // Comprobamos que el ingredient exista en la store
        //         if (
        //             isset($ingredientStore) &&
        //             $ingredientRecipe->quantity > $ingredientStore->quantity_available
        //         ) {
        //             // Pusheamos a un array single y luego al total
        //             $ingredientsFaltante = [
        //                 'ingredient' => $ingredientRecipe->id,
        //                 'quantity' => $ingredientRecipe->quantity - $ingredientStore->quantity_available
        //             ];
        //             $missingIngredients[] = $ingredientsFaltante;
        //         }
        //     }
        // }
        // // Devolvemos los ingredients restantes (los que nos faltan en la store)
        // return $missingIngredients;
    }
    private function buyIngredients($missingIngredients)
    {
        /// Validamos el ingrediente que nos llega con los que acepta el mercado
        $Ingredientssold = [];
        foreach ($missingIngredients as $ingredient) {
            $ingredientName = Ingredient::where('id', $ingredient['ingredient'])->select('slug')->first();
            // Hacer la solicitud a la plaza de mercado
            if(isset($ingredientName)) {
                $response = Http::get(
                    'https://recruitment.alegra.com/api/farmers-market/buy',
                    ['ingredient' => $ingredientName->slug]
                );
                dd($response->json()['quantitySold']);

                if ($response->successful()) {
                    $quantitySold = $response->json()['quantitySold'];

                    // Actualizamos en db con la cantidad comprada
                    if ($quantitySold > 0) {
                        $ingredientSold = [
                            'quantitySold' => $quantitySold,
                            'message'   =>  'Successful buy'
                        ];
                    } else {
                        // Si no hay ingredientes
                        $ingredientSold = [
                            'quantitySold' => $quantitySold,
                            'message'   =>  'No existences available in the market'
                        ];
                    }
                } else {
                    $ingredientSold = [
                        'quantitySold' => $quantitySold,
                        'message'   =>  $response->message()
                    ];
                }

                $Ingredientssold[] = $ingredientSold;
            }else {
                return 'Wrong ingredient';
            }
        }
        dd($Ingredientssold);
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
                    }else {
                        return 0;
                    }
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $missingIngredients;
    }
    private function getOrdersHistory()
    {
        // Historial de orders sin realizar
        $ordersHistory = OrderHistory::where('finished', 0)->get();
        $orders = [];
        foreach ($ordersHistory as $order) {
            $orders[] = $order->recipe->nombre;
        }

        return $orders;
    }
}
