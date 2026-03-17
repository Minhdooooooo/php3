<?php
use App\Http\Controllers\TinController;
use App\Http\Controllers\NguyenVanAController;

Route::get('/thongtinsv',[NguyenVanAController::class,'thongtin']);

Route::get('/', [TinController::class, 'index']);
Route::get('/lien-he', [TinController::class, 'lienhe']);
Route::get('/ct/{id}', [TinController::class,'lay1tin']);

?>
