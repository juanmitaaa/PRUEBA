<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TicketController;
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
    return redirect('/login');
});
 
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('incidences', IncidenceController::class);
    Route::resource('manufacturers', ManufacturerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('states', StateController::class);
    Route::resource('tickets', TicketController::class);
  


});
  Route::get('/showstate/{incidence}',[IncidenceController::class, 'showState'])->name('incidences.showstate');  
    Route::post('/changestate',[IncidenceController::class, 'changeState'])->name('incidences.changestate');
    Route::post('/notifycustomer',[IncidenceController::class, 'notifyCustomer'])->name('incidences.notifycustomer');
//Route::resource('users', 'UserController');