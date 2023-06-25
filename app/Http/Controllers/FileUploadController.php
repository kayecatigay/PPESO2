<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index() {
        return view('uploadfile');
    }
    //  public function showUploadFile(Request $request) {
    //     // dd("ggg");

    //     $file = $request->input('txtfile');
  
    //     // dd($file);
    //     //Display File Name
    //     echo 'File Name: '.$file->getClientOriginalName();
    //     echo '<br>';
     
    //     //Display File Extension
    //     echo 'File Extension: '.$file->getClientOriginalExtension();
    //     echo '<br>';
     
    //     //Display File Real Path
    //     echo 'File Real Path: '.$file->getRealPath();
    //     echo '<br>';
     
    //     //Display File Size
    //     echo 'File Size: '.$file->getSize();
    //     echo '<br>';
     
    //     //Display File Mime Type
    //     echo 'File Mime Type: '.$file->getMimeType();
     
    //     //Move Uploaded File
    //     $destinationPath = '/uploads';
    //     $file->move($destinationPath,$file->getClientOriginalName());
   
    // }
    public function showUploadFile(Request $request) {
        // Validate the file upload
        $request->validate([
            'txtfile' => 'required|file'
        ]);
    
        // Retrieve the uploaded file
        $file = $request->file('txtfile');
    
        // Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
    
        // Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
    
        // Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
    
        // Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
    
        // Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
    
        // Move Uploaded File
        $destinationPath = 'uploads'; // Adjust the destination path as needed
        $file->move($destinationPath, $file->getClientOriginalName());
        copy($file->getPathname(), $destinationPath.'/'.$file->getClientOriginalName());

        // $destinationPath = 'uploads';
        // if (!is_dir($destinationPath)) {
        //     mkdir($destinationPath, 0755, true);
        // }
    }
}
