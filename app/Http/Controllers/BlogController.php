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

        $blogs = BlogPost::with(['images', 'categories', 'user'])
            ->when($selectedCategory !== 'all', function ($query) use ($selectedCategory) {
                $query->whereHas('categories', function ($q) use ($selectedCategory) {
                    $q->where('blog_categories.id', $selectedCategory);
                });
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
            ->where('is_published', true)
            ->orderBy('blog_posts.created_at', 'desc')
            ->orderBy('blog_posts.clicks', 'desc')
            ->paginate(9);

        $categories = BlogCategory::select('id', 'name')->get();
        $years = BlogPost::selectRaw('DISTINCT YEAR(created_at) as year')->orderBy('year')->get();
        return Inertia::render('Blog/Main', [
            'categories' => $categories,
            'blogs' => $blogs->through(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'created_at' => $blog->created_at->format('Y-m-d'),
                    'clicks' => $blog->clicks,
                    'user_name' => $blog->user->first_name,
                    'image' => $blog->images->first() ? $blog->images->first()->image : null,
                    'categories' => $blog->categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                        ];
                    }),
                ];
            }),
            'years' => $years,
            'selectedCategory' => $selectedCategory,
            'selectedYear' => $selectedYear,
            'selectedMonth' => $selectedMonth,
            'searchQuery' => $searchQuery,
        ]);
    }

    public function show($id)
    {
        $blog = BlogPost::with(['images', 'categories', 'user'])
            ->where('id', $id)
            ->firstOrFail();
        if($blog->is_published == false && ( (auth()->user() == null) || auth()->user()->role_id != 1)) {
            abort(404);
        }

        $this->addClick($id);
    
        $blog = [
            'id' => $blog->id,
            'title' => $blog->title,
            'body' => $blog->body,
            'created_at' => $blog->created_at->format('Y-m-d'),
            'user_name' => $blog->user->first_name,
            'categories' => $blog->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            }),
            'images' => $blog->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image' => $image->image,
                ];
            }),
        ];
    
        $featured = $this->getFeatured($id);
        $more = $this->getMorePosts($id);
        return Inertia::render('Blog/Show', [
            'featured' => $featured,
            'more' => $more,
            'blog' => $blog,
            'blog_image' => $blog['images']->first() ?? null,
        ]);
    }

    private function getMorePosts($id)
    {

        $more = BlogPost::select('blog_posts.id', 'blog_posts.clicks', 'blog_posts.title', 'blog_posts.created_at', 'blog_posts.created_by', 'users.first_name as user_name')
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->with(['images', 'categories', 'user'])
            ->where('blog_posts.id', '!=', $id)
            ->orderBy('blog_posts.clicks', 'desc')
            ->limit(5)
            ->get();
        return $more;
    }

    public function getFeatured($id)
    {
        $featured = BlogPost::select('blog_posts.id', 'blog_posts.title', 'blog_posts.created_at', 'blog_posts.created_by', 'users.first_name as user_name')
            ->join('users', 'blog_posts.created_by', '=', 'users.id')
            ->with('firstImage')
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
