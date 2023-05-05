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
    public function EditS(Request $request)
    {
        $empID=$request->input('empID');
        $showdata = DB::select('select * from employment where id=' .$empID);
        //dd($prod);
        return view('editEdata',['eEMP'=>$showdata]); 
    }
    public function addS(Request $request)
    {
        $SchedData = DB::insert('insert into sschedules(ScName, Date, Time, Loc, Proctor, Req) 
        values("' .$request->input('name') .'","' .$request->input('name') .'","' .$request->input('name') .'","'
        .$request->input('name') .'","' .$request->input('name'). '")');
        return view ('addSched');
    }
}
