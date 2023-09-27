<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



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
        $showdata = DB:: select('select * from homepage');
        // dd($request->input('file'));
        return view('home',['show'=>$showdata]);
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
        $pass=Hash::make($request->input('pass'));
        // dd( $pass));
        $representative=$request->input('lname').',' .$request->input('fname').' '.$request->input('mname');

        $insertData= DB :: insert ('insert into company(cname, contact, email, representative) 
        values("' .$request->input('cname') .'","' .$request->input('contact') .'",
        "' .$request->input('email') .'","' .$representative .'")');

        $insertRep= DB :: insert ('insert into users (roles, name, lastname, firstname, middlename, email, password)
        values(99,"' .$representative .'","' .$request->input('lname') .'","' .$request->input('fname') .'",
        "' .$request->input('mname') .'","' .$request->input('email') .'","' .$pass .'")');

        return redirect('home');
    }
    public function OseasReq()
    {
        return view('cOverseas');
    }
}
?>