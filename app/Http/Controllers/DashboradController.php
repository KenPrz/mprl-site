<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Inertia\Inertia;
class DashboradController extends Controller
{
    public function index()
    {
        $blog_posts = BlogPost::count();
        return Inertia::render('Admin/Dashboard',[
            'blog_posts' => $blog_posts,
        ]);
    }
}
