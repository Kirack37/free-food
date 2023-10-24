<?php

namespace Database\Seeders;

use App\Models\Receta;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comprobamos que la receta esté en DB
        $ensalada_pollo = Receta::where('slug', 'ensalada_de_pollo')->first();
        if(!isset($ensalada_pollo)) {
            Receta::insert([
                'name' => 'Ensalada de pollo',
                'slug' => Str::slug('Ensalada de pollo'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $arroz_pollo = Receta::where('slug', 'arroz_con_pollo_y_verduras')->first();
        if(!isset($arroz_pollo)) {
            Receta::insert([
                'name' => 'Arroz con pollo y verduras',
                'slug' => Str::slug('Arroz con pollo y verduras'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $patatas_asadas = Receta::where('slug', 'patatas_asadas_con_queso')->first();
        if(!isset($patatas_asadas)) {
            Receta::insert([
                'name' => 'Patatas asadas con queso',
                'slug' => Str::slug('Patatas asadas con queso'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $ensalada_tomate_queso = Receta::where('slug', 'ensalada_de_tomate_y_queso')->first();
        if(!isset($ensalada_tomate_queso)) {
            Receta::insert([
                'name' => 'Ensalada de tomate y queso',
                'slug' => Str::slug('Ensalada de tomate y queso'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $carne_parrilla = Receta::where('slug', 'carne_a_la_parrilla_con_cebolla')->first();
        if(!isset($carne_parrilla)) {
            Receta::insert([
                'name' => 'Carne a la parrilla con cebolla',
                'slug' => Str::slug('Carne a la parrilla con cebolla'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $hamburguesa = Receta::where('slug', 'hamburguesa_completa')->first();
        if(!isset($hamburguesa)) {
            Receta::insert([
                'name' => 'Hamburguesa completa',
                'slug' => Str::slug('Hamburguesa completa'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
