<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/xemnhieu');

Route::get('/xemnhieu', function () {
    $data = DB::table('tin')
        ->select('id', 'tieuDe', 'xem')
        ->orderByDesc('xem')
        ->limit(10)
        ->get();

    return view('xemnhieu', ['data' => $data]);
})->name('xemnhieu');

Route::get('/tinmoi', function () {
    $data = DB::table('tin')
        ->select('id', 'tieuDe', 'ngayDang')
        ->orderByDesc('ngayDang')
        ->limit(10)
        ->get();

    return view('tinmoi', ['data' => $data]);
})->name('tinmoi');

Route::get('/tintrongloai/{id}', function (int $id) {
    $data = DB::table('tin')
        ->select('id', 'tieuDe', 'tomTat', 'ngayDang')
        ->where('idLT', '=', $id)
        ->orderByDesc('ngayDang')
        ->get();

    $loaiTin = DB::table('loaitin')->where('id', '=', $id)->first();
    $tenLoai = $loaiTin?->tenLoai ?? $loaiTin?->tenTL ?? $loaiTin?->ten ?? ('Loai tin #' . $id);

    return view('tintrongloai', [
        'data' => $data,
        'idLoai' => $id,
        'tenLoai' => $tenLoai,
    ]);
})->whereNumber('id')->name('tintrongloai');

Route::get('/tin/{id}', function (int $id) {
    $tin = DB::table('tin')->where('id', '=', $id)->first();

    abort_unless($tin, 404);

    return view('chitiettin', ['tin' => $tin]);
})->whereNumber('id')->name('tin.chitiet');
