<?php

use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('loaisanphams', LoaiSanPhamController::class);
