<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

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
Route::get('/', function(){
    return redirect('/orders');
});
Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
Route::get('/orders/{order_id}', [OrdersController::class, 'getOrderItems'])->name('order');
