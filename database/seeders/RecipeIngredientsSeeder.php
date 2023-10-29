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
        // We initialize ingredients.
        // We check all the ingredients and if one is missed, the ingredient seeder is executed again.
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
        // We initialize recipes.
        // We check all the recipes and if one is missed, the recipe seeder is executed again.
        $chicken_salad = Recipe::where('slug', 'chicken-salad')->first();
        $chicken_rice = Recipe::where('slug', 'chicken-rice-with-vegetables')->first();
        $roasted_potatoes = Recipe::where('slug', 'roasted-potatoes-with-cheese')->first();
        $tomato_salad = Recipe::where('slug', 'tomato-salad-with-cheese')->first();
        $grilled_meat = Recipe::where('slug', 'grilled-meat-with-onion')->first();
        $burguer = Recipe::where('slug', 'burguer')->first();
        if(!isset($chicken_salad) ||!isset($chicken_rice) || !isset($roasted_potatoes)
        ||!isset($tomato_salad) || !isset($grilled_meat) || !isset($burguer)) {
            $this->call([
                RecipesSeeder::class,
            ]);
        }

        $chicken_salad_db = RecipeIngredient::where('recipe_id', $chicken_salad->id)->first();
        // We check if the recipe_ingredient is in the DB
        if(!isset($chicken_salad_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $chicken_salad->id,
                'ingredient_id' => $chicken->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $chicken_salad->id,
                'ingredient_id' => $lettuce->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $chicken_salad->id,
                'ingredient_id' => $lemon->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $chicken_salad->id,
                'ingredient_id' => $onion->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $chicken_rice_db = RecipeIngredient::where('recipe_id', $chicken_rice->id)->first();
        // We check if the recipe_ingredient is in the DB
        if(!isset($chicken_rice_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $chicken_rice->id,
                'ingredient_id' => $chicken->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $chicken_rice->id,
                'ingredient_id' => $rice->id,
                'quantity' => 3,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $chicken_rice->id,
                'ingredient_id' => $tomato->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $chicken_rice->id,
                'ingredient_id' => $onion->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
        $roasted_potatoes_db = RecipeIngredient::where('recipe_id', $roasted_potatoes->id)->first();
        // We check if the recipe_ingredient is in the DB
        if(!isset($roasted_potatoes_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $roasted_potatoes->id,
                'ingredient_id' => $potato->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $roasted_potatoes->id,
                'ingredient_id' => $cheese->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $roasted_potatoes->id,
                'ingredient_id' => $ketchup->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $salad_tomato_db = RecipeIngredient::where('recipe_id', $tomato_salad->id)->first();
        // We check if the recipe_ingredient is in the DB
        if(!isset($salad_tomato_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $tomato_salad->id,
                'ingredient_id' => $lettuce->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $tomato_salad->id,
                'ingredient_id' => $cheese->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $tomato_salad->id,
                'ingredient_id' => $tomato->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $grilled_meat_db = RecipeIngredient::where('recipe_id', $grilled_meat->id)->first();
        // We check if the recipe_ingredient is in the DB
        if(!isset($grilled_meat_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $grilled_meat->id,
                'ingredient_id' => $meat->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $grilled_meat->id,
                'ingredient_id' => $onion->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $grilled_meat->id,
                'ingredient_id' => $lemon->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $burguer_db = RecipeIngredient::where('recipe_id', $burguer->id)->first();
        // We check if the recipe_ingredient is in the DB
        if(!isset($burguer_db)) {
            RecipeIngredient::insert([
                'recipe_id' => $burguer->id,
                'ingredient_id' => $meat->id,
                'quantity' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $burguer->id,
                'ingredient_id' => $onion->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $burguer->id,
                'ingredient_id' => $tomato->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $burguer->id,
                'ingredient_id' => $ketchup->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $burguer->id,
                'ingredient_id' => $lettuce->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecipeIngredient::insert([
                'recipe_id' => $burguer->id,
                'ingredient_id' => $cheese->id,
                'quantity' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
