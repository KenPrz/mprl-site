<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function send(Request $request){

        // Validate the request
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'product' => 'required',
        'message' => 'required|string',
    ]);
    try {
        
        return response()->json(['message' => $validated]);
    } catch (\Exception $e) {
        // Log the exception and return a 500 error response
        return response()->json(['message' => 'Failed to submit inquiry'], 500);
    }
    }
}
