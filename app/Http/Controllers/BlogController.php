<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
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

        $blogs = BlogPost::select('blog_posts.id', 'blog_posts.title', 'blog_posts.created_at','blog_posts.clicks', 'blog_posts.category_id', 'blog_posts.created_by', 'users.first_name as user_name')
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->with('images')
            ->when($selectedCategory !== 'all', function ($query) use ($selectedCategory) {
                $query->where('blog_posts.category_id', $selectedCategory);
            })
            ->when($searchQuery !== '', function ($query) use ($searchQuery) {
                $query->where(function ($query) use ($searchQuery) {
                    $query->where('blog_posts.title', 'like', "%$searchQuery%")
                        ->orWhere('blog_posts.body', 'like', "%$searchQuery%");
                });
            })
            ->when($selectedYear !== 'all', function ($query) use ($selectedYear) {
                $query->whereYear('blog_posts.created_at', $selectedYear);
            })
            ->when($selectedMonth !== 'all', function ($query) use ($selectedMonth) {
                $query->whereMonth('blog_posts.created_at', $selectedMonth);
            })
            ->orderBy('blog_posts.created_at', 'desc')
            ->orderBy('blog_posts.clicks', 'desc')
            ->paginate(9);

        $categories = BlogCategory::select('id', 'name')->get();
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
        $blog = BlogPost::select('blog_posts.id', 'blog_posts.title', 'blog_posts.body', 'blog_posts.created_at', 'blog_posts.category_id', 'blog_posts.created_by', 'users.first_name as user_name')
            ->with('images')
            ->where('blog_posts.id', $id)
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->first();
        if (!$blog) {
            abort(404);
        }
        $this->addClick($id);
        $blog_image = $blog->image;
        $featured = $this->getFeatured($id);
        $more = $this->getMorePosts($id);
        return Inertia::render('Blog/Show', [
            'featured' => $featured,
            'more' => $more,
            'blog' => $blog,
            'blog_image' => $blog_image
        ]);
    }

    private function getMorePosts($id)
    {
        $more = BlogPost::select('blog_posts.id','blog_posts.clicks', 'blog_posts.title', 'blog_posts.created_at', 'blog_posts.category_id', 'blog_posts.created_by', 'users.first_name as user_name')
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->with('images')
            ->where('blog_posts.id', '!=', $id)
            ->orderBy('blog_posts.clicks', 'desc')
            ->limit(5)
            ->get();
        return $more;
    }

    public function getFeatured($id)
    {
        $featured = BlogPost::select('blog_posts.id', 'blog_posts.title', 'blog_posts.created_at', 'blog_posts.category_id', 'blog_posts.created_by', 'users.first_name as user_name')
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->with('firstImage') // Use relationship to get only one image
            ->where('blog_posts.is_featured', true)
            ->where('blog_posts.id', '!=', $id)
            ->orderBy('blog_posts.created_at', 'desc')
            ->get();
    
        return $featured;
    }

    private function addClick($id)
    {
        $blog = BlogPost::find($id);
        $blog->clicks++;
        $blog->save();
    }
}
