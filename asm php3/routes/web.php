<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TinController::class, 'index'])->name('home');
Route::get('/tin/{id}', [TinController::class, 'chitiet'])
    ->whereNumber('id')
    ->name('tin.chitiet');
Route::get('/loai/{id}', [TinController::class, 'tinTrongLoai'])
    ->whereNumber('id')
    ->name('tin.trongloai');
Route::get('/tim-kiem', [TinController::class, 'timKiem'])->name('tin.timkiem');
