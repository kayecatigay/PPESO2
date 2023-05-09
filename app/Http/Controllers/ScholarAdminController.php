<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarAdminController extends Controller
{
    public function SAdashboard()
    {
        return view('ScholarDashboard');
    }
    public function scholarNOData()
    {
        $scholardata = DB::select('select * from scholarship');
        // dd($scholardata);
        return view('ScholarAll',['data'=>$scholardata]);
    }
    // public function newSD()
    // {
    //     $scholardata = DB::select('select * from scholarship');
    //     // dd($scholardata);
    //     return view('newSD',['data'=>$scholardata]);
    // }
    // public function oldSD()
    // {
    //     $scholardata = DB::select('select * from scholarship');
    //     // dd($scholardata);
    //     return view('oldSD',['data'=>$scholardata]);
    // }
    public function allSched()
    {
        $schedData= DB::select('select * from sschedules');
        // dd($schedData);
        return view ('Asched',['sched'=>$schedData]);
    }
   
    public function addS(Request $request)
    {
        return view ('addSched');
    }
    public function insertS(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? "|pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? "|ballpen" :"";
        $req.= ($request->input('validid')=="on") ? "|validid" :"";
        $req.= ($request->input('snacks')=="on") ? "|snacks" :"";
        $req.= ($request->input('water')=="on") ? "|water" :"";
        $req=substr($req,1);  

        // dd($request->input('type'));
        $SchedData = DB::insert('insert into sschedules(ScName, Date, Time, Loc, Proctor, Req, type) 
        values("' .$request->input('scholar') .'","' .$request->input('date') .'","' .$request->input('time') .'","'
        .$request->input('location') .'","' .$request->input('proctor') .'","' .$request->input('type') .'","' .$req.'")');
        return redirect('SAllSched');
    }
    public function editSched(Request $request)
    {
        $schedID=$request->input('schedID');
        $showdata = DB::select('select * from sschedules where id=' .$schedID);
        //dd($prod);
        return view('editSched',['sched'=>$showdata]); 
    }
    public function updateS(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? "|pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? "|ballpen" :"";
        $req.= ($request->input('validid')=="on") ? "|validid" :"";
        $req.= ($request->input('snacks')=="on") ? "|snacks" :"";
        $req.= ($request->input('water')=="on") ? "|water" :"";
        $req=substr($req,1);  
        // dd($request->input('Time'));
        $schedData = DB::update('update sschedules set ScName="' .$request->input('scholar'). '",Date= 
        "' .$request->input('date'). '",Time= "' .$request->input('time'). '",Loc=
        "' .$request->input('location'). '",Proctor= "' .$request->input('proctor'). '",Req=
        "' .$req. '",type= "' .$request->input('type'). '" where id='.$request->input('id') .' ');
        return redirect('SAllSched');
    }
    public function deleteSched(Request $request)
    {
        // dd($request->input('delId'));
        DB::delete("DELETE FROM sschedules WHERE id = " .$request->input('delId'));
        
        return redirect('/SAllSched');
    }
    public function sAnn()
    {
        $annData = DB::select('select * from sannouncements');
        // dd($annData);
        return view ('Sannouncements',['Sann'=>$annData]);
    }
    public function addAnn()
    {
        return view ('addAnn');
    }
    public function insertA(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? "|pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? "|ballpen" :"";
        $req.= ($request->input('validid')=="on") ? "|validid" :"";
        $req.= ($request->input('snacks')=="on") ? "|snacks" :"";
        $req.= ($request->input('water')=="on") ? "|water" :"";
        $req=substr($req,1);  

        // dd($request->input('type'));
        $SchedData = DB::insert('insert into sannouncements(date, schedule, details, req) 
        values("' .$request->input('date') .'","' .$request->input('sched') .'","' .$request->input('dets') .'","'
        .$req .'")');

        return redirect('Sannouncements');
    }
    public function editAnn(Request $request)
    {
        $annData=$request->input('annID');
        
        $showdata = DB::select('select * from sannouncements where id=' .$annData);
        // dd($showdata);
        return view('editAnn',['ann'=>$showdata]); 
    }
    public function updateA(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? "|pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? "|ballpen" :"";
        $req.= ($request->input('validid')=="on") ? "|validid" :"";
        $req.= ($request->input('snacks')=="on") ? "|snacks" :"";
        $req.= ($request->input('water')=="on") ? "|water" :"";
        $req=substr($req,1); 

        $announceData = DB::update('update sannouncements set date="' .$request->input('date'). '",schedule= 
        "' .$request->input('sched'). '",details= "' .$request->input('dets'). '",req=
        "' .$req. '" where id='.$request->input('id') .' ');

        return redirect('/Sannouncements');
    }
    public function deleteAnn(Request $request)
    {
        DB::delete("DELETE FROM sannouncements WHERE id = " .$request->input('delId'));

        return redirect('/Sannouncements');
    }
    
}
