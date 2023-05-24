<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class uProfileController extends Controller
{
    public function phome()
    {
        // $profhome=DB::select('select * from users');
        // return view ('uProfile',['pr'=>$profhome]);
        return view ('uProfile');
    }
    public function editP(Request $request)
    {
        $prID=$request->input('prID');
        
        $showdata = DB::select('select * from users where id=' .$prID);
        // dd($showdata);
        return view('editProfile',['ePr'=>$showdata]); 
    }
}
