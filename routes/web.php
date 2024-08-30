<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{id}', [TransaksiController::class, 'getOrderDetails'])->name('transaksi.details');
