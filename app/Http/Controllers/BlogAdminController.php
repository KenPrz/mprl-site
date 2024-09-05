<?php

namespace App\Http\Controllers;

use App\Models\BlogImage;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
        $blogs = BlogPost::with(['categories:id,name', 'user:id,first_name'])
            ->where(function($query) use ($search_query) {
                $query->where('title', 'like', '%' . $search_query . '%')
                    ->orWhere('clicks', 'like', '%' . $search_query . '%')
                    ->orWhereHas('categories', function($q) use ($search_query) {
                        $q->where('name', 'like', '%' . $search_query . '%');
                    })
                    ->orWhereHas('user', function($q) use ($search_query) {
                        $q->where('first_name', 'like', '%' . $search_query . '%');
                    });
    
                if (strtolower($search_query) === 'true' || strtolower($search_query) === 'false') {
                    $booleanValue = strtolower($search_query) === 'true' ? 1 : 0;
                    $query->orWhere('is_published', $booleanValue)
                          ->orWhere('is_featured', $booleanValue);
                } else {
                    $query->orWhere('is_published', 'like', '%' . $search_query . '%')
                          ->orWhere('is_featured', 'like', '%' . $search_query . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
    
        $blogs->through(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'categories' => $blog->categories->pluck('name'),
                'is_published' => $blog->is_published,
                'is_featured' => $blog->is_featured,
                'first_name' => $blog->user->first_name,
                'clicks' => $blog->clicks,
            ];
        });
    
        return Inertia::render('Admin/Blog/Index', [
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
            'title' => 'required|string|max:255',
            'categories' => 'required|array|min:1',
            'content' => 'required|string',
            'is_published' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $blog = BlogPost::create([
            'title' => $request->title,
            'body' => $request->content,
            'is_published' => $request->is_published,
            'is_featured' => $request->is_featured,
            'created_by' => auth()->id(),
        ]);
        // Bind the categories to the blog post
        $this->bindCategories($blog->id, $request->categories);
    
        if($request->images) {
            foreach($request->file('images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images', $filename, 'public');
                $blog->images()->create([
                    'image' => $path,
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
        $blog = BlogPost::with(['images', 'categories:id,name'])
            ->where('id', $id)
            ->firstOrFail();
    
        $blog = [
            'id' => $blog->id,
            'title' => $blog->title,
            'body' => $blog->body,
            'is_published' => $blog->is_published,
            'is_featured' => $blog->is_featured,
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
            'categories' => 'array|required|min:1',
            'content' => 'required',
            'is_published' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'deleted_images' => 'array',
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $blog = BlogPost::findOrFail($id);
    
        if ($request->has('deleted_images')) {
            $this->handleDeletedImages($request->deleted_images);
        }
    
        $blog->update([
            'title' => $request->title,
            'body' => $request->content,
            'is_published' => $request->is_published,
            'is_featured' => $request->is_featured,
        ]);
        // Sync categories
        $this->syncCategories($blog, $request->categories);
    
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images', $filename, 'public');
    
                $blog->images()->create([
                    'image' => $path,
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
    
    private function syncCategories($blog, $categories)
    {
        // Ensure $categories is an array
        if (!is_array($categories)) {
            $categories = [$categories];
        }
    
        $categories = array_filter($categories, 'is_numeric');
    
        $categories = array_map('intval', $categories);
        DB::table('blog_post_category')
            ->where('blog_post_id', $blog->id)
            ->delete();
        foreach ($categories as $category) {
            DB::table('blog_post_category')->insert([
                'blog_post_id' => $blog->id,
                'blog_category_id' => $category,
            ]);
        }
    }

    private function bindCategories($blog_id, $categories)
    {
        if (!is_array($categories)) {
            $categories = [$categories];
        }

        $categories = array_filter($categories, 'is_numeric');
        $categories = array_map('intval', $categories);

        foreach ($categories as $category) {
            DB::table('blog_post_category')->insert([
                'blog_post_id' => $blog_id,
                'blog_category_id' => $category,
            ]);
        }
    }
}
