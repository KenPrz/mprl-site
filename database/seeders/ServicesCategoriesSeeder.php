<?php

namespace Database\Seeders;

use App\Models\ServicesCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Solar Power Solutions',
            'Service Provided',
            'Project Portfolio',
            'Frequently Asked Questions'
        ];
        foreach($categories as $category) {
            ServicesCategory::create([
                'service_category' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
