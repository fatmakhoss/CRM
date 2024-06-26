<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\ClientsController ;
Route::resource('clients', ClientsController::class);

use App\Http\Controllers\interactionsController;

Route::ressource('Interactions',InteractionsController::class);

use App\Http\Controllers\ContratsController;
Route::ressource('contrats', ContratsController::class);

use App\Http\Controllers\RendezVousController;
Route::ressource('RendezVous', RendezVousController::class);

