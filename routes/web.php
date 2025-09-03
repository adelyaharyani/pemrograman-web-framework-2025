<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

Route::resource('tasks', TaskController::class)->except(['show']);

Route::patch('tasks/{task}/done', [TaskController::class, 'done'])->name('tasks.done');
