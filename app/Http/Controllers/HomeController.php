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
        $ingredientsFaltantes = $this->checkIngredients($recipeElegida);
        if (count($ingredientsFaltantes) > 0) {
            $comprarMarket = $this->buyMarket($ingredientsFaltantes);
        } else {
            $this->subtractIngredients($recipeElegida);
        }

        // Devolvemos la respuesta según haya o no ingredients
        return response()->json(['recipe' => $recipeElegida, 'ingredientsFaltantes' => $ingredientsFaltantes]);
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
        $ingredientsFaltantes = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->cantidad > $ingredientStore->cantidad_disponible
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->id,
                        'cantidad' => $ingredientRecipe->cantidad - $ingredientStore->cantidad_disponible
                    ];
                    $ingredientsFaltantes[] = $ingredientsFaltante;
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $ingredientsFaltantes;
    }
    private function buyMarket($ingredientsFaltantes)
    {
        // Lógica para comprobar si tenemos los ingredients necesarios
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $ingredientsFaltantes = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->cantidad > $ingredientStore->cantidad_disponible
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->id,
                        'cantidad' => $ingredientRecipe->cantidad - $ingredientStore->cantidad_disponible
                    ];
                    $ingredientsFaltantes[] = $ingredientsFaltante;
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $ingredientsFaltantes;
    }
    private function checkIngredients($recipe)
    {
        // Lógica para comprobar si tenemos los ingredients necesarios
        $ingredientsRecipe = RecipeIngredient::where('recipe_id', $recipe)->get();
        $ingredientsFaltantes = [];
        if (isset($ingredientsRecipe)) {

            // Comprobamos en la store
            foreach ($ingredientsRecipe as $ingredientRecipe) {
                $ingredientStore = Store::where('ingredient_id', $ingredientRecipe->id)->first();
                // Comprobamos que el ingredient exista en la store
                if (
                    isset($ingredientStore) &&
                    $ingredientRecipe->cantidad > $ingredientStore->cantidad_disponible
                ) {
                    // Pusheamos a un array single y luego al total
                    $ingredientsFaltante = [
                        'ingredient' => $ingredientRecipe->id,
                        'cantidad' => $ingredientRecipe->cantidad - $ingredientStore->cantidad_disponible
                    ];
                    $ingredientsFaltantes[] = $ingredientsFaltante;
                } else {
                    $ingredientStore->cantidad_disponible =
                        $ingredientStore->cantidad_disponible - $ingredientRecipe->cantidad;
                    $ingredientStore->save();
                }
            }
        }
        // Devolvemos los ingredients restantes (los que nos faltan en la store)
        return $ingredientsFaltantes;
    }
    private function getOrdersHistory()
    {
        // Historial de orders sin realizar
        $ordersHistory = OrderHistory::where('realizado', 0)->get();
        $orders = [];
        foreach ($ordersHistory as $order) {
            $orders[] = $order->recipe->nombre;
        }

        return $orders;
    }
}
