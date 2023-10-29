<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Store;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // We check if the ingredient is in the store
        $tomato = Ingredient::where('slug', 'tomato')->first();
        if(isset($tomato)) {
            $tomato_store = Store::where('ingredient_id', $tomato->id)->first();
        }
        if(!isset($tomato_store) && isset($tomato)) {
            Store::insert([
                'ingredient_id' => $tomato->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $lemon = Ingredient::where('slug', 'lemon')->first();
        if(isset($lemon)) {
            $lemon_store = Store::where('ingredient_id', $lemon->id)->first();
        }
        if(!isset($lemon_store) && isset($lemon)) {
            Store::insert([
                'ingredient_id' => $lemon->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $potato = Ingredient::where('slug', 'potato')->first();
        if(isset($potato)) {
            $potato_store = Store::where('ingredient_id', $potato->id)->first();
        }
        if(!isset($potato_store) && isset($potato)) {
            Store::insert([
                'ingredient_id' => $potato->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $rice = Ingredient::where('slug', 'rice')->first();
        if(isset($rice)) {
            $rice_store = Store::where('ingredient_id', $rice->id)->first();
        }
        if(!isset($rice_store) && isset($rice)) {
            Store::insert([
                'ingredient_id' => $rice->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $ketchup = Ingredient::where('slug', 'ketchup')->first();
        if(isset($ketchup)) {
            $ketchup_store = Store::where('ingredient_id', $ketchup->id)->first();
        }
        if(!isset($ketchup_store) && isset($ketchup)) {
            Store::insert([
                'ingredient_id' => $ketchup->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $lettuce = Ingredient::where('slug', 'lettuce')->first();
        if(isset($lettuce)) {
            $lettuce_store = Store::where('ingredient_id', $lettuce->id)->first();
        }
        if(!isset($lettuce_store) && isset($lettuce)) {
            Store::insert([
                'ingredient_id' => $lettuce->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $onion = Ingredient::where('slug', 'onion')->first();
        if(isset($onion)) {
            $onion_store = Store::where('ingredient_id', $onion->id)->first();
        }
        if(!isset($onion_store) && isset($onion)) {
            Store::insert([
                'ingredient_id' => $onion->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $cheese = Ingredient::where('slug', 'cheese')->first();
        if(isset($cheese)) {
            $cheese_store = Store::where('ingredient_id', $cheese->id)->first();
        }
        if(!isset($cheese_store) && isset($cheese)) {
            Store::insert([
                'ingredient_id' => $cheese->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $meat = Ingredient::where('slug', 'meat')->first();
        if(isset($meat)) {
            $meat_store = Store::where('ingredient_id', $meat->id)->first();
        }
        if(!isset($meat_store) && isset($meat)) {
            Store::insert([
                'ingredient_id' => $meat->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the store
        $chicken = Ingredient::where('slug', 'chicken')->first();
        if(isset($chicken)) {
            $chicken_store = Store::where('ingredient_id', $chicken->id)->first();
        }
        if(!isset($chicken_store) && isset($chicken)) {
            Store::insert([
                'ingredient_id' => $chicken->id,
                'created_at' => Carbon::now(),
            ]);
        }

    }
}
