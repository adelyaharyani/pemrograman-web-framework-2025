<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rahasia-admin', function () {
        return 'ini halaman rahasia khusus admin';
    })->middleware(['auth', 'RoleCheck:admin']);

    Route::get('/produk',[ProductController::class, 'index']);
    Route::get('/route_cont/{id}', [ProductController::class, 'show']);
});

require __DIR__.'/auth.php';
