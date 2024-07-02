<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
class VisitorController extends Controller
{
    public function store(Request $request)
    {
        $ip_address = $request->ip();
        Visitor::firstOrCreate(['ip_address' => $ip_address]);
        return response()->json(['message' => 'Visitor saved']);
    }

}
