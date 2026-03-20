<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TinController extends Controller
{
    public function index(): View
    {
        $tinMoiNhat = DB::table('tin as t')
            ->join('loaitin as lt', 'lt.id', '=', 't.idLT')
            ->select(
                't.id',
                't.tieuDe',
                't.tomTat',
                't.hinh',
                't.ngayDang',
                't.xem',
                'lt.tenLoai'
            )
            ->where('t.anHien', 1)
            ->where('lt.anHien', 1)
            ->orderByDesc('t.ngayDang')
            ->limit(9)
            ->get();

        return view('news.home', [
            'tinMoiNhat' => $tinMoiNhat,
        ]);
    }

    public function chitiet(int $id = 0): View
    {
        $tin = DB::table('tin as t')
            ->join('loaitin as lt', 'lt.id', '=', 't.idLT')
            ->select(
                't.id',
                't.idLT',
                't.tieuDe',
                't.tomTat',
                't.noiDung',
                't.hinh',
                't.ngayDang',
                't.xem',
                'lt.tenLoai'
            )
            ->where('t.anHien', 1)
            ->where('t.id', $id)
            ->first();

        abort_unless($tin, 404);

        DB::table('tin')->where('id', $id)->increment('xem');
        $tin->xem = (int) $tin->xem + 1;

        return view('news.detail', [
            'tin' => $tin,
        ]);
    }

    public function tinTrongLoai(int $id = 0): View
    {
        $loaiTin = DB::table('loaitin')
            ->where('id', $id)
            ->where('anHien', 1)
            ->first();

        abort_unless($loaiTin, 404);

        $listtin = DB::table('tin')
            ->select('id', 'tieuDe', 'tomTat', 'hinh', 'ngayDang', 'xem')
            ->where('anHien', 1)
            ->where('idLT', $id)
            ->orderByDesc('ngayDang')
            ->paginate(8)
            ->withQueryString();

        return view('news.category', compact('loaiTin', 'listtin'));
    }

    public function timKiem(Request $request): View
    {
        $tuKhoa = trim((string) $request->query('q', ''));

        $listtin = DB::table('tin as t')
            ->join('loaitin as lt', 'lt.id', '=', 't.idLT')
            ->select(
                't.id',
                't.tieuDe',
                't.tomTat',
                't.hinh',
                't.ngayDang',
                't.xem',
                'lt.tenLoai'
            )
            ->where('t.anHien', 1)
            ->where('lt.anHien', 1)
            ->when($tuKhoa !== '', function ($query) use ($tuKhoa): void {
                $query->where(function ($subQuery) use ($tuKhoa): void {
                    $subQuery->where('t.tieuDe', 'like', '%' . $tuKhoa . '%')
                        ->orWhere('t.tomTat', 'like', '%' . $tuKhoa . '%')
                        ->orWhere('t.noiDung', 'like', '%' . $tuKhoa . '%');
                });
            })
            ->orderByDesc('t.ngayDang')
            ->paginate(8)
            ->withQueryString();

        return view('news.search', [
            'tuKhoa' => $tuKhoa,
            'listtin' => $listtin,
        ]);
    }
}
