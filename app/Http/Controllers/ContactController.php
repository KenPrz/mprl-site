<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact/Main');
    }
    /**
     * Handle the form submission and send the email.
     */
    public function sendEmail(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->back()->withErrors(['loginRequired' => true]);
        }

        // Validate the form data
        $data = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|max:50',
            'contact_number' => ['required', 'string', 'regex:/^(09|\\+639)\\d{9}$/'], 
            'address' => 'required|string',
            'monthly_elecBill' => 'required|numeric',
            'date' => 'required|date',
            'message' => 'required|string',
        ]);

        // Send the email using the ContactFormMail class
        Mail::to('kendarylausteroperez@gmail.com')->send(new ContactFormMail($data));
        // mprlsolarpanel@gmail.com

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
