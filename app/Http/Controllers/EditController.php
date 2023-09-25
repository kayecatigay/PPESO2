<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    
    public function homeedit(Request $request)
    {
        return view('edithome');
    }
    public function edithomepage()
    {
        return view('Eadminhome');
    }
    public function insertData(Request $request)
    {
        $userid=1;
        $showdata = DB::select('select * from homepage where userid=' .$userid);
        if($showdata)
        {
            $uphome = DB::update('update homepage set title="' .$request->input('title'). '",
            loc="' .$request->input('loc'). '",about= "' .$request->input('about'). '",
            aphoto="' .$request->input('aphoto'). '",stext= "' .$request->input('stext'). '",
            etext="' .$request->input('etext'). '",aOfw= "' .$request->input('aOfw'). '",
            Sstext="' .$request->input('Sstext'). '",Eetext= "' .$request->input('Eetext'). '",
            AaOfw="' .$request->input('AaOfw'). '",conLoc= "' .$request->input('conLoc'). '",
            email="' .$request->input('email'). '",cell= "' .$request->input('cell'). '",
            infoLoc="' .$request->input('infoLoc'). '",phone= "' .$request->input('phone'). '",
            iemail= "' .$request->input('iemail'). '" where userid='.$request->input('userid'). '');
        }
        else
        {
            $homepage = DB::insert('insert into homepage(userid,title,loc,about,aphoto,stext,etext,aOfw,Sstext,
            Eetext,AaOfw,conLoc,email,cell,infoLoc,phone,iemail,fb) values("' .$request->input('userid') .'",
            "' .$request->input('title') .'","' .$request->input('loc') .'","' .$request->input('about') .'",
            "' .$request->input('aphoto') .'","' .$request->input('stext') .'","' .$request->input('etext') .'",
            "' .$request->input('aOfw') .'","' .$request->input('Sstext') .'","' .$request->input('Eetext') .'",
            "' .$request->input('AaOfw') .'","' .$request->input('conLoc') .'","' .$request->input('email') .'",
            "' .$request->input('cell') .'","' .$request->input('infoLoc') .'","' .$request->input('phone') .'",
            "' .$request->input('iemail') .'","' .$request->input('fb') .'")'); 
        }
    //    dd($showdata);
        return view('Eadminhome',['show'=>$showdata]);
    }
}
