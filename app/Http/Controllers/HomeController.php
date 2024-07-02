<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->check() == false || auth()->user()->role_id != 1){
            $ip_address = request()->ip();
            Visitor::firstOrCreate(['ip_address' => $ip_address]);
        }
        return Inertia::render('Welcome');   
    }
}
