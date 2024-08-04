<?php

namespace App\Http\Controllers;

use App\Models\ProjectCatergory;
use App\Models\Services;
use App\Models\ServicesCategory;
use Inertia\Inertia;

class ServicesController extends Controller
{
    public function index()
    {
        $servicesCategory = ServicesCategory::select('id', 'service_category')->get();
        $projectCategory = ProjectCatergory::select('id', 'name')->get();
        $services = Services::all();

        // Log the data to ensure it's correct
    

        return Inertia::render('Services/Main', [
            'servicesCategory' => $servicesCategory,
            'services' => $services,
            'projectCategory' => $projectCategory
        ]);
    }
}
