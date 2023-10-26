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
        $salad_chicken = Recipe::where('slug', 'salad-de-chicken')->first();
        if(!isset($salad_chicken)) {
            Recipe::insert([
                'nombre' => 'Salad de chicken',
                'descripcion' => 'Salad de chicken con lettuce, cheese, chicken, tomato y unas gotitas de limón.',
                'tiempo_preparacion' => 15,
                'dificultad' => 'Fácil',
                'slug' => Str::slug('Salad de chicken'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $rice_chicken = Recipe::where('slug', 'rice-con-chicken-y-verduras')->first();
        if(!isset($rice_chicken)) {
            Recipe::insert([
                'nombre' => 'Rice con chicken y verduras',
                'descripcion' => 'Rice frito con chicken, onion y tomato. Se puede añadir salsa de soja para darle más gusto.',
                'tiempo_preparacion' => 20,
                'dificultad' => 'Media',
                'slug' => Str::slug('Rice con chicken y verduras'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $potatos_asadas = Recipe::where('slug', 'potatos-asadas-con-cheese')->first();
        if(!isset($potatos_asadas)) {
            Recipe::insert([
                'nombre' => 'Potatos asadas con cheese',
                'descripcion' => 'Potatos asadas con ketchup y cheese fundido encima. Echas en horno o Airfryer.',
                'tiempo_preparacion' => 25,
                'dificultad' => 'Fácil',
                'slug' => Str::slug('Potatos asadas con cheese'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $salad_tomato_cheese = Recipe::where('slug', 'salad-de-tomato-y-cheese')->first();
        if(!isset($salad_tomato_cheese)) {
            Recipe::insert([
                'nombre' => 'Salad de tomato y cheese',
                'descripcion' => 'Saludable salad con lettuce, tomato y cheese aliñada con sal, pimienta y orégano.',
                'tiempo_preparacion' => 15,
                'dificultad' => 'Fácil',
                'slug' => Str::slug('Salad de tomato y cheese'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $meat_parrilla = Recipe::where('slug', 'meat-a-la-parrilla-con-onion')->first();
        if(!isset($meat_parrilla)) {
            Recipe::insert([
                'nombre' => 'Meat a la parrilla con onion',
                'descripcion' => 'Filete de meat echo con onion caramelizada, hierbas provenzales y un poco de limón.',
                'tiempo_preparacion' => 60,
                'dificultad' => 'Difícil',
                'slug' => Str::slug('Meat a la parrilla con onion'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la recipe esté en DB
        $hamburguesa = Recipe::where('slug', 'hamburguesa-completa')->first();
        if(!isset($hamburguesa)) {
            Recipe::insert([
                'nombre' => 'Hamburguesa completa',
                'descripcion' => 'Hamburguesa con meat, tomato, cheese, lettuce y ketchup.',
                'tiempo_preparacion' => 30,
                'dificultad' => 'Media',
                'slug' => Str::slug('Hamburguesa completa'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}