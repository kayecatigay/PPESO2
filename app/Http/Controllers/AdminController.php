<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        return view ('dashboard');
    }
    public function ahome()
    {
        return view('adminhome');
    }
}
