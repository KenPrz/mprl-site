<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProjectAdminController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $projects = Projects::select('projects.id', 'projects.name', 'project_catergories.name as category_id', 'projects.description')
        ->join('project_catergories', 'project_catergories.id', '=', 'projects.category_id')
        ->with('category:id,name')
        ->paginate(10);
        return Inertia::render('Admin/Projects/Index', [
            'projects' => $projects
        ]);
    }
}
