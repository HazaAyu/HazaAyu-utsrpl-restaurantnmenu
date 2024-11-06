<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Menu
Route::resource('menus', MenuController::class);

// Route untuk Kategori
Route::resource('categories', CategoryController::class);

// Route untuk Pesanan
Route::resource('orders', OrderController::class);
// Route::resource('orders', OrderController::class);
