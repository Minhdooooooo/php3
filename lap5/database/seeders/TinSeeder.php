<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TinSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!Schema::hasTable('loaitin') || !Schema::hasTable('tin')) {
            return;
        }

        DB::table('loaitin')->upsert([
            ['id' => 1, 'tenLoai' => 'Xa hoi', 'slug' => 'xa-hoi'],
            ['id' => 3, 'tenLoai' => 'Du lich', 'slug' => 'du-lich'],
            ['id' => 9, 'tenLoai' => 'Cong nghe', 'slug' => 'cong-nghe'],
        ], ['id'], ['tenLoai', 'slug']);

        DB::table('tin')->upsert([
            [
                'id' => 1,
                'tieuDe' => 'Hoang hon tren song Me Kong',
                'tomTat' => 'Ben ghe da thi xa Savannakhet, thu phu mien Trung va Ha Lao cua dat nuoc Hoa Cham Pa, nguoc dong len den mat song Me Kong.',
                'urlHinh' => '',
                'ngayDang' => now(),
                'noiDung' => 'Noi dung chi tiet bai viet 1',
                'idLT' => 1,
                'xem' => 10,
                'noiBat' => 0,
                'anHien' => 1,
                'tags' => 'song,du lich',
                'lang' => 'vi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'tieuDe' => 'Tan cung noi dau',
                'tomTat' => 'Ten em la Thanh Truc. Cau chuyen ve em, ve co be mo coi ca cha lan me, mang trong minh can benh mau...',
                'urlHinh' => '',
                'ngayDang' => now(),
                'noiDung' => 'Noi dung chi tiet bai viet 2',
                'idLT' => 3,
                'xem' => 15,
                'noiBat' => 0,
                'anHien' => 1,
                'tags' => 'doi song',
                'lang' => 'vi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['id'], ['tieuDe', 'tomTat', 'urlHinh', 'ngayDang', 'noiDung', 'idLT', 'xem', 'noiBat', 'anHien', 'tags', 'lang', 'created_at', 'updated_at']);
    }
}
