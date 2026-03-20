<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TinController::class, 'index'])->name('home');
Route::get('/tin/{id}', [TinController::class, 'chitiet'])
    ->whereNumber('id')
    ->name('tin.chitiet');
Route::get('/cat/{id}', [TinController::class, 'tintrongloai'])
    ->whereNumber('id')
    ->name('tin.trongloai');
