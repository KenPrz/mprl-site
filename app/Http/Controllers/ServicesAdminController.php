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
        $categories = ServicesCategory::whereIn('id', [1, 2])->get();
        return Inertia::render('Admin/Services/Create',[
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        $service = $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:services_categories,id',
            'description' => 'required|string',
            'image' => 'required|array|max:1', // Assuming a maximum of 1 images can be uploaded
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',   // Individual image validation
        ]);
       
        if($request->image) {
            foreach($request->file('image') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('service-images', $filename, 'public');
                $service = Services::create([
                    'image' => $path
                ]);
            }
        }
        $service = Services::create([
                'name' => $request->input('name'),
                'category_id' => $request->input('category_id'),
                'description' => $request->input('description'),
                'image' => $path
            ]);
        return to_route('admin.services.index')->with('success', 'File uploaded successfully');
    }
    public function edit(string $id){
        $categories = ServicesCategory::whereIn('id', [1, 2])->get();
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
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|array|max:1',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the service record
        $service = Services::findOrFail($id);

        // Check if there's an image and process it
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::delete($service->image);
            }

            // Store new image
            $imagePath = $request->file('image')[0]->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the service with validated data
        $service->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(int $id)
    {
        Services::destroy($id);
    }
}
