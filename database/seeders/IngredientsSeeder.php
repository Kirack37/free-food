<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // We check if the ingredient is in the DB
        $tomato = Ingredient::where('slug', 'tomato')->first();
        if(!isset($tomato)) {
            Ingredient::insert([
                'name' => 'Tomato',
                'slug' => Str::slug('Tomato'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $lemon = Ingredient::where('slug', 'lemon')->first();
        if(!isset($lemon)) {
            Ingredient::insert([
                'name' => 'Lemon',
                'slug' => Str::slug('Lemon'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $potato = Ingredient::where('slug', 'potato')->first();
        if(!isset($potato)) {
            Ingredient::insert([
                'name' => 'Potato',
                'slug' => Str::slug('Potato'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $rice = Ingredient::where('slug', 'rice')->first();
        if(!isset($rice)) {
            Ingredient::insert([
                'name' => 'Rice',
                'slug' => Str::slug('Rice'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $ketchup = Ingredient::where('slug', 'ketchup')->first();
        if(!isset($ketchup)) {
            Ingredient::insert([
                'name' => 'Ketchup',
                'slug' => Str::slug('Ketchup'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $lettuce = Ingredient::where('slug', 'lettuce')->first();
        if(!isset($lettuce)) {
            Ingredient::insert([
                'name' => 'Lettuce',
                'slug' => Str::slug('Lettuce'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $onion = Ingredient::where('slug', 'onion')->first();
        if(!isset($onion)) {
            Ingredient::insert([
                'name' => 'Onion',
                'slug' => Str::slug('Onion'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $cheese = Ingredient::where('slug', 'cheese')->first();
        if(!isset($cheese)) {
            Ingredient::insert([
                'name' => 'Cheese',
                'slug' => Str::slug('Cheese'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $meat = Ingredient::where('slug', 'meat')->first();
        if(!isset($meat)) {
            Ingredient::insert([
                'name' => 'Meat',
                'slug' => Str::slug('Meat'),
                'created_at' => Carbon::now(),
            ]);
        }
        // We check if the ingredient is in the DB
        $chicken = Ingredient::where('slug', 'chicken')->first();
        if(!isset($chicken)) {
            Ingredient::insert([
                'name' => 'Chicken',
                'slug' => Str::slug('Chicken'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
