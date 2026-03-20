<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class NewsApiController extends Controller
{
    public function tinTheoLoai(int $id): JsonResponse
    {
        $loaiTin = DB::table('loaitin')
            ->select('id', 'tenLoai', 'slug')
            ->where('id', $id)
            ->where('anHien', 1)
            ->first();

        if (!$loaiTin) {
            return response()->json([
                'message' => 'Loai tin khong ton tai hoac da an.',
            ], 404);
        }

        $dsTin = DB::table('tin')
            ->select('id', 'idLT', 'tieuDe', 'slug', 'tomTat', 'hinh', 'ngayDang', 'xem')
            ->where('idLT', $id)
            ->where('anHien', 1)
            ->orderByDesc('ngayDang')
            ->get();

        return response()->json([
            'loai_tin' => $loaiTin,
            'ds_tin' => $dsTin,
        ]);
    }

    public function chiTietTin(int $id): JsonResponse
    {
        $tin = DB::table('tin as t')
            ->join('loaitin as lt', 'lt.id', '=', 't.idLT')
            ->select(
                't.id',
                't.idLT',
                't.tieuDe',
                't.slug',
                't.tomTat',
                't.noiDung',
                't.hinh',
                't.ngayDang',
                't.xem',
                'lt.tenLoai'
            )
            ->where('t.id', $id)
            ->where('t.anHien', 1)
            ->first();

        if (!$tin) {
            return response()->json([
                'message' => 'Tin khong ton tai hoac da an.',
            ], 404);
        }

        return response()->json([
            'tin' => $tin,
        ]);
    }
}
