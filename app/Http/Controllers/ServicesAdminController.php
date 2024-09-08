<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ServicesAdminController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $services = Services::select('services.id', 'services.name', 'services_categories.service_category as category_id', 'services.description')
        ->join('services_categories', 'services_categories.id', '=', 'services.category_id')
        ->with('category:id,service_category')
        ->paginate(10);
        return Inertia::render('Admin/Services/Index', [
            'services' => $services
        ]);
    }
    public function create(){
        $categories = ServicesCategory::whereIn('id', [2])->get();
        return Inertia::render('Admin/Services/Create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:services_categories,id',
            'description' => 'required|string',
            'image' => 'required|array|max:1',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Initialize image path
        $imagePath = null;

        // Process the image if it exists
        if ($request->hasFile('image')) {
            $file = $request->file('image')[0]; // Retrieve the first file (max 1 image upload)
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('service-images', $filename, 'public');
        }

        // Create the service record
        Services::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        // Redirect to the service index with success message
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(string $id){
        $categories = ServicesCategory::whereIn('id', [2])->get();
        $service = Services::with(['category:id,service_category'])
            ->where('id', $id)
            ->firstOrFail();
        return Inertia::render('Admin/Services/Edit', [
            'categories' => $categories,
            'service' => $service
        ]);
    }

    public function update(Request $request, int $id)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer|exists:services_categories,id',
            'description' => 'required|string',
            'image' => 'required|array|max:1',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the existing service
        $service = Services::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            // Save the new image
            $file = $request->file('image')[0];
            $imagePath = $file->store('service-images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the service record with validated data
        $service->update($validatedData);

        // Redirect to the service index with success message
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(int $id)
    {
        Services::destroy($id);
    }
}
