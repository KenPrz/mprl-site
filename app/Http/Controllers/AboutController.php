<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Inertia\Inertia;
class AboutController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'sectionName' =>['string','nullable'],
        ]);
        return Inertia::render('About/Main',[
            'sectionScroll' => $request->input('sectionName'),
        ]);
    }
}
