<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view ('welcome');
});
Route::get('/checkout', function () {
    return 'Ini adalah halaman Checkout';
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/cart', [OrderController::class, 'index']);
