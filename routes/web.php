<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profil user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman khusus admin
    Route::get('/rahasia-admin', function () {
        return 'Ini halaman rahasia khusus admin';
    })->middleware(['RoleCheck:admin']);

    // Produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    //praktikum form
    Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
    Route::post('/products', [ProductController::class, 'store'])->name('product-store');

    Route::get('/product', [ProductController::class, 'index'])->name('product-index');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product-destroy');
    // untuk download data keseluruhan
    Route::get('/product/export/excel', [ProductController::class, 'exportExcel'])
        ->name('product-export-excel');

});

require __DIR__ . '/auth.php';
