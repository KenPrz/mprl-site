<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogPostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all blog posts and categories
        $posts = BlogPost::all();
        $categories = BlogCategory::all();

        // Attach random categories to each post
        $posts->each(function ($post) use ($categories) {
            // Determine how many categories to attach (1 to 3)
            $categoryCount = rand(1, 4);
            // Get random categories
            $selectedCategories = $categories->random($categoryCount);
            // Attach the selected categories to the post
            $post->categories()->attach($selectedCategories->pluck('id')->toArray());
        });
    }
}
