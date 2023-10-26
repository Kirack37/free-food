<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\OrderHistory;
use App\Models\RecipeIngredient;

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
            $comprarMarket = $this->buyMarket($missingIngredients);
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
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $missingIngredients = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->quantity > $ingredientStore->quantity_available
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->id,
                        'quantity' => $ingredientRecipe->quantity - $ingredientStore->quantity_available
                    ];
                    $missingIngredients[] = $ingredientsFaltante;
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $missingIngredients;
    }
    private function buyMarket($missingIngredients)
    {
        // Lógica para comprobar si tenemos los ingredients necesarios
        // $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $missingIngredients = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->quantity > $ingredientStore->quantity_available
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->id,
                        'quantity' => $ingredientRecipe->quantity - $ingredientStore->quantity_available
                    ];
                    $missingIngredients[] = $ingredientsFaltante;
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $missingIngredients;
    }
    private function checkIngredients($recipe)
    {
        // Lógica para comprobar si tenemos los ingredients necesarios
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $missingIngredients = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->quantity > $ingredientStore->quantity_available
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->id,
                        'quantity' => $ingredientRecipe->quantity - $ingredientStore->quantity_available
                    ];
                    $missingIngredients[] = $ingredientsFaltante;
                } else {
                    $ingredientStore->quantity_available =
                        $ingredientStore->quantity_available - $ingredientRecipe->quantity;
                    $ingredientStore->save();
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
