<?php

namespace App\Http\Controllers;

use App\Models\ProjectCatergory;
use App\Models\Projects;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectAdminController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $projects = Projects::select('projects.id', 'projects.title', 'project_catergories.name as category_id', 'projects.content')
        ->join('project_catergories', 'project_catergories.id', '=', 'projects.category_id')
        ->with('category:id,name')
        ->paginate(10);
        return Inertia::render('Admin/Projects/Index', [
            'projects' => $projects
        ]);
    }
    public function create(){
        $categories = ProjectCatergory::all();
        return Inertia::render('Admin/Projects/Create',[
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:project_catergories,id',
            'content' => 'required',
            'system_size' => 'required|string',
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
}
