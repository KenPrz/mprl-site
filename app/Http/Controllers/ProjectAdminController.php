<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use App\Models\Projects;
use App\Models\Services;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectAdminController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $projects = Projects::select('projects.id', 'projects.title', 'project_categories.name as category_id', 'projects.content')
            ->join('project_categories', 'project_categories.id', '=', 'projects.category_id')
            ->with('category:id,name')
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
            'img_path' => 'array|max:3', // Assuming a maximum of 1 images can be uploaded
            'img_path.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Individual image validation
        ]);
        $projects = Projects::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
            'system_size' => $request->input('system_size'),
            'monthly_saving' => $request->input('monthly_saving'),
        ]);
       
        if($request->img_path) {
            foreach($request->file('img_path') as $img_path) {
                $filename = Str::uuid() . '.' . $img_path->getClientOriginalExtension();
                $path = $img_path->storeAs('product-images', $filename, 'public');
                $projects->images()->create([
                    'images' => $path,
                ]);
            }
        }
        return to_route('admin.projects.index')->with('success', 'File uploaded successfully');
    }
    public function edit(string $id){
        $categories = ProjectCategory::all();
        $project = Projects::with(['images', 'category:id,name'])
                            ->where('id', $id)
                            ->firstOrFail();
        
        // Map image URLs
        // $project->images = $project->images->map(function ($image) {
        //     return $image->url; // Assuming your images have a 'url' attribute
        // });

        return Inertia::render('Admin/Projects/Edit', [
            'categories' => $categories,
            'project' => $project
        ]);
    }
    public function update(Request $request, int $id){
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

        return redirect()->route('admin.projects.index');
    }

    public function destroy(int $id){
        Projects::destroy($id);
    }

}
