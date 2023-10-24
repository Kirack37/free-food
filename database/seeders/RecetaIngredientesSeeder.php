<?php

namespace Database\Seeders;

use App\Models\Receta;
use App\Models\Ingrediente;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\RecetaIngrediente;

class RecetaIngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inicializamos todos los ingredientes.
        // Sabemos que están creados porque primero se ejecuta el seeder de ingredientes
        // Aun así, comprobamos y si falta alguna, lanzamos seeder ingredientes
        $tomate = Ingrediente::where('slug', 'tomate')->first();
        $limon = Ingrediente::where('slug', 'limon')->first();
        $patata = Ingrediente::where('slug', 'patata')->first();
        $arroz = Ingrediente::where('slug', 'arroz')->first();
        $ketchup = Ingrediente::where('slug', 'ketchup')->first();
        $lechuga = Ingrediente::where('slug', 'lechuga')->first();
        $cebolla = Ingrediente::where('slug', 'cebolla')->first();
        $queso = Ingrediente::where('slug', 'queso')->first();
        $carne = Ingrediente::where('slug', 'carne')->first();
        $pollo = Ingrediente::where('slug', 'pollo')->first();
        if(!isset($tomate) ||!isset($limon) || !isset($patata) ||!isset($arroz)
        || !isset($ketchup) || !isset($lechuga) ||!isset($cebolla) || !isset($queso)
        || !isset($carne) || !isset($pollo)) {
            $this->call([
                IngredientesSeeder::class,
            ]);
        }
        // Inicializamos todos los ingredientes.
        // Sabemos que están creados porque primero se ejecuta el seeder de recetas
        // Aun así, comprobamos y si falta alguna, lanzamos seeder recetas
        $ensalada_pollo = Receta::where('slug', 'ensalada-de-pollo')->first();
        $arroz_pollo = Receta::where('slug', 'arroz-con-pollo-y-verduras')->first();
        $patatas_asadas = Receta::where('slug', 'patatas-asadas-con-queso')->first();
        $ensalada_tomate_queso = Receta::where('slug', 'ensalada-de-tomate-y-queso')->first();
        $carne_parrilla = Receta::where('slug', 'carne-a-la-parrilla-con-cebolla')->first();
        $hamburguesa = Receta::where('slug', 'hamburguesa-completa')->first();
        if(!isset($ensalada_pollo) ||!isset($arroz_pollo) || !isset($patatas_asadas)
        ||!isset($ensalada_tomate_queso) || !isset($carne_parrilla) || !isset($hamburguesa)) {
            $this->call([
                RecetasSeeder::class,
            ]);
        }

        $ensalada_pollo_db = RecetaIngrediente::where('receta_id', $ensalada_pollo->id)->first();
        // Comprobamos que la receta_ingrediente esté en DB
        if(!isset($ensalada_pollo_db)) {
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_pollo->id,
                'ingrediente_id' => $pollo->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_pollo->id,
                'ingrediente_id' => $lechuga->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_pollo->id,
                'ingrediente_id' => $limon->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_pollo->id,
                'ingrediente_id' => $cebolla->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $arroz_pollo_db = RecetaIngrediente::where('receta_id', $arroz_pollo->id)->first();
        // Comprobamos que la receta_ingrediente esté en DB
        if(!isset($arroz_pollo_db)) {
            RecetaIngrediente::insert([
                'receta_id' => $arroz_pollo->id,
                'ingrediente_id' => $pollo->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $arroz_pollo->id,
                'ingrediente_id' => $arroz->id,
                'cantidad' => 3,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $arroz_pollo->id,
                'ingrediente_id' => $tomate->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $arroz_pollo->id,
                'ingrediente_id' => $cebolla->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
        $patatas_asadas_db = RecetaIngrediente::where('receta_id', $patatas_asadas->id)->first();
        // Comprobamos que la receta_ingrediente esté en DB
        if(!isset($patatas_asadas_db)) {
            RecetaIngrediente::insert([
                'receta_id' => $patatas_asadas->id,
                'ingrediente_id' => $patata->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $patatas_asadas->id,
                'ingrediente_id' => $queso->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $patatas_asadas->id,
                'ingrediente_id' => $ketchup->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $ensalada_tomate_db = RecetaIngrediente::where('receta_id', $ensalada_tomate_queso->id)->first();
        // Comprobamos que la receta_ingrediente esté en DB
        if(!isset($ensalada_tomate_db)) {
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_tomate_queso->id,
                'ingrediente_id' => $lechuga->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_tomate_queso->id,
                'ingrediente_id' => $queso->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $ensalada_tomate_queso->id,
                'ingrediente_id' => $tomate->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $carne_parrilla_db = RecetaIngrediente::where('receta_id', $carne_parrilla->id)->first();
        // Comprobamos que la receta_ingrediente esté en DB
        if(!isset($carne_parrilla_db)) {
            RecetaIngrediente::insert([
                'receta_id' => $carne_parrilla->id,
                'ingrediente_id' => $carne->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $carne_parrilla->id,
                'ingrediente_id' => $cebolla->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $carne_parrilla->id,
                'ingrediente_id' => $limon->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $hamburguesa_db = RecetaIngrediente::where('receta_id', $hamburguesa->id)->first();
        // Comprobamos que la receta_ingrediente esté en DB
        if(!isset($hamburguesa_db)) {
            RecetaIngrediente::insert([
                'receta_id' => $hamburguesa->id,
                'ingrediente_id' => $carne->id,
                'cantidad' => 2,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $hamburguesa->id,
                'ingrediente_id' => $cebolla->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $hamburguesa->id,
                'ingrediente_id' => $tomate->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $hamburguesa->id,
                'ingrediente_id' => $ketchup->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $hamburguesa->id,
                'ingrediente_id' => $lechuga->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
            RecetaIngrediente::insert([
                'receta_id' => $hamburguesa->id,
                'ingrediente_id' => $queso->id,
                'cantidad' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
