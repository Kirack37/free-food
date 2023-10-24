<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ingrediente;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comprobamos que el ingrediente esté en DB
        $tomate = Ingrediente::where('slug', 'tomate')->first();
        if(!isset($tomate)) {
            Ingrediente::insert([
                'nombre' => 'Tomate',
                'slug' => Str::slug('Tomate'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $limon = Ingrediente::where('slug', 'limon')->first();
        if(!isset($limon)) {
            Ingrediente::insert([
                'nombre' => 'Limon',
                'slug' => Str::slug('Limon'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $patata = Ingrediente::where('slug', 'patata')->first();
        if(!isset($patata)) {
            Ingrediente::insert([
                'nombre' => 'Patata',
                'slug' => Str::slug('Patata'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $arroz = Ingrediente::where('slug', 'arroz')->first();
        if(!isset($arroz)) {
            Ingrediente::insert([
                'nombre' => 'Arroz',
                'slug' => Str::slug('Arroz'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $ketchup = Ingrediente::where('slug', 'ketchup')->first();
        if(!isset($ketchup)) {
            Ingrediente::insert([
                'nombre' => 'Ketchup',
                'slug' => Str::slug('Ketchup'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $lechuga = Ingrediente::where('slug', 'lechuga')->first();
        if(!isset($lechuga)) {
            Ingrediente::insert([
                'nombre' => 'Lechuga',
                'slug' => Str::slug('Lechuga'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $cebolla = Ingrediente::where('slug', 'cebolla')->first();
        if(!isset($cebolla)) {
            Ingrediente::insert([
                'nombre' => 'Cebolla',
                'slug' => Str::slug('Cebolla'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $queso = Ingrediente::where('slug', 'queso')->first();
        if(!isset($queso)) {
            Ingrediente::insert([
                'nombre' => 'Queso',
                'slug' => Str::slug('Queso'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $carne = Ingrediente::where('slug', 'carne')->first();
        if(!isset($carne)) {
            Ingrediente::insert([
                'nombre' => 'Carne',
                'slug' => Str::slug('Carne'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que el ingrediente esté en DB
        $pollo = Ingrediente::where('slug', 'pollo')->first();
        if(!isset($pollo)) {
            Ingrediente::insert([
                'nombre' => 'Pollo',
                'slug' => Str::slug('Pollo'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
