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
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
});
Route::prefix('stores')->group(function () {
    Route::get('/', [StorePriceController::class, 'index'])->name('stores.index');
});
