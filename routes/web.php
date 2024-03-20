<?php

use App\Http\Controllers\OrderDeliveryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderTransportController;

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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ORDER DETAILS
Route::resource('order', OrderDetailController::class);

//ORDER DETAILS
Route::resource('transport', OrderTransportController::class);
Route::get('/transport/{id}/create', [OrderTransportController::class, 'create'])->name('transport.create');

//DELIVERY DETAILS
Route::resource('delivery', OrderDeliveryController::class);
Route::get('/delivery/{id}/create', [OrderDeliveryController::class, 'create'])->name('delivery.create');
Route::get('/delivery/{id}/view', [OrderDeliveryController::class, 'view'])->name('delivery.view');
