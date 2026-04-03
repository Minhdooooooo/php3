<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuanTriTinController;
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

    Route::view('/download', 'download')
        ->name('download');

    Route::get('/quantritin', [QuanTriTinController::class, 'index'])
        ->name('quantritin');

    Route::view('/quantri', 'quantri')
        ->middleware('quantri')
        ->name('quantri');
});

Route::view('/thongbao', 'thongbao')->name('thongbao');

Route::view('/dl', 'download')
    ->middleware('auth.basic')
    ->name('dl');

require __DIR__.'/auth.php';
