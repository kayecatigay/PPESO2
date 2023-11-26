<?php

namespace App\Http\Controllers;

use App\Docs;
use App\Http\Controllers\Controller;
use App\Models\Docs as ModelsDocs;
use Illuminate\Http\Request;

class DocFileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $fileName, 'public');

        // Create a new Docs record in the database
        $fileRecord = ModelsDocs::create([
            'original_name' => $file->getClientOriginalName(),
            'file_name' => $fileName,
            'file_path' => 'uploads/' . $fileName, // Adjust the path based on your storage configuration
        ]);

        return view('NLEmpApp')->with('fileRecord', $fileRecord);
    }

    public function show($fileName)
    {
        $filePath = storage_path("app/public/uploads/{$fileName}");
        
        return response()->file($filePath);
    }
}
