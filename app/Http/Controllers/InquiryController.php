<?php

namespace App\Http\Controllers;

use App\Mail\ProductInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function send(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->back()->withErrors(['loginRequired' => true]);
        }

        // Validate the request
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'product' => 'required',
            'message' => 'required|string',
        ]);
        try {
            Mail::to('mprlsolarpanel@gmail.com')->send(new ProductInquiryMail($data));

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Log the exception and return a 500 error response
            return response()->json(['message' => 'Failed to submit inquiry'], 500);
        }
    }
}
