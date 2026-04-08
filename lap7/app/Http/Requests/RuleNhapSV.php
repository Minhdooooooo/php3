<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSV extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'masv' => ['required', 'regex:/^PS\d{5}$/'],
            'hoten' => ['required', 'min:3', 'max:20'],
            'tuoi' => ['required', 'integer', 'min:16', 'max:100'],
            'ngaysinh' => ['required', 'regex:/^(0?[1-9]|[12]\d|3[01])\/(0?[1-9]|1[0-2])$/'],
            'cmnd' => ['required', 'digits_between:9,10'],
            'email' => ['required', 'email', 'ends_with:@fpt.edu.vn'],
        ];
    }

    public function messages(): array
    {
        return [
            'masv.required' => ':attribute chưa nhập.',
            'masv.regex' => ':attribute không đúng định dạng (PS + 5 số).',
            'hoten.required' => ':attribute chưa nhập.',
            'hoten.min' => ':attribute phải từ :min ký tự trở lên.',
            'hoten.max' => ':attribute không được vượt quá :max ký tự.',
            'tuoi.required' => ':attribute chưa nhập.',
            'tuoi.integer' => ':attribute phải là số nguyên.',
            'tuoi.min' => ':attribute phải từ :min trở lên.',
            'tuoi.max' => ':attribute không được lớn hơn :max.',
            'ngaysinh.required' => ':attribute chưa nhập.',
            'ngaysinh.regex' => ':attribute phải theo định dạng ngày/tháng (ví dụ: 02/04).',
            'cmnd.required' => ':attribute chưa nhập.',
            'cmnd.digits_between' => ':attribute phải có từ :min đến :max chữ số.',
            'email.required' => ':attribute chưa nhập.',
            'email.email' => ':attribute không đúng định dạng email.',
            'email.ends_with' => ':attribute phải có đuôi @fpt.edu.vn.',
        ];
    }

    public function attributes(): array
    {
        return [
            'masv' => 'Mã sinh viên',
            'hoten' => 'Họ tên',
            'tuoi' => 'Tuổi',
            'ngaysinh' => 'Ngày sinh',
            'cmnd' => 'CMND',
            'email' => 'Email',
        ];
    }
}
