<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            IngredientsSeeder::class,
            RecipesSeeder::class,
            RecipeIngredientsSeeder::class,
            StoreSeeder::class,
            ImagesSeeder::class,
        ]);
    }
}
