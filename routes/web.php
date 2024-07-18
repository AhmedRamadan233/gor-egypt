<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorePriceController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/update/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('stores')->group(function () {
    Route::get('/', [StorePriceController::class, 'index'])->name('stores.index');
    Route::get('/price-form', [StorePriceController::class, 'showPriceForm'])->name('stores.showPriceForm');
    Route::get('/get-price', [StorePriceController::class, 'getProductPrice'])->name('stores.getProductPrice');
});