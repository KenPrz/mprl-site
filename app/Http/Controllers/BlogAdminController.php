<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Inertia\Inertia;
class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_query = $request->searchQuery;
        $blogs = BlogPost::select('blog_posts.id', 'title', 'blog_categories.name as category_name', 'is_published', 'users.name', 'is_featured', 'clicks')
        ->join('blog_categories', 'blog_categories.id', '=', 'blog_posts.category_id')
        ->join('users', 'users.id', '=', 'blog_posts.created_by')
        ->with('category:id,name')
        ->with('user:id,name')
        ->where(function($query) use ($search_query) {
            $query->where('title', 'like', '%' . $search_query . '%')
                ->orWhere('blog_categories.name', 'like', '%' . $search_query . '%')
                ->orWhere('users.name', 'like', '%' . $search_query . '%')
                ->orWhere('clicks', 'like', '%' . $search_query . '%');
            if (strtolower($search_query) === 'true' || strtolower($search_query) === 'false') {
                $booleanValue = strtolower($search_query) === 'true' ? 1 : 0;
                $query->orWhere('is_published', $booleanValue)
                    ->orWhere('is_featured', $booleanValue);
            } else {
                // Search for boolean values as strings
                $query->orWhere('is_published', 'like', '%' . $search_query . '%')
                    ->orWhere('is_featured', 'like', '%' . $search_query . '%');
            }
        })
        ->orderBy('blog_posts.id', 'desc')
        ->paginate(10);    
        return Inertia::render('Admin/Blog/Index',[
            'searchQuery' => $search_query,
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Blog/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
