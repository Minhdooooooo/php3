<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DienThoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $names = ['Oppo XA', 'Iphone XS Max', 'Nokia Pro'];

    for ($i = 0; $i < 300; $i++) {

        $name = $names[array_rand($names)];

        if ($name == 'Oppo XA') {
            $gia = rand(700000, 1000000);
        } elseif ($name == 'Iphone XS Max') {
            $gia = rand(500000, 800000);
        } else {
            $gia = rand(250000, 500000);
        }

        DB::table('dienthoai')->insert([
            'tenDT' => $name . ' ' . $i,
            'moTa' => 'Mô tả sản phẩm ' . $i,
            'ngayCapNhat' => now(),

            'gia' => $gia,
            'giaKM' => 0,

            'soLuongTonKho' => rand(1, 100),

            'hot' => rand(0, 1),
            'anHien' => 1,

            'idLoai' => rand(1, 3),
        ]);
    }
}
}