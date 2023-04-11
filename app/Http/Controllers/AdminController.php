<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
