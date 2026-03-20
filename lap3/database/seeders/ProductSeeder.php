<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy tất cả id của categories
        $categoryID = DB::table('categories')->pluck('id')->toArray();

        $proSeed = [];

        for ($i = 0; $i < 10; $i++) {
            $proSeed[] = [
                'name' => fake()->name(),
                'price' => fake()->randomNumber(),
                'quantity' => fake()->randomNumber(),
                'image' => fake()->imageUrl(),
                'describe' => fake()->sentence(),
                'category_id' => fake()->randomElement($categoryID),
                'status' => fake()->numberBetween(0,1),
                'created_at' => now(),
                'updated_at' => now(),
];
        }

        DB::table('products')->insert($proSeed);
    }
}