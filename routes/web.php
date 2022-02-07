<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'orders'], function () {
    Route::get('create/{product_id}', [OrderController::class, 'create'])->name('orders.create');
    Route::get('checkout/{order_id}', [CheckoutController::class, 'create'])->name('orders.checkout.create');
    Route::get('checkout/status/{id}', [CheckoutController::class, 'show']);
    Route::get('list', [OrderController::class, 'index'])->name('orders.list');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('orders.checkout.store');
    Route::post('create', [OrderController::class, 'store'])->name('orders.store');
});


