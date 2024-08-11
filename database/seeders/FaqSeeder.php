<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'question' => 'Sample Question ' . $i,
                'category_id' => rand(1, 2), // Randomly assign category_id 1 or 2
                'answer' => 'This is the answer for Sample Question ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('faqs')->insert($data);
    }
}
