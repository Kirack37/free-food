<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\RecipeIngredient;

class RecipeIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inicializamos todos los ingredients.
        // Sabemos que están creados porque primero se ejecuta el seeder de ingredients
        // Aun así, comprobamos y si falta alguna, lanzamos seeder ingredients
        $tomato = Ingredient::where('slug', 'tomato')->first();
        $lemon = Ingredient::where('slug', 'lemon')->first();
        $potato = Ingredient::where('slug', 'potato')->first();
        $rice = Ingredient::where('slug', 'rice')->first();
        $ketchup = Ingredient::where('slug', 'ketchup')->first();
        $lettuce = Ingredient::where('slug', 'lettuce')->first();
        $onion = Ingredient::where('slug', 'onion')->first();
        $cheese = Ingredient::where('slug', 'cheese')->first();
        $meat = Ingredient::where('slug', 'meat')->first();
        $chicken = Ingredient::where('slug', 'chicken')->first();
        if(!isset($tomato) ||!isset($lemon) || !isset($potato) ||!isset($rice)
        || !isset($ketchup) || !isset($lettuce) ||!isset($onion) || !isset($cheese)
        || !isset($meat) || !isset($chicken)) {
            $this->call([
                IngredientsSeeder::class,
            ]);
        }
        // Inicializamos todos los ingredients.
        // Sabemos que están creados porque primero se ejecuta el seeder de recipes
        // Aun así, comprobamos y si falta alguna, lanzamos seeder recipes
        $salad_chicken = Recipe::where('slug', 'chicken-salad')->first();
        $rice_chicken = Recipe::where('slug', 'chicken-rice-with-vegetables')->first();
        $potatos_asadas = Recipe::where('slug', 'roasted-potatoes-with-cheese')->first();
        $salad_tomato_cheese = Recipe::where('slug', 'tomato-salad-with-cheese')->first();
        $meat_parrilla = Recipe::where('slug', 'grilled-meat-with-onion')->first();
        $hamburguesa = Recipe::where('slug', 'burguer')->first();
        if(!isset($salad_chicken) ||!isset($rice_chicken) || !isset($potatos_asadas)
        ||!isset($salad_tomato_cheese) || !isset($meat_parrilla) || !isset($hamburguesa)) {
            $this->call([
                RecipesSeeder::class,
            ]);
        }

        $salad_chicken_db = RecipeIngredient::where('recipe_id', $salad_chicken->id)->first();
        // Comprobamos que la recipe_ingredient esté en DB
        if(!isset($salad_chicken_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $salad_chicken->id,
                'ingredient_id' => $chicken->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $salad_chicken->id,
                'ingredient_id' => $lettuce->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $salad_chicken->id,
                'ingredient_id' => $lemon->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $salad_chicken->id,
                'ingredient_id' => $onion->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $rice_chicken_db = RecipeIngredient::where('recipe_id', $rice_chicken->id)->first();
        // Comprobamos que la recipe_ingredient esté en DB
        if(!isset($rice_chicken_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $rice_chicken->id,
                'ingredient_id' => $chicken->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $rice_chicken->id,
                'ingredient_id' => $rice->id,
                'cantidad' => 3,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $rice_chicken->id,
                'ingredient_id' => $tomato->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $rice_chicken->id,
                'ingredient_id' => $onion->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
        $potatos_asadas_db = RecipeIngredient::where('recipe_id', $potatos_asadas->id)->first();
        // Comprobamos que la recipe_ingredient esté en DB
        if(!isset($potatos_asadas_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $potatos_asadas->id,
                'ingredient_id' => $potato->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $potatos_asadas->id,
                'ingredient_id' => $cheese->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $potatos_asadas->id,
                'ingredient_id' => $ketchup->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $salad_tomato_db = RecipeIngredient::where('recipe_id', $salad_tomato_cheese->id)->first();
        // Comprobamos que la recipe_ingredient esté en DB
        if(!isset($salad_tomato_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $salad_tomato_cheese->id,
                'ingredient_id' => $lettuce->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $salad_tomato_cheese->id,
                'ingredient_id' => $cheese->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $salad_tomato_cheese->id,
                'ingredient_id' => $tomato->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $meat_parrilla_db = RecipeIngredient::where('recipe_id', $meat_parrilla->id)->first();
        // Comprobamos que la recipe_ingredient esté en DB
        if(!isset($meat_parrilla_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $meat_parrilla->id,
                'ingredient_id' => $meat->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $meat_parrilla->id,
                'ingredient_id' => $onion->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $meat_parrilla->id,
                'ingredient_id' => $lemon->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $hamburguesa_db = RecipeIngredient::where('recipe_id', $hamburguesa->id)->first();
        // Comprobamos que la recipe_ingredient esté en DB
        if(!isset($hamburguesa_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $hamburguesa->id,
                'ingredient_id' => $meat->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $hamburguesa->id,
                'ingredient_id' => $onion->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $hamburguesa->id,
                'ingredient_id' => $tomato->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $hamburguesa->id,
                'ingredient_id' => $ketchup->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $hamburguesa->id,
                'ingredient_id' => $lettuce->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $hamburguesa->id,
                'ingredient_id' => $cheese->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
