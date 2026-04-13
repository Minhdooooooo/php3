<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loaisanphams')->upsert([
            [
                'tenLoai' => 'Dien thoai',
                'moTa' => 'Nhom san pham dien thoai',
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenLoai' => 'Phu kien',
                'moTa' => 'Nhom san pham phu kien',
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['tenLoai'], ['moTa', 'anHien', 'updated_at']);
    }
}
