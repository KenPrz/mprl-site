<?php

namespace App\Http\Controllers;

use App\Models\BlogImage;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_query = $request->searchQuery;
        $blogs = BlogPost::select('blog_posts.id', 'title', 'blog_categories.name as category_name', 'is_published', 'users.first_name', 'is_featured', 'clicks')
        ->join('blog_categories', 'blog_categories.id', '=', 'blog_posts.category_id')
        ->join('users', 'users.id', '=', 'blog_posts.created_by')
        ->with('category:id,name')
        ->with('user:id,name')
        ->where(function($query) use ($search_query) {
            $query->where('title', 'like', '%' . $search_query . '%')
                ->orWhere('blog_categories.name', 'like', '%' . $search_query . '%')
                ->orWhere('users.first_name', 'like', '%' . $search_query . '%')
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
        $categories = BlogCategory::select('id', 'name')->get();
        return Inertia::render('Admin/Blog/Create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'is_published' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $blog = BlogPost::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'body' => $request->content,
            'is_published' => $request->is_published,
            'is_featured' => $request->is_featured,
            'created_by' => auth()->id(),
        ]);
    
        if($request->has('images')) {
            foreach($request->file('images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images', $filename, 'public');
    
                $blog->images()->create([
                    'image' => $path,
                    'blog_post_id' => $blog->id
                ]);
            }
        }
    
        return Inertia::location(route('blog.show', $blog->id));
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
    public function edit(int $id)
    {
        $blog = BlogPost::select('id', 'title', 'category_id', 'body', 'is_published', 'is_featured')
            ->with('images')
            ->with('category:id,name')
            ->where('id', $id)
            ->first();
        $categories = BlogCategory::select('id', 'name')->get();
            return Inertia::render('Admin/Blog/Edit', [
                'blog' => $blog,
                'categories' => $categories
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'is_published' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'deleted_images' => 'array',
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = BlogPost::findOrFail($id);

        if($request->has('deleted_images')) {
            $this->handleDeletedImages($request->deleted_images);
        }

        $blog->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'body' => $request->content,
            'is_published' => $request->is_published,
            'is_featured' => $request->is_featured,
        ]);
    
        if($request->has('new_images') !== null) {
            foreach($request->file('new_images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images', $filename, 'public');
    
                $blog->images()->create([
                    'image' => $path,
                    'blog_post_id' => $blog->id
                ]);
            }
        }

        return redirect()->route('admin.blog.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        BlogPost::destroy($id);
    }

    private function handleDeletedImages($deletedImages)
    {
        foreach($deletedImages as $imageId) {
            $image = BlogImage::findOrFail($imageId);
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
    }
}
