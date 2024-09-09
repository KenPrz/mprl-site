<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use App\Models\Projects;
use App\Models\Services;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectAdminController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $projects = Projects::select('projects.id', 'projects.title', 'project_categories.name as category_id', 'projects.content')
            ->join('project_categories', 'project_categories.id', '=', 'projects.category_id')
            ->with('category:id,name')
            ->orderBy('projects.created_at', 'desc')
            ->paginate(10);
        return Inertia::render('Admin/Projects/Index', [
            'projects' => $projects
        ]);
    }
    public function create(){
        $categories = ProjectCategory::all();
        $services = Services::all();
        return Inertia::render('Admin/Projects/Create',[
            'categories' => $categories,
            'services' => $services,
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:project_categories,id',
            'content' => 'required',
            'system_size' => 'required|numeric',
            'monthly_saving' => 'required|string',
            'image' => 'required|array|max:3', 
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Individual image validation
        ]);
        $projects = Projects::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
            'system_size' => $request->input('system_size'),
            'monthly_saving' => $request->input('monthly_saving'),
        ]);

        if($request->image) {
            foreach($request->file('image') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('product-images', $filename, 'public');
                $projects->images()->create([
                    'images' => $path,
                ]);
            }
        }
        return to_route('admin.projects.index')->with('success', 'File uploaded successfully');
    }
    public function edit(string $id){
        $categories = ProjectCategory::all();
        $project = Projects::with('images')
            ->where('id', $id)
            ->firstOrFail();

        return Inertia::render('Admin/Projects/Edit', [
            'categories' => $categories,
            'project' => $project
        ]);
    }

    // 
    
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'system_size' => 'required|numeric',
            'monthly_saving' => 'required',
            'content' => 'required'
        ]);

        $project = Projects::findOrFail($id);
        $project->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'system_size' => $request->system_size,
            'monthly_saving' => $request->monthly_saving,
            'content' => $request->content,
        ]);

        // Calculate potential remaining images after deletion
        $currentImageIds = $project->images()->pluck('id')->toArray();
        $imagesToDelete = $request->input('images_to_delete', []);
        $potentialRemainingCount = count($currentImageIds) - count($imagesToDelete);

        // Ensure at least one image would remain after deletion
        if ($potentialRemainingCount < 1 && !$request->hasFile('image')) {
            return redirect()->back()->withErrors(['image' => 'At least one image is required.']);
        }

        // Handle file uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('product-images', $filename, 'public');
                $project->images()->create([
                    'images' => $path,
                ]);
            }
        }

        // Proceed with deletion of existing images only if it will not result in zero images
        foreach ($imagesToDelete as $imageId) {
            $image = $project->images()->find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->images); // Delete the image file from storage
                $image->delete(); // Delete the image record from the database
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }


    public function destroy(int $id){
        Projects::destroy($id);
    }

}
