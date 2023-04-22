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
