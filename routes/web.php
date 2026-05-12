<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
// Route bawaan dari dosen (menyisipkan data dummy otomatis)
// Route::get('/insert', [ProductController::class, 'insert']);

// Route baru untuk menampilkan form dan menyimpan data
Route::get('/insert', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
// Edit form route
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Update route using PATCH
Route::patch('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Delete route using DELETE
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
