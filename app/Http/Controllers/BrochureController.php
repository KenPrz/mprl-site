<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
class BrochureController extends Controller
{
    public function downLoadBrochure(Request $request)
    {
        $file = public_path()."/storage/Brochure/Brochure.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, 'brochure.pdf', $headers);
    }

    public function store(Request $request)
    {
        if(auth()->user()->role_id !== 1) {
            abort(403);
        }
    
        $request->validate([
            'file' => 'required|mimes:pdf|max:999999', // 10MB limit
        ]);
    
        try {
            $file = $request->file('file');
            $fileName = 'Brochure.' . $file->getClientOriginalExtension();
            $filePath = 'Brochure/' . $fileName;
    
            // Check if the file already exists and delete it
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
    
            // Store the new file
            $is_stored = Storage::disk('public')->putFileAs('Brochure', $file, $fileName);
    
            if ($is_stored) {
                return to_route('dashboard')->with('success', 'File uploaded successfully');
            } else {
                return to_route('dashboard')->with('error', 'File upload failed');
            }
        } catch (\Exception $e) {
            return to_route('dashboard')->with('error', $e->getMessage());
        }
    }
}
