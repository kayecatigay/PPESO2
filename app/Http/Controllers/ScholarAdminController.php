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
    public function newSD()
    {
        $scholardata = DB::select('select * from scholarship');
        // dd($scholardata);
        return view('newSD',['data'=>$scholardata]);
    }
    public function oldSD()
    {
        $scholardata = DB::select('select * from scholarship');
        // dd($scholardata);
        return view('oldSD',['data'=>$scholardata]);
    }
    public function allSched()
    {
        $schedData= DB::select('select * from sschedules');
        // dd($schedData);
        return view ('Asched',['sched'=>$schedData]);
    }
    public function Ssexam()
    {

        return view ('Esched');
    }
    public function addS(Request $request)
    {
        return view ('addSched');
    }
    public function insertS(Request $request)
    {
        dd($request->input('scholar'));
        // $SchedData = DB::insert('insert into sschedules(ScName, Date, Time, Loc, Proctor, Req) 
        // values("' .$request->input('name') .'","' .$request->input('name') .'","' .$request->input('name') .'","'
        // .$request->input('name') .'","' .$request->input('name'). '")');
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
        $schedData = DB::update('update sschedules set ScName="' .$request->input('scholar'). '",Date= 
        "' .$request->input('date'). '",Time= "' .$request->input('time'). '",Loc=
        "' .$request->input('location'). '",Proctor= "' .$request->input('proctor'). '",Req=
        "' .$request->input('requirements'). '",type= "' .$request->input('type'). '")');
        return redirect('AllSched');
    }
    public function deleteSched(Request $request)
    {
        DB::delete("DELETE FROM sschedules WHERE id = " .$request->input('delId'));
        
        return redirect('/AllSched');
    }
    
}
