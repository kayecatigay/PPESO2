<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\File;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $userid = $request->input('userid');
        // $showpic = DB::select('select * from uprofile where userid=' .$userid);
        $showdata = DB:: select('select * from homepage');
        $showworks = DB:: select('select * from eworks');
        
        // dd($request->input('file'));
        // return view('home',['show'=>$showdata,'eworks'=>$showworks,'pic'=>$showpic]);
        return view('home',['show'=>$showdata,'eworks'=>$showworks]);
    }
    public function uploadpPic(Request $request)
    {
        $userid = Auth()->user()->id;
        // dd($userid);
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,docx,',
        ]);
        
        // Get the uploaded file
        $file = $request->file('file');
        // dd($request->file('file'));

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
        $showData = DB::select('select * from uprofile where userid=' .$userid);
        $upFile = DB::update('update uprofile set filename="' .$fileName .'" where userid='.$userid );
        $profile=DB::select('select filename from uprofile where userid=' .$userid);

        return view('Uprofile',['show'=>$showData,'pic'=>$profile]);
    }
    public function emphome()
    {
        $showdata = DB:: select('select * from homepage');
        return view ('homeEmployer',['show'=>$showdata]);
    }
    public function news()
    {
        return view('announcements');
    }
    public function about()
    {
        return view('about');
    }
    public function ppolicy()
    {
        return view('policy');
    }
    public function choose()
    {
        return view('choosing');
    }
    public function localReq(Request $request)
    {
        return view('cLocal');
    }
    public function inserts(Request $request)
    {    
        $type=$request->input('type');
        $pass=Hash::make($request->input('pass'));
        // dd( $type);
        $representative=$request->input('lname').',' .$request->input('fname').' '.$request->input('mname');
        
        $insertData= DB :: insert ('insert into company(type, cname, contact, email, representative) 
        values("' .$type .'","' .$request->input('cname') .'",
        "' .$request->input('contact') .'","' .$request->input('email') .'","' .$representative .'")');

        $insertRep= DB :: insert ('insert into users (roles, name, lastname, firstname, middlename, email, password)
        values(99,"' .$representative .'","' .$request->input('lname') .'","' .$request->input('fname') .'",
        "' .$request->input('mname') .'","' .$request->input('email') .'","' .$pass .'")');

        return redirect('/homeEmp');
    }
    public function update(Request $request)
    {
        $name = Auth::user()->name;
        $userid = Auth::user()->id;
    
        $fileData = DB::select('select * from reqs where userid=' . $userid);
    
        $showData = DB::update('update company set cname="' . $request->input('cname') . '", contact="' . $request->input('contact') . '", email="' . $request->input('email') . '", representative="' . $request->input('rep') . '" where id=' . $userid);
    
        $showNames = DB::update('update users set firstname="' . $request->input('fname') . '", middlename="' . $request->input('mname') . '", lastname="' . $request->input('lname') . '" where name="' . $name . '"');
    
        
        // Check if $showData and $showNames are successful updates
        if ($showData !== false && $showNames !== false) {
            // Reload the updated data
            $fileData = DB::select('select * from reqs where userid=' . $userid);
    
            // Retrieve user data again
            $showData = DB::select('select * from company where id=' . $userid);
            $showNames = DB::select('select * from users where name="' . $name . '"');
    
            return view('comprofile', ['show' => $showData, 'name' => $showNames, 'files' => $fileData]);
        } else {
            // Handle the case where the updates fail
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
        // dd($showData);
    }
    
    public function OseasReq(Request $request)
    {
        return view('cOverseas');
    }
    public function napproval()
    {
        return view('needapproval');
    }
    public function deletecol(Request $request)
    {
        DB::delete("DELETE FROM reqs WHERE id = " .$request->input('delId'));
        // dd($request->input('delId'));
        return redirect('/userprofile');
    }
    
}
?>