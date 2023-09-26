<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
    public function localReq()
    {
        return view('cLocal');
    }
    public function OseasReq()
    {
        return view('cOverseas');
    }
}
?>