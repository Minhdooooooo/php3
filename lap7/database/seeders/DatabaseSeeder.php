<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->upsert([
            [
                'name' => 'Vui Tung Phut Giay',
                'email' => 'vuiqua@gmail.com',
                'password' => Hash::make('hehe'),
                'idgroup' => 1,
                'diachi' => 'TPHCM',
                'nghenghiep' => 'Nhan vien van phong',
                'phai' => 'nu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Buon Tung Phut Giay',
                'email' => 'buonqua@gmail.com',
                'password' => Hash::make('huhu'),
                'idgroup' => 1,
                'diachi' => 'TPHCM',
                'nghenghiep' => 'Lap trinh vien',
                'phai' => 'nam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyen Thi Gia Hu',
                'email' => 'giahau@gmail.com',
                'password' => Hash::make('hihi'),
                'idgroup' => 0,
                'diachi' => 'HN',
                'nghenghiep' => 'Sinh vien',
                'phai' => 'nu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['email'], ['name', 'password', 'idgroup', 'diachi', 'nghenghiep', 'phai', 'updated_at']);
    }
}
