<?php

use App\Http\Controllers\OrderDeliveryController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderTransportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/report', [HomeController::class, 'report'])->name('report');

//ORDER DETAILS
Route::resource('order', OrderDetailController::class);

//ORDER DETAILS
Route::resource('transport', OrderTransportController::class);
Route::get('/transport/{id}/create', [OrderTransportController::class, 'create'])->name('transport.create');

//DELIVERY DETAILS
Route::resource('delivery', OrderDeliveryController::class);
Route::get('/delivery/{id}/create', [OrderDeliveryController::class, 'create'])->name('delivery.create');
Route::get('/delivery/{id}/view', [OrderDeliveryController::class, 'view'])->name('delivery.view');
Route::resource('user', UserController::class);




Route::get('migrate', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('migrate');
});


Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = public_path('/storage');
    echo symlink($target, $link);
    // echo "symbolic link created successfully";
});
