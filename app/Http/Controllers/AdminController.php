<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function aphome()
    {
        return view ('Aprofile');
    }
    public function dashboard()
    {
        
        return view ('dashboard');
    }
    public function ahome(Request $request)
    {
        if (!($request->user()->roles)) { //check if user is logged in
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
        else
        {
            return view('adminhome');
        }
        
    }
    public function side()
    {
        return view('sidebar');
    }
    public function peapD(Request $request)
    {
        $scholardata = DB::select('select * from scholarship');
        // dd($scholardata);
        return view('peapDash',['data'=>$scholardata]);
    }
    public function editPdata(request $request) {
        $peadID=$request->input('peadID');
        $showdata = DB::select('select * from scholarship where id=' .$peadID);
        //dd($prod);
        return view('editPdata',['ePEAP'=>$showdata]); 
    }
    public function updatePdata(request $request) {
        $updatestat=DB::update('update scholarship set name="' .$request->input('name'). '",sex="' 
        .$request->input('gender'). '",address="' .$request->input('add'). '",emailadd="' 
        .$request->input('emailadd'). '",contactnum="' .$request->input('contactnum'). '",birthday="' 
        .$request->input('birthday'). '",placeofbirth="' .$request->input('birthplace'). '",age="' 
        .$request->input('age'). '",height="' .$request->input('height'). '",weight="' 
        .$request->input('weight'). '",bloodtype="' .$request->input('bloodtype'). '",religion="' 
        .$request->input('religion'). '",guardian="' .$request->input('guardian'). '",relation="' 
        .$request->input('relationship').'" where id='.$request->input('id') .' ');
        
        return redirect('/peapD');
    }
    public function deletePdata(Request $request){
        // dd($request->input('id'));
        DB::delete("DELETE FROM scholarship WHERE id = " .$request->input('delId'));
        
        return redirect('/peapD');
    }
    
    public function empD()
    {
        $applicant = DB::select('select * from employment');
        // dd($applicant);
        return view('empDash',['employee'=>$applicant]);
        // return view('empDash');
    }
    public function ofwD()
    {
        $ofw = DB::select('select * from ofw');
        // dd($ofw);
        return view('ofwDash',['data'=>$ofw]);
    }
}
