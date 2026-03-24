<?php


namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $cateSeed = [];
        for($i = 0; $i<10; $i++){
            $cateSeed[] = [
                'name' => fake()->name(),
                'status' =>fake() ->numberBetween(0,1),
            ];
        }
        DB::table('categories')->insert($cateSeed);
    }
}
