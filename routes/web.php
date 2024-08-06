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




use App\Http\Controllers\ClientsController ;
Route::get('clients', [ClientsController::class,'index'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::post('/clients/store', [ClientsController::class, 'create'])->name('clients.store');
Route::get('/clients/show/{id}', [ClientsController::class, 'show'])->name('clients.show');
Route::get('/clients/edit/{id}', [ClientsController::class, 'edit'])->name('clients.edit');
Route::put('/clients/update/{id}', [ClientsController::class, 'update'])->name('clients.update');
Route::get('/clients/{id}/destroy', [ClientsController::class, 'destroy'])->name('clients.destroy');

use App\Http\Controllers\InteractionsController;
Route::get('interactions', [InteractionsController::class,'index'])->name('interactions.index');
Route::get('/interactions/create', [InteractionsController::class, 'create'])->name('interactions.create');
Route::get('/interactions/show/{id}', [InteractionsController::class, 'show'])->name('interactions.show');
Route::get('/interacions/edit/{id}', [InteractionsController::class, 'edit'])->name('interactions.edit');
Route::put('/interactions/update/{id}', [InteractionsController::class, 'update'])->name('interactions.update');
Route::get('/interactions/{id}/destroy', [InteractionsController::class, 'destroy'])->name('interactions.destroy');

use App\Http\Controllers\ContratsController;
Route::get('contrats', [ContratsController::class,'index'])->name('contrats.index');
Route::get('/contrats/create', [ContratsController::class, 'create'])->name('contrats.create');
Route::get('/contrats/show/{id}', [ContratsController::class, 'show'])->name('contrats.show');
Route::get('/contrats/edit/{id}', [ContratsController::class, 'edit'])->name('contrats.edit');
Route::put('/contrats/update/{id}', [ContratsController::class, 'update'])->name('contrats.update');
Route::get('/contrats/{id}/destroy', [ContratsController::class, 'destroy'])->name('contrats.destroy');



use App\Http\Controllers\UsersController;
Route::get('users',[ UsersController::class,'index'])->name('users.index');
Route::get('/users/create', [usersController::class, 'create'])->name('users.create');
Route::get('/users/show/{id}', [usersController::class, 'show'])->name('users.show');
Route::get('/users/edit/{id}', [usersController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [usersController::class, 'update'])->name('users.update');
Route::get('/users/{id}/destroy', [usersController::class, 'destroy'])->name('users.destroy');


use App\Http\Controllers\LeadsController;
use Illuminate\Support\Facades\Auth;
Route::get('/leads',[ LeadsController::class,'index'])->name('leads.index');
Route::get('/leads/create', [LeadsController::class, 'create'])->name('leads.create');
Route::get('/leads/show/{id}', [LeadsController::class, 'show'])->name('leads.show');
Route::get('/leads/edit/{id}', [LeadsController::class, 'edit'])->name('leads.edit');
Route::put('/leads/update/{id}', [LeadsController::class, 'update'])->name('leads.update');
Route::get('/leads/{id}/destroy', [LeadsController::class, 'destroy'])->name('leads.destroy');


use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard.index');



Auth::Routes();
use App\Http\Controllers\HomeController;

//Route::post('home', [HomeController::class, 'index'])->name('home');


Route::match(['get', 'post'], '/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\AdminController;


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');
Route::get('/users/destroy', [AdminController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
Route::get('users/edit/{id}', [AdminController::class, 'usersedit'])->name('admin.users.edit');
Route::get('/settings', [AdminController::class, 'indexsettings'])->name('admin.settings.index');
Route::get('/settings/update/{id}', [AdminController::class, 'usersupdate'])->name('admin.users.update');
Route::get('/', [AdminController::class, 'admin'])->name('index');
});

use App\Http\Controllers\twilioServiceController;

Route::get('twilioService/send', [twilioServiceController::class, 'showsms'])->name('twilioService.form');
Route::post('twilioService/send', [twilioServiceController::class, 'sendSms'])->name('twilioService.send');

Route::get('/', function () {
    return view('temp.adm');
});



