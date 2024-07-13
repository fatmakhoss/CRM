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

use App\Http\Controllers\InteractionsController;
Route::resource('interactions', InteractionsController::class);
use App\Http\Controllers\ContratsController;



use App\Http\Controllers\UsersController;
Route::resource('users', UsersController::class);

use App\Http\Controllers\LeadsController;
use Illuminate\Support\Facades\Auth;

Route::resource('leads', LeadsController::class);


use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



Auth::Routes();
use App\Http\Controllers\HomeController;

//Route::post('home', [HomeController::class, 'index'])->name('home');


Route::match(['get', 'post'], '/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\AdminController;


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
Route::get('/', [AdminController::class, 'admin'])->name('admin.dashboard');
Route::get('/users/destroy', [AdminController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
Route::get('users/edit/{id}', [AdminController::class, 'usersedit'])->name('admin.users.edit');
Route::get('/settings', [AdminController::class, 'indexsettings'])->name('admin.settings.index');
Route::get('/settings/update/{id}', [AdminController::class, 'settingsupdate'])->name('admin.users.update');
Route::get('/', [AdminController::class, 'admin'])->name('index');
});

use App\Http\Controllers\twilioServiceController;

Route::get('twilioService/send', [twilioServiceController::class, 'showsms'])->name('twilioService.form');
Route::post('twilioService/send', [twilioServiceController::class, 'sendSms'])->name('twilioService.send');

Route::get('/template', function () {
return view('template');
});

