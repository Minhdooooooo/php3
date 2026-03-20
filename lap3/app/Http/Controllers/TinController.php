<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TinController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function chitiet(int $id = 0): View
    {
        $tin = DB::table('tin')
            ->where('id', $id)
            ->first();

        abort_unless($tin, 404);

        return view('chitiet', [
            'id' => $id,
            'tin' => $tin,
        ]);
    }

    public function tintrongloai(int $id = 0): View
    {
        $listtin = DB::table('tin')
            ->where('idLT', $id)
            ->orderByDesc('ngayDang')
            ->get();

        $loaitin = DB::table('loaitin')
            ->where('id', $id)
            ->first();

        $tenLoai = $loaitin?->ten
            ?? $loaitin?->tenLoai
            ?? $loaitin?->tenTL
            ?? ('Loại ' . $id);

        return view('tintrongloai', [
            'idLT' => $id,
            'tenLoai' => $tenLoai,
            'listtin' => $listtin,
        ]);
    }
}
