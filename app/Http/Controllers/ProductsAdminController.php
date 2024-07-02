<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_query = $request->searchQuery;
        $products = Product::select('products.id', 'products.name', 'product_categories.name as category_name', 'products.price', 'products.is_displayed')
        ->join('product_categories', 'product_categories.id', '=', 'products.category_id')
        ->with('category:id,name')
        ->where(function($query) use ($search_query) {
            $query->where('products.name', 'like', '%' . $search_query . '%')
                ->orWhere('product_categories.name', 'like', '%' . $search_query . '%');
            if (strtolower($search_query) === 'true' || strtolower($search_query) === 'false') {
                $booleanValue = strtolower($search_query) === 'true' ? 1 : 0;
                $query->orWhere('products.is_displayed', $booleanValue);
            } else {
                // Search for boolean values as strings
                $query->orWhere('products.is_displayed', 'like', '%' . $search_query . '%');
            }
        })
        ->orderBy('products.id', 'desc')
        ->paginate(10);
            return Inertia::render('Admin/Product/Index',[
                'searchQuery' => $search_query,
                'products' => $products
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return Inertia::render('Admin/Product/Create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
