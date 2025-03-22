<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return 'Ini adalah halaman Route Utama';
});
Route::get('/products', function () {
    return 'Ini adalah halaman Product';
});
Route::get('/cart', function () {
    return 'Ini adalah halaman Keranjang';
});
Route::get('/checkout', function () {
    return 'Ini adalah halaman Checkout';
});

Route::resource('products-resource', ProductController::class);
