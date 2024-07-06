<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
class BlogCategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
    }

    public function update(Request $request,int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = BlogCategory::find($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
    }

    public function destroy(int $id)
    {
        $category = BlogCategory::find($id);
        $category->delete();
    }
}
