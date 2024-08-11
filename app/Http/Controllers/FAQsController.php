<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\ProjectCatergory;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class FAQsController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $faqs = Faqs::select('faqs.id', 'faqs.question', 'project_catergories.name as category_id', 'faqs.answer')
        ->join('project_catergories', 'project_catergories.id', '=', 'faqs.category_id')
        ->with('category:id,name')
        ->paginate(5);
        return Inertia::render('Admin/Faqs/Index', [
            'faqs' => $faqs
        ]);
    }
    public function create(){
        $categories = ProjectCatergory::all();
        return Inertia::render('Admin/Faqs/Create',[
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'question' => 'required',
            'category_id' => 'required',
            'answer' => 'required'
        ]);
        $faqs = Faqs::create([
            'question' => $request->input('question'),
            'category_id' =>  $request->input('category_id'),
            'answer' =>  $request->input('answer'),
        ]);
        return to_route('admin.faqs.index');
    }
    public function edit(int $id){
        $categories = ProjectCatergory::all();
        $faqs = Faqs::with(['category:id,name'])
                        ->where('id', $id)
                        ->firstOrFail();
        return Inertia::render('Admin/Faqs/Edit', [
            'categories' => $categories,
            'faqs' => $faqs
        ]);
    }
    public function update(Request $request, int $id){
        $request->validate([
            'question' => 'required',
            'category_id' => 'required',
            'answer' => 'required',
        ]);
        $project = Faqs::findOrFail($id);
        $project->update([
            'question' => $request->question,
            'category_id' => $request->category_id,
            'answer' => $request->answer
        ]);
        return redirect()->route('admin.faqs.index');
    }
    public function destroy(int $id){
        Faqs::destroy($id);
    }
}
