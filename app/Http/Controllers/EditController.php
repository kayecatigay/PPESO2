<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function edithomepage(Request $request)
    {   
        $showFile=DB::select('select * from files');
        $showhome=DB::select('select * from homepage');
        return view('Eadminhome',['show'=>$showhome,'files'=>$showFile]);
    }
    public function homeedit(Request $request)
    {
        $showhome=DB::select('select * from homepage');
        return view('edithome',['show'=>$showhome]);
    }
    public function insertData(Request $request)
    {
        $userid=1;
        $showdata = DB::select('select * from homepage where userid=' .$userid);
        if($showdata)
        {
            // dd('update homepage set title="' .$request->input('title'). '",
            // loc="' .$request->input('loc'). '",about= "' .$request->input('about'). '",
            // aphoto="' .$request->input('aphoto'). '",stext= "' .$request->input('stext'). '",
            // etext="' .$request->input('etext'). '",aOfw= "' .$request->input('aOfw'). '",
            // Sstext="' .$request->input('Sstext'). '",Eetext= "' .$request->input('Eetext'). '",
            // AaOfw="' .$request->input('AaOfw'). '",conLoc= "' .$request->input('conLoc'). '",
            // email="' .$request->input('email'). '",cell= "' .$request->input('cell'). '",
            // infoLoc="' .$request->input('infoLoc'). '",phone= "' .$request->input('phone'). '",
            // iemail= "' .$request->input('iemail'). '" where userid='.$request->input('userid') . '');

            $uphome = DB::update('update homepage set title="' .$request->input('title'). '",
            loc="' .$request->input('loc'). '",about= "' .$request->input('about').'",
            filename= "' .$request->input('file'). '",stext= "' .$request->input('stext'). '",
            etext="' .$request->input('etext'). '",aOfw= "' .$request->input('aOfw'). '",
            Sstext="' .$request->input('Sstext'). '",Eetext= "' .$request->input('Eetext'). '",
            AaOfw="' .$request->input('AaOfw'). '",conLoc= "' .$request->input('conLoc'). '",
            email="' .$request->input('email'). '",cell= "' .$request->input('cell'). '",
            infoLoc="' .$request->input('infoLoc'). '",phone= "' .$request->input('phone'). '",
            iemail= "' .$request->input('iemail'). '" where userid='.$request->input('userid') . '');
        }
        else
        {
            $homepage = DB::insert('insert into homepage(userid,title,loc,about,filename,stext,etext,aOfw,Sstext,
            Eetext,AaOfw,conLoc,email,cell,infoLoc,phone,iemail,fb) values("' .$request->input('userid') .'",
            "' .$request->input('title') .'","' .$request->input('loc') .'","' .$request->input('about') .'",
            "' .$request->input('file') .'","' .$request->input('stext') .'","' .$request->input('etext') .'",
            "' .$request->input('aOfw') .'","' .$request->input('Sstext') .'","' .$request->input('Eetext') .'",
            "' .$request->input('AaOfw') .'","' .$request->input('conLoc') .'","' .$request->input('email') .'",
            "' .$request->input('cell') .'","' .$request->input('infoLoc') .'","' .$request->input('phone') .'",
            "' .$request->input('iemail') .'","' .$request->input('fb') .'")'); 
        }
    //    dd($showdata);
        // dd($request->file('file'));
        // $this->uploadPic($$request);
        return view('Eadminhome',['show'=>$showdata]);
    }
    
    public function uploadPic(Request $request)
    {
        $userid=$request->input('userid');
        // dd($userid);
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,docx,',
        ]);
        
        // Get the uploaded file
        $file = $request->file('file');
        // dd($request->file('file'));

       
        $userid = Auth()->user()->id;

        // Generate a unique name for the file
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        // Move the uploaded file to the desired location
        $file->move(public_path('uploads'), $fileName);

        // Save file details to the database
        $savedFile = new File();
        // $savedFile->userid = $userid; 
        $savedFile->filename = $fileName;
        // $savedFile->original_name = $file->getClientOriginalName();
        // $savedFile->save();

        // dd($savedFile);
        // Return a success response
        $showData = DB::select('select * from homepage');
        $upFile = DB::update('update homepage set filename="' .$fileName .'"
        where userid='.$request->input('userid') . '');
        $fileData=DB::select('select * from files where userid=' .$userid);

        return view('Eadminhome',['files'=>$fileData,'show'=>$showData]);
    }
}
