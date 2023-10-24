<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Bodega;
use App\Models\Ingrediente;
use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comprobamos que el Bodega_bodega esté en DB
        $tomate = Ingrediente::where('slug', 'tomate')->first();
        if(isset($tomate)) {
            $tomate_bodega = Bodega::where('ingrediente_id', $tomate->id)->first();
        }
        if(!isset($tomate_bodega) && isset($tomate)) {
            Bodega::insert([
                'ingrediente_id' => $tomate->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $limon = Ingrediente::where('slug', 'limon')->first();
        if(isset($limon)) {
            $limon_bodega = Bodega::where('ingrediente_id', $limon->id)->first();
        }
        if(!isset($limon_bodega) && isset($limon)) {
            Bodega::insert([
                'ingrediente_id' => $limon->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $patata = Ingrediente::where('slug', 'patata')->first();
        if(isset($patata)) {
            $patata_bodega = Bodega::where('ingrediente_id', $patata->id)->first();
        }
        if(!isset($patata_bodega) && isset($patata)) {
            Bodega::insert([
                'ingrediente_id' => $patata->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $arroz = Ingrediente::where('slug', 'arroz')->first();
        if(isset($arroz)) {
            $arroz_bodega = Bodega::where('ingrediente_id', $arroz->id)->first();
        }
        if(!isset($arroz_bodega) && isset($arroz)) {
            Bodega::insert([
                'ingrediente_id' => $arroz->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $ketchup = Ingrediente::where('slug', 'ketchup')->first();
        if(isset($ketchup)) {
            $ketchup_bodega = Bodega::where('ingrediente_id', $ketchup->id)->first();
        }
        if(!isset($ketchup_bodega) && isset($ketchup)) {
            Bodega::insert([
                'ingrediente_id' => $ketchup->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $lechuga = Ingrediente::where('slug', 'lechuga')->first();
        if(isset($lechuga)) {
            $lechuga_bodega = Bodega::where('ingrediente_id', $lechuga->id)->first();
        }
        if(!isset($lechuga_bodega) && isset($lechuga)) {
            Bodega::insert([
                'ingrediente_id' => $lechuga->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $cebolla = Ingrediente::where('slug', 'cebolla')->first();
        if(isset($cebolla)) {
            $cebolla_bodega = Bodega::where('ingrediente_id', $cebolla->id)->first();
        }
        if(!isset($cebolla_bodega) && isset($cebolla)) {
            Bodega::insert([
                'ingrediente_id' => $cebolla->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $queso = Ingrediente::where('slug', 'queso')->first();
        if(isset($queso)) {
            $queso_bodega = Bodega::where('ingrediente_id', $queso->id)->first();
        }
        if(!isset($queso_bodega) && isset($queso)) {
            Bodega::insert([
                'ingrediente_id' => $tomate->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $carne = Ingrediente::where('slug', 'carne')->first();
        if(isset($carne)) {
            $carne_bodega = Bodega::where('ingrediente_id', $carne->id)->first();
        }
        if(!isset($carne_bodega) && isset($carne)) {
            Bodega::insert([
                'ingrediente_id' => $carne->id,
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la bodega esté en DB
        $pollo = Ingrediente::where('slug', 'pollo')->first();
        if(isset($pollo)) {
            $pollo_bodega = Bodega::where('ingrediente_id', $pollo->id)->first();
        }
        if(!isset($pollo_bodega) && isset($pollo)) {
            Bodega::insert([
                'ingrediente_id' => $pollo->id,
                'created_at' => Carbon::now(),
            ]);
        }

    }
}
