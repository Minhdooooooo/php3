<?php

return [
    'required' => ':attribute la bat buoc.',
    'string' => ':attribute phai la chuoi.',
    'email' => ':attribute phai la dia chi email hop le.',
    'max' => [
        'string' => ':attribute khong duoc vuot qua :max ky tu.',
    ],
    'min' => [
        'string' => ':attribute phai co it nhat :min ky tu.',
    ],
    'confirmed' => ':attribute xac nhan khong khop.',
    'unique' => ':attribute da ton tai.',
    'in' => ':attribute khong hop le.',
    'integer' => ':attribute phai la so nguyen.',
    'lowercase' => ':attribute phai viet thuong.',
    'current_password' => 'Mat khau hien tai khong dung.',

    'password' => [
        'letters' => ':attribute phai chua it nhat 1 chu cai.',
        'mixed' => ':attribute phai chua it nhat 1 chu hoa va 1 chu thuong.',
        'numbers' => ':attribute phai chua it nhat 1 chu so.',
        'symbols' => ':attribute phai chua it nhat 1 ky tu dac biet.',
        'uncompromised' => ':attribute da xuat hien trong du lieu ro ri. Vui long chon :attribute khac.',
    ],

    'attributes' => [
        'name' => 'ho ten',
        'email' => 'dia chi email',
        'password' => 'mat khau',
        'password_confirmation' => 'xac nhan mat khau',
        'current_password' => 'mat khau hien tai',
        'diachi' => 'dia chi',
        'idgroup' => 'nhom',
        'nghenghiep' => 'nghe nghiep',
        'phai' => 'phai',
    ],
];
