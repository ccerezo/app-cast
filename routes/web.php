<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TallaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('categorias', CategoriaController::class)->names('categorias');

Route::resource('bodegas', BodegaController::class)->names('bodegas');

Route::resource('colors', ColorController::class)->names('colors');

Route::resource('lineas', LineaController::class)->names('lineas');

Route::resource('marcas', MarcaController::class)->names('marcas');

Route::resource('modelos', ModeloController::class)->names('modelos');

Route::resource('tallas', TallaController::class)->names('tallas');

Route::resource('productos', ProductoController::class)->names('productos');
