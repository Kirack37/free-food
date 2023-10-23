<?php

namespace Database\Seeders;

use App\Models\Receta;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comprobamos que la receta esté en DB
        $receta = Receta::where('slug', 'ensalada_de_pollo')->first();
        if(!isset($receta)) {
            Receta::insert([
                'name' => 'Ensalada de Pollo',
                'slug' => Str::slug('Ensalada de Pollo'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
