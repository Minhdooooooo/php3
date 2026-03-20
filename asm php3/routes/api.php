<?php

use App\Http\Controllers\Api\NewsApiController;
use Illuminate\Support\Facades\Route;

Route::get('/loai/{id}/tin', [NewsApiController::class, 'tinTheoLoai'])
    ->whereNumber('id');
Route::get('/tin/{id}', [NewsApiController::class, 'chiTietTin'])
    ->whereNumber('id');

