<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class FAQsController extends Controller
{
    public function index(Request $request){
        $search_query = $request->searchQuery;
        $faqs = Faqs::select('faqs.id', 'faqs.question', 'project_categories.name as category_id', 'faqs.answer')
        ->join('project_categories', 'project_categories.id', '=', 'faqs.category_id')
        ->with('category:id,name')
        ->orderBy('faqs.created_at', 'desc')
        ->paginate(5);

        foreach ($faqs as $faq) {
            $faq->answer = strip_tags(substr($faq->answer, 0, 50));
        }
        return Inertia::render('Admin/Faqs/Index', [
            'faqs' => $faqs
        ]);
    }
    public function create(){
        $categories = ProjectCategory::all();
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
            'question' => $request->question,
            'category_id' =>  $request->category_id,
            'answer' =>  $request->answer,
        ]);
        return to_route('admin.faqs.index');
    }
    public function edit(int $id){
        $categories = ProjectCategory::all();
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
