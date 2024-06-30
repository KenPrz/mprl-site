<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');

        $products = Product::with('category')
                           ->when($selectedCategory !== 'all', function($query) use ($selectedCategory) {
                               $query->where('category_id', $selectedCategory);
                           })
                           ->orderBy('created_at', 'desc')
                           ->get();
                          
                           

        $categories = ProductCategory::select('id', 'name')->get();

        if ($request->expectsJson()) {
            return response()->json([
                'products' => $products,
                'categories' => $categories,
            ]);
        }

        return Inertia::render('Product/Main', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function show($id){
        $product = Product::with('category')->find($id);
        $categories = ProductCategory::select('id', 'name')->get();

        // Add the categories to the product object
        $product->categories = $categories;

        return Inertia::render('Product/Show', [
            'products' => $product,
        ]);
    }
}
