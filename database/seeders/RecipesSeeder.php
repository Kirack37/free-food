<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comprobamos que la recipe esté en DB
        $chicken_salad = Recipe::where('slug', 'chicken-salad')->first();
        if(!isset($chicken_salad)) {
            Recipe::insert([
                'name' => 'Chicken salad',
                'description' => 'Chicken salad with lettuce, cheese, chicken, tomato and lemon drops.',
                'preparation_time' => 15,
                'difficulty' => 'Easy',
                'slug' => Str::slug('Chicken salad'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $chicken_rice = Recipe::where('slug', 'chicken-rice-with-vegetables')->first();
        if(!isset($chicken_rice)) {
            Recipe::insert([
                'name' => 'Chicken rice with vegetables',
                'description' => 'Chicken rice with onion and tomato. You can add soy sauce to give it more flavor.',
                'preparation_time' => 20,
                'difficulty' => 'Medium',
                'slug' => Str::slug('Chicken rice with vegetables'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $roasted_potatoes = Recipe::where('slug', 'roasted-potatoes-with-cheese')->first();
        if(!isset($roasted_potatoes)) {
            Recipe::insert([
                'name' => 'Roasted potatoes with cheese',
                'description' => 'Roasted potatoes with ketchup and melted cheese. Made with the oven or with Airfryer.',
                'preparation_time' => 25,
                'difficulty' => 'Easy',
                'slug' => Str::slug('Roasted potatoes with cheese'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $tomatoes_salad = Recipe::where('slug', 'tomato-salad-with-cheese')->first();
        if(!isset($tomatoes_salad)) {
            Recipe::insert([
                'name' => 'Tomato salad with cheese',
                'description' => 'Healthy salad with lettuce, tomato and cheese seasoned with salt, pepper and oregano.',
                'preparation_time' => 15,
                'difficulty' => 'Easy',
                'slug' => Str::slug('Tomato salad with cheese'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $grilled_meat = Recipe::where('slug', 'grilled-meat-with-onion')->first();
        if(!isset($grilled_meat)) {
            Recipe::insert([
                'name' => 'Grilled meat with onion',
                'description' => 'Meat steak made with caramelized onion, Provençal herbs and a little lemon.',
                'preparation_time' => 60,
                'difficulty' => 'Hard',
                'slug' => Str::slug('Grilled meat with onion'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $burguer = Recipe::where('slug', 'burguer')->first();
        if(!isset($burguer)) {
            Recipe::insert([
                'name' => 'Burguer',
                'description' => 'Delicious burguer with tomato, cheese, lettuce and ketchup.',
                'preparation_time' => 30,
                'difficulty' => 'Medium',
                'slug' => Str::slug('Burguer'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}