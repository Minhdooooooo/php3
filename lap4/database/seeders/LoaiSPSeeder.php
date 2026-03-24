<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    DB::table('loaisp')->insert([
        ['tenLoai' => 'Điện thoại', 'thuTu' => 1],
        ['tenLoai' => 'Laptop', 'thuTu' => 2],
        ['tenLoai' => 'Tablet', 'thuTu' => 3],
    ]);
}
}