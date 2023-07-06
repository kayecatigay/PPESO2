<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,docx,',
        ]);

        // Get the uploaded file
        $file = $request->file('file');
       
        $userid = Auth()->user()->id;

        // Generate a unique name for the file
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Move the uploaded file to the desired location
        $file->move(public_path('uploads'), $fileName);

        // Save file details to the database
        $savedFile = new File();
        $savedFile->userid = $userid; 
        $savedFile->filename = $fileName;
        $savedFile->original_name = $file->getClientOriginalName();
        $savedFile->save();
        
        // Return a success response
        return view('EmpData', ['file' => $savedFile]);
    }
    public function showFile($id)
    {
        // Retrieve the file from the database
        $file = File::findOrFail($id);

        // Define the file path
        $filePath = public_path('uploads/' . $file->filename);

        // $userid = Auth::user->id();
        // Check if the file exists
        if (file_exists($filePath)) {
            // Set the appropriate headers for file download
            $headers = [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'inline; filename="' . $file->original_name  .'"',
                
            ];
            
            // Return the file response
            return response()->file($filePath, $headers);
        }

        // If the file doesn't exist, you can handle the error as needed
        abort(404, 'File not found');
    }
}
