<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $titles=DB::select('select * from titles');
        // dd($titles);
        return view('home',['title' => $titles]);
    }
    public function news()
    {
        return view('announcements');
    }
    public function about()
    {
        return view('about');
    }
}
?>