<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThanhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $ho = ['Nguyen', 'Tran', 'Le'];
    $tenLot = ['Van', 'Thi', 'Hoang'];
    $ten = ['An', 'Binh', 'Cuong'];

    for ($i = 0; $i < 100; $i++) {

        $name = $ho[array_rand($ho)] . ' ' .
                $tenLot[array_rand($tenLot)] . ' ' .
                $ten[array_rand($ten)];

        DB::table('thanhvien')->insert([
            'hoTen' => $name,
            'password' => Hash::make('hehe'),
            'email' => 'user' . $i . '@gmail.com',

            'active' => rand(0, 1),
            'idGroup' => rand(0, 2),
        ]);
    }
}
}
