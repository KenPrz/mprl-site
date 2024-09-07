<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Residential',
            'Commercial'
        ];
        foreach($categories as $category) {
            ProjectCategory::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
