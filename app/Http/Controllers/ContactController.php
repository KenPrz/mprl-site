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
        // Validate the form data
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_num' => 'required|string|max:255',
            'address' => 'required|string',
            'monthly_elecBill' => 'required|string|max:255',
            'date' => 'required|date',
            'message' => 'required|string',
        ]);

        // Send the email using the ContactFormMail class
        Mail::to('mprl@gmail.com')->send(new ContactFormMail($data)); // Change the email to the recipient address

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

