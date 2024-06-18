<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Solar Panels',
            'Solar Inverters',
            'Solar Batteries',
            'Solar Charge Controllers',
            'Solar Mounting Systems',
            'Solar Accessories',
            'Solar Kits',
            'Solar Water Pumps',
            'Solar Lights',
            'miscellaneous'
        ];

        foreach($categories as $category) {
            BlogCategory::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
