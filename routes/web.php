<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiattoController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\CountController;



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

// return count of both entities
Route::get('/', [App\Http\Controllers\CountController::class, 'count']);

// PIATTI CONTROLLER ROUTES
Route::get('/listapiatti', [App\Http\Controllers\PiattoController::class, 'index']);
Route::get('/aggiungi_piatto', [App\Http\Controllers\PiattoController::class, 'create']);
Route::post('/aggiungi_piatto', [App\Http\Controllers\PiattoController::class, 'store']);
Route::get('/dettaglipiatto/{codice_piatto}', [App\Http\Controllers\PiattoController::class, 'show']);
Route::get('/modificapiatto/{codice_piatto}', [App\Http\Controllers\PiattoController::class, 'edit']);
Route::post('/modificapiatto/{codice_piatto}', [App\Http\Controllers\PiattoController::class, 'update']);
Route::get('/cancella_piatto/{codice_piatto}', [App\Http\Controllers\PiattoController::class, 'destroy']);

// INGREDIENTI CONTROLLER ROUTES
Route::get('/listaingredienti', [App\Http\Controllers\IngredienteController::class, 'index']);
Route::get('/dettagliingrediente/{codice_ingrediente}', [App\Http\Controllers\IngredienteController::class, 'show']);
Route::get('/crea_modifica_ingrediente', [App\Http\Controllers\IngredienteController::class, 'create']);
Route::get('/crea_modifica_ingrediente/{codice_ingrediente}', [App\Http\Controllers\IngredienteController::class, 'edit']);
Route::post('/crea_modifica_ingrediente', [App\Http\Controllers\IngredienteController::class, 'store']);
Route::get('/cancella_ingrediente/{codice_ingrediente}', [App\Http\Controllers\IngredienteController::class, 'destroy']);








