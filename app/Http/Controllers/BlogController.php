<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
class BlogController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $selectedYear = $request->query('year', 'all');
        $selectedMonth = $request->query('month', 'all');
        $searchQuery = $request->query('query', '');
        $blogs = BlogPost::select('blog_posts.id', 'blog_posts.title', 'blog_posts.created_at', 'blog_posts.category_id', 'blog_posts.created_by', 'users.name as user_name')
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->with('images')
            ->when($selectedCategory !== 'all', function($query) use ($selectedCategory) {
                $query->where('category_id', $selectedCategory);
            })
            ->when($searchQuery !== '', function($query) use ($searchQuery) {
                $query->where('title', 'like', "%$searchQuery%")
                    ->orWhere('body', 'like', "%$searchQuery%");
            })
            ->when($selectedYear !== 'all', function($query) use ($selectedYear) {
                $query->whereYear('created_at', $selectedYear);
            })
            ->when($selectedMonth !== 'all', function($query) use ($selectedMonth) {
                $query->whereMonth('created_at', $selectedMonth);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Category::select('id', 'name')->get();
        $years = BlogPost::selectRaw('DISTINCT YEAR(created_at) as year')->orderBy('year')->get();
        return Inertia::render('Blog/Main', [
            'categories' => $categories,
            'blogs' => $blogs,
            'years' => $years,
            'selectedCategory' => $selectedCategory,
            'selectedYear' => $selectedYear,
            'selectedMonth' => $selectedMonth,
            'searchQuery' => $searchQuery,
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
