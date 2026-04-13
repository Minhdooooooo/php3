<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->upsert([
            [
                'tenSP' => 'Sam sung A9',
                'gia' => 150000,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenSP' => 'Vivo C23',
                'gia' => 3600000,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenSP' => 'HTC M10',
                'gia' => 140000,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['tenSP'], ['gia', 'anHien', 'updated_at']);
    }
}
