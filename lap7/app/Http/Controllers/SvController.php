<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleNhapSV;

class SvController extends Controller
{
    public function sv()
    {
        return view('nhapsv');
    }

    public function sv_store(RuleNhapSV $request)
    {
        return redirect()
            ->route('sv.form')
            ->with('success', 'Lưu thông tin sinh viên thành công.');
    }
}