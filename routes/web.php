<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [HomeController::class, 'index']);

Route::get('orders/create/{product_id}', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders/create', [OrderController::class, 'store'])->name('orders.store');

Route::get('orders/checkout/{order_id}', [CheckoutController::class, 'create'])->name('orders.checkout.create');
Route::post('orders/checkout', [CheckoutController::class, 'store'])->name('orders.checkout.store');
