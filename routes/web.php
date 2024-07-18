<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorePriceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});





Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
});
Route::prefix('stores')->group(function () {
    Route::get('/', [StorePriceController::class, 'index'])->name('stores.index');
});
