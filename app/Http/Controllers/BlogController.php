<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Inertia\Inertia;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::with('images')->get();
        return Inertia::render('Blog/Main', [
            'blogs' => $blogs
        ]);
    }
    
    public function show($id)
    {
        $blog = BlogPost::where('id', $id)->first();
        $blog_image = $blog->image;
        return Inertia::render('Blog/Show', [
            'blog' => $blog,
            'blog_image' => $blog_image
        ]);
    }
}
