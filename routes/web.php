<?php

use App\Models\RecipeIngredient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Escritorio general
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/order-dish', [HomeController::class, 'orderDish']);
    Route::resource('recipes', RecipeController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('store', StoreController::class);
    Route::resource('recipe_ingredients', RecipeIngredient::class);
    Route::resource('orders', OrderHistoryController::class);
    Route::get('/get-orders-history', [HomeController::class, 'getOrdersHistory']);
    Route::get('/get-ingredients', [HomeController::class, 'getIngredients']);
});
