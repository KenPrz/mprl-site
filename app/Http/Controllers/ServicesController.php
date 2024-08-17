<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\ProjectCatergory;
use App\Models\Projects;
use App\Models\Services;
use App\Models\ServicesCategory;
use Inertia\Inertia;

class ServicesController extends Controller
{
    public function index()
    {
        $servicesCategory = ServicesCategory::select('id', 'service_category')->get();
        $projectCategory = ProjectCatergory::select('id', 'name')->get();
        $projects = Projects::with('firstImage')
                            ->orderBy('created_at', 'desc')->take(5)->get();
        $faqs = Faqs::orderBy('created_at', 'desc')->get();
        $services = Services::all();

        return Inertia::render('Services/Main', [
            'servicesCategory' => $servicesCategory,
            'services' => $services,
            'projectCategory' => $projectCategory,
            'projects' => $projects,
            'faqs' => $faqs
        ]);
    }
}
