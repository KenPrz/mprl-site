<?php

namespace Database\Seeders;

use App\Models\ProjectCatergory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ProjectCatergory::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
