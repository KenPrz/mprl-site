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
        $newProducts = Product::with('firstImage')
                                ->orderBy('created_at', 'desc')->take(5)->get();
    
        $products = Product::with(['category', 'firstImage'])
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
            'newproducts' => $newProducts
        ]);
    }
    

    public function show($id)
    {
        $product = Product::with(['category', 'images'])->find($id);
        $categories = ProductCategory::select('id', 'name')->get();
        $newProducts = Product::with('firstImage')
                                ->orderBy('created_at', 'desc')->take(5)->get();
        $similarproducts = Product::with('category', 'firstImage')
                                        ->orderBy('created_at', 'desc')->take(3)->get();

        // Add the categories to the product object
        $product->categories = $categories;

        return Inertia::render('Product/Show', [
            'products' => $product,
            'similarproducts' => $similarproducts,
            'newproducts' => $newProducts,
        ]);
    }

}
