<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use App\Models\Tin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TinController extends Controller
{
    public function index(): View
    {
        $data = Tin::query()
            ->orderByDesc('id')
            ->get();

        return view('Tin.danhsach', ['data' => $data]);
    }

    public function them(): View
    {
        $loaiTin = LoaiTin::query()->orderBy('id')->get();

        return view('Tin.themtin', ['loaiTin' => $loaiTin]);
    }

    public function them_(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tieuDe' => ['required', 'string', 'max:255'],
            'tomTat' => ['nullable', 'string'],
            'urlHinh' => ['nullable', 'string', 'max:255'],
            'idLT' => ['required', 'integer', 'exists:loaitin,id'],
        ]);

        Tin::query()->create([
            'tieuDe' => $validated['tieuDe'],
            'tomTat' => $validated['tomTat'] ?? null,
            'urlHinh' => $validated['urlHinh'] ?? null,
            'idLT' => $validated['idLT'],
            'ngayDang' => now(),
            'xem' => 0,
            'noiBat' => 0,
            'anHien' => 1,
            'lang' => 'vi',
        ]);

        return redirect('/tin/ds');
    }

    public function xoa(int $id): RedirectResponse
    {
        $tin = Tin::query()->find($id);

        if ($tin === null) {
            return redirect('/tin/ds');
        }

        $tin->delete();

        return redirect('/tin/ds');
    }

    public function capnhat(int $id): View|RedirectResponse
    {
        $tin = Tin::query()->find($id);

        if ($tin === null) {
            return redirect('/tin/ds');
        }

        $loaiTin = LoaiTin::query()->orderBy('id')->get();

        return view('Tin.capnhattin', [
            'tin' => $tin,
            'loaiTin' => $loaiTin,
        ]);
    }

    public function capnhat_(Request $request, int $id): RedirectResponse
    {
        $tin = Tin::query()->find($id);

        if ($tin === null) {
            return redirect('/tin/ds');
        }

        $validated = $request->validate([
            'tieuDe' => ['required', 'string', 'max:255'],
            'tomTat' => ['nullable', 'string'],
            'urlHinh' => ['nullable', 'string', 'max:255'],
            'idLT' => ['required', 'integer', 'exists:loaitin,id'],
        ]);

        $tin->tieuDe = $validated['tieuDe'];
        $tin->tomTat = $validated['tomTat'] ?? null;
        $tin->urlHinh = $validated['urlHinh'] ?? null;
        $tin->idLT = $validated['idLT'];
        $tin->save();

        return redirect('/tin/ds');
    }
}
