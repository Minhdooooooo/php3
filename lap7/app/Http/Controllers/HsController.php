<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HsController extends Controller
{
    public function hs()
    {
        return view('nhaphs');
    }

    public function hs_store(Request $request)
    {
        $request->validate(
            [
                'hoten' => ['required', 'min:3', 'max:20'],
                'tuoi' => ['required', 'integer', 'min:16', 'max:100'],
                'ngaysinh' => ['required', 'regex:/^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[0-2])$/'],
            ],
            [
                'hoten.required' => ':attribute chưa nhập.',
                'hoten.min' => ':attribute phải từ :min ký tự trở lên.',
                'hoten.max' => ':attribute không được vượt quá :max ký tự.',
                'tuoi.required' => ':attribute chưa nhập.',
                'tuoi.integer' => ':attribute phải là số nguyên.',
                'tuoi.min' => ':attribute phải lớn hơn hoặc bằng :min.',
                'tuoi.max' => ':attribute không được lớn hơn :max.',
                'ngaysinh.required' => ':attribute chưa nhập.',
                'ngaysinh.regex' => ':attribute phải theo định dạng ngày/tháng (ví dụ: 02/04).',
            ],
            [
                'hoten' => 'Họ tên học sinh',
                'tuoi' => 'Tuổi',
                'ngaysinh' => 'Ngày sinh',
            ]
        );

        return redirect()
            ->route('hs.form')
            ->with('success', 'Lưu thông tin học sinh thành công.');
    }
}