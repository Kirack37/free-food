<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ingrediente;
use App\Models\Receta;
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
        // Comprobamos que el ingrediente esté en DB
        $tomate = Ingrediente::where('slug', 'tomate')->first();
        if(isset($tomate)) {
            $tomate->update([
                'image_path' => 'images/tomate.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $limon = Ingrediente::where('slug', 'limon')->first();
        if(isset($limon)) {
            $limon->update([
                'image_path' => 'images/limon.webp',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $patata = Ingrediente::where('slug', 'patata')->first();
        if(isset($patata)) {
            $patata->update([
                'image_path' => 'images/patata.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $arroz = Ingrediente::where('slug', 'arroz')->first();
        if(isset($arroz)) {
            $arroz->update([
                'image_path' => 'images/arroz.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $ketchup = Ingrediente::where('slug', 'ketchup')->first();
        if(isset($ketchup)) {
            $ketchup->update([
                'image_path' => 'images/ketchup.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $lechuga = Ingrediente::where('slug', 'lechuga')->first();
        if(isset($lechuga)) {
            $lechuga->update([
                'image_path' => 'images/lechuga.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $cebolla = Ingrediente::where('slug', 'cebolla')->first();
        if(isset($cebolla)) {
            $cebolla->update([
                'image_path' => 'images/cebolla.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $queso = Ingrediente::where('slug', 'queso')->first();
        if(isset($queso)) {
            $queso->update([
                'image_path' => 'images/queso.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $carne = Ingrediente::where('slug', 'carne')->first();
        if(isset($carne)) {
            $carne->update([
                'image_path' => 'images/carne.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $pollo = Ingrediente::where('slug', 'pollo')->first();
        if(isset($pollo)) {
            $pollo->update([
                'image_path' => 'images/pollo.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        /** RECETAS **/
        // Comprobamos que el ingrediente esté en DB
        $ensalada_pollo = Receta::where('slug', 'ensalada-de-pollo')->first();
        if(isset($ensalada_pollo)) {
            $ensalada_pollo->update([
                'image_path' => 'images/ensalada_pollo.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $arroz_pollo = Receta::where('slug', 'arroz-con-pollo-y-verduras')->first();
        if(isset($arroz_pollo)) {
            $arroz_pollo->update([
                'image_path' => 'images/arroz_pollo.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $patatas_asadas = Receta::where('slug', 'patatas-asadas-con-queso')->first();
        if(isset($patatas_asadas)) {
            $patatas_asadas->update([
                'image_path' => 'images/patatas_asadas.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $ensalada_tomate_queso = Receta::where('slug', 'ensalada-de-tomate-y-queso')->first();
        if(isset($ensalada_tomate_queso)) {
            $ensalada_tomate_queso->update([
                'image_path' => 'images/ensalada_tomate_queso.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $carne_parrilla = Receta::where('slug', 'carne-a-la-parrilla-con-cebolla')->first();
        if(isset($carne_parrilla)) {
            $carne_parrilla->update([
                'image_path' => 'images/carne_parrilla.jpg',
                'updated_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $hamburguesa = Receta::where('slug', 'hamburguesa-completa')->first();
        if(isset($hamburguesa)) {
            $hamburguesa->update([
                'image_path' => 'images/hamburguesa.webp',
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
