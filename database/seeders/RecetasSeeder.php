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
        $ensalada_pollo = Receta::where('slug', 'ensalada-de-pollo')->first();
        if(!isset($ensalada_pollo)) {
            Receta::insert([
                'nombre' => 'Ensalada de pollo',
                'descripcion' => 'Ensalada de pollo con lechuga, queso, pollo, tomate y unas gotitas de limón.',
                'tiempo_preparacion' => 15,
                'dificultad' => 'Fácil',
                'slug' => Str::slug('Ensalada de pollo'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $arroz_pollo = Receta::where('slug', 'arroz-con-pollo-y-verduras')->first();
        if(!isset($arroz_pollo)) {
            Receta::insert([
                'nombre' => 'Arroz con pollo y verduras',
                'descripcion' => 'Arroz frito con pollo, cebolla y tomate. Se puede añadir salsa de soja para darle más gusto.',
                'tiempo_preparacion' => 20,
                'dificultad' => 'Media',
                'slug' => Str::slug('Arroz con pollo y verduras'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $patatas_asadas = Receta::where('slug', 'patatas-asadas-con-queso')->first();
        if(!isset($patatas_asadas)) {
            Receta::insert([
                'nombre' => 'Patatas asadas con queso',
                'descripcion' => 'Patatas asadas con ketchup y queso fundido encima. Echas en horno o Airfryer.',
                'tiempo_preparacion' => 25,
                'dificultad' => 'Fácil',
                'slug' => Str::slug('Patatas asadas con queso'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $ensalada_tomate_queso = Receta::where('slug', 'ensalada-de-tomate-y-queso')->first();
        if(!isset($ensalada_tomate_queso)) {
            Receta::insert([
                'nombre' => 'Ensalada de tomate y queso',
                'descripcion' => 'Saludable ensalada con lechuga, tomate y queso aliñada con sal, pimienta y orégano.',
                'tiempo_preparacion' => 15,
                'dificultad' => 'Fácil',
                'slug' => Str::slug('Ensalada de tomate y queso'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $carne_parrilla = Receta::where('slug', 'carne-a-la-parrilla-con-cebolla')->first();
        if(!isset($carne_parrilla)) {
            Receta::insert([
                'nombre' => 'Carne a la parrilla con cebolla',
                'descripcion' => 'Filete de carne echo con cebolla caramelizada, hierbas provenzales y un poco de limón.',
                'tiempo_preparacion' => 60,
                'dificultad' => 'Difícil',
                'slug' => Str::slug('Carne a la parrilla con cebolla'),
                'created_at' => Carbon::now(),
            ]);
        }
        // Comprobamos que la receta esté en DB
        $hamburguesa = Receta::where('slug', 'hamburguesa-completa')->first();
        if(!isset($hamburguesa)) {
            Receta::insert([
                'nombre' => 'Hamburguesa completa',
                'descripcion' => 'Hamburguesa con carne, tomate, queso, lechuga y ketchup.',
                'tiempo_preparacion' => 30,
                'dificultad' => 'Media',
                'slug' => Str::slug('Hamburguesa completa'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}