<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\reqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        dd($savedFile);
        // Return a success response

        $showdata = DB::select('select * from uprofile where userid=' .$userid);

        // dd($showdata);
        if(!$showdata)
        {
            $pData = DB::insert('insert into uprofile(userid) values(' .$userid .')');
            $showdata = DB::select('select * from uprofile where userid=' .$userid);
        }
        // dd($showdata);
        $showwork = DB::select('select * from uwork where userid=' .$userid);
        $fileData=DB::select('select * from files where userid=' .$userid);
        return view('AddProfile',['pdata'=>$showdata,'uwork'=>$showwork,'files'=>$fileData]);
    }
    public function uploadPhoto(Request $request)
    {
        $userid=$request->input('userid');
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
        // dd($savedFile);
        // Return a success response
        $showData = DB::select('select * from homepage');
        $fileData=DB::select('select * from files where userid=' .$userid);

        return view('Eadminhome',['files'=>$fileData,'show'=>$showData]);
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
    public function uploadReqs(Request $request)
    {

        $userid=$request->input('userid');
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
        $savedFile = new reqs();
        $savedFile->userid = $userid; 
        $savedFile->filename = $fileName;
        $savedFile->original_name = $file->getClientOriginalName();
        $savedFile->save();
        // dd($savedFile);
        // Return a success response
 
return redirect('userprofile');
       
    }
}
