<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ImagenesSeeder extends Seeder
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
        $salad_chicken = Recipe::where('slug', 'salad-de-chicken')->first();
        if(isset($salad_chicken)) {
            $salad_chicken->update([
                'image_path' => 'images/salad_chicken.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $rice_chicken = Recipe::where('slug', 'rice-con-chicken-y-verduras')->first();
        if(isset($rice_chicken)) {
            $rice_chicken->update([
                'image_path' => 'images/rice_chicken.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $potatos_asadas = Recipe::where('slug', 'potatos-asadas-con-cheese')->first();
        if(isset($potatos_asadas)) {
            $potatos_asadas->update([
                'image_path' => 'images/potatos_asadas.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $salad_tomato_cheese = Recipe::where('slug', 'salad-de-tomato-y-cheese')->first();
        if(isset($salad_tomato_cheese)) {
            $salad_tomato_cheese->update([
                'image_path' => 'images/salad_tomato_cheese.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $meat_parrilla = Recipe::where('slug', 'meat-a-la-parrilla-con-onion')->first();
        if(isset($meat_parrilla)) {
            $meat_parrilla->update([
                'image_path' => 'images/meat_parrilla.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingredient esté en DB
        $hamburguesa = Recipe::where('slug', 'hamburguesa-completa')->first();
        if(isset($hamburguesa)) {
            $hamburguesa->update([
                'image_path' => 'images/hamburguesa.webp',
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
