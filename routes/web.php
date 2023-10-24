<?php

use App\Models\RecetaIngrediente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\HistorialRecetasController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\IngredienteController;

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
    Route::post('/pedir-plato', [HomeController::class, 'pedirPlato']);
    Route::resource('recetas', RecetaController::class);
    Route::resource('ingredientes', IngredienteController::class);
    Route::resource('bodega', BodegaController::class);
    Route::resource('receta_ingredientes', RecetaIngrediente::class);
    Route::get('/historial-pedidos', [HomeController::class, 'index'])->name('historial-pedidos.index');
    Route::resource('historial_recetas', HistorialRecetasController::class);
});
