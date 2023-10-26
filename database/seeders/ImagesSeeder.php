<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** INGREDIENTES **/
        // Comprobamos que el ingredient esté en DB
        $tomato = Ingredient::where('slug', 'tomato')->first();
        if(isset($tomato)) {
            $tomato->update([
                'image_path' => 'images/tomato.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $lemon = Ingredient::where('slug', 'lemon')->first();
        if(isset($lemon)) {
            $lemon->update([
                'image_path' => 'images/lemon.webp',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $potato = Ingredient::where('slug', 'potato')->first();
        if(isset($potato)) {
            $potato->update([
                'image_path' => 'images/potato.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $rice = Ingredient::where('slug', 'rice')->first();
        if(isset($rice)) {
            $rice->update([
                'image_path' => 'images/rice.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $ketchup = Ingredient::where('slug', 'ketchup')->first();
        if(isset($ketchup)) {
            $ketchup->update([
                'image_path' => 'images/ketchup.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $lettuce = Ingredient::where('slug', 'lettuce')->first();
        if(isset($lettuce)) {
            $lettuce->update([
                'image_path' => 'images/lettuce.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $onion = Ingredient::where('slug', 'onion')->first();
        if(isset($onion)) {
            $onion->update([
                'image_path' => 'images/onion.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $cheese = Ingredient::where('slug', 'cheese')->first();
        if(isset($cheese)) {
            $cheese->update([
                'image_path' => 'images/cheese.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $meat = Ingredient::where('slug', 'meat')->first();
        if(isset($meat)) {
            $meat->update([
                'image_path' => 'images/meat.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $chicken = Ingredient::where('slug', 'chicken')->first();
        if(isset($chicken)) {
            $chicken->update([
                'image_path' => 'images/chicken.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        /** RECETAS **/
        // Comprobamos que el ingredient esté en DB
        $chicken_salad = Recipe::where('slug', 'chicken-salad')->first();
        if(isset($chicken_salad)) {
            $chicken_salad->update([
                'image_path' => 'images/chicken_salad.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $chicken_rice = Recipe::where('slug', 'chicken-rice-with-vegetables')->first();
        if(isset($chicken_rice)) {
            $chicken_rice->update([
                'image_path' => 'images/chicken_rice.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $roasted_potatoes = Recipe::where('slug', 'roasted-potatoes-with-cheese')->first();
        if(isset($roasted_potatoes)) {
            $roasted_potatoes->update([
                'image_path' => 'images/roasted_potatoes.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $tomato_salad = Recipe::where('slug', 'tomato-salad-with-cheese')->first();
        if(isset($tomato_salad)) {
            $tomato_salad->update([
                'image_path' => 'images/tomato_salad.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $grilled_meat = Recipe::where('slug', 'grilled-meat-with-onion')->first();
        if(isset($grilled_meat)) {
            $grilled_meat->update([
                'image_path' => 'images/grilled_meat.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $burguer = Recipe::where('slug', 'burguer')->first();
        if(isset($burguer)) {
            $burguer->update([
                'image_path' => 'images/burguer.webp',
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
