<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogImage;
class BlogImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogPosts = BlogPost::all();
        $file_names = [
            'solar-1.png',
            'solar-2.png',
            'solar-3.png',
            'solar-4.png',
            'solar-5.png',
        ];

        foreach($blogPosts as $blogPost) {
            BlogImage::create([
                'image' => $file_names[rand(0, 4)],
                'blog_post_id' => $blogPost->id
            ]);
        }
    }
}
