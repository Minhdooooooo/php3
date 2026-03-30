<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tin/ds');

Route::get('/tin/ds', [TinController::class, 'index']);
Route::get('/tin/them', [TinController::class, 'them']);
Route::post('/tin/them', [TinController::class, 'them_']);
Route::get('/tin/xoa/{id}', [TinController::class, 'xoa'])->whereNumber('id');
Route::get('/tin/capnhat/{id}', [TinController::class, 'capnhat'])->whereNumber('id');
Route::post('/tin/capnhat/{id}', [TinController::class, 'capnhat_'])->whereNumber('id');
