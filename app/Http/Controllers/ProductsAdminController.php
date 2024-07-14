<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // $products = $request->all();
        // dd($products);
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:product_categories,id',
            'type' => 'required|string|max:255',
            'img_path' => 'required|array|max:3', // Assuming a maximum of 3 images can be uploaded
            'img_path.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Individual image validation
            'voltage' => 'required|numeric|min:0',
            'description' => 'required|string',
            'power_out' => 'required|string|max:255',
            'efficiency' => 'nullable|numeric|min:0|max:100',
            'dimension' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'current' => 'nullable|numeric|min:0',
            'temp_coeff' => 'nullable|numeric',
            'price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'warranty' => 'nullable|string|max:255',
            'stock_level' => 'nullable|integer|min:0',
            'supplier' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'datasheet' => 'nullable|file|mimes:pdf|max:10000',
            'is_displayed' => 'nullable|boolean',
        ]);
        $products = Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'power_out' => $request->input('power_out'),
            'efficiency' => $request->input('efficiency'),
            'dimension' => $request->input('dimension'),
            'weight' => $request->input('weight'),
            'type' => $request->input('type'),
            'voltage' => $request->input('voltage'),
            'current' => $request->input('current'),
            'temp_coeff' => $request->input('temp_coeff'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'warranty' => $request->input('warranty'),
            'stock_level' => $request->input('stock_level'),
            'supplier' => $request->input('supplier'),
            'certification' => $request->input('certification'),
            'description' => $request->input('description'),
            'datasheet' => $request->file('datasheet') ? $request->file('datasheet')->store('datasheets') : null,
            'is_displayed' => $request->input('is_displayed', false),
        ]);
        if($request->img_path) {
            foreach($request->file('img_path') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('product-images', $filename, 'public');
                $products->images()->create([
                    'images' => $path,
                    'product_id' => $products->id
                ]);
            }
        }
        
        
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
