<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OfwAdminController extends Controller
{
    public function OAdashboard()
    {
        return view('OfwDashboard');
    }
    public function showOFWdata(Request $request)
    {
        $ofwData= DB::select('
        SELECT *
        FROM ofw as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id;
        
        ');
        return view('OfwData',['ofwdata'=>$ofwData]);
    }
    public function editOdata(request $request) {
        $ofwID=$request->input('ofwID');
        $showdata = DB::select('select * from ofw where id=' .$ofwID);
        //dd($prod);
        return view('editOdata',['ofw'=>$showdata]); 
    }
    public function updateOdata(Request $request)
    {
        $ofwData = DB::update('update ofw set lastname="' .$request->input('lname'). '",firstname= 
        "' .$request->input('fname'). '",middlename= "' .$request->input('mname'). '",suffix=
        "' .$request->input('suffix'). '",birthday= "' .$request->input('birthday'). '",age=
        "' .$request->input('age'). '",sex= "' .$request->input('sex'). '",contactnum= 
        "' .$request->input('contactnum'). '",address= "' .$request->input('address'). '",passnum=
        "' .$request->input('passnum'). '",emailadd= "' .$request->input('emailadd'). '",fbacc=
        "' .$request->input('fbacc'). '",JobDesc= "' .$request->input('jobdesi').  '",OfwCat=
        "' .$request->input('ofwcat'). '",Company= "' .$request->input('company'). '",Country=
        "' .$request->input('country'). '",PeriodOfEmp= "' .$request->input('period').
        '" where id=' .$request->input('ofwId').' ');
        return redirect('showAllOApp');
    }
    public function deleteOdata(Request $request){
        // dd($request->input('id'));
        DB::delete("DELETE FROM ofw WHERE id = " .$request->input('delId'));
        
        return redirect('showAllOApp');
    }
    public function ofwSched()
    {
        $OfwSched=DB::select('select * from oschedules');
        return view ('Osched',['ofwsched'=>$OfwSched]);
    }
    public function addOsched()
    {
        return view ('addOsched');
    }
    public function insertoSched(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1);  

        // dd($request->input('type'));
        $SchedData = DB::insert('insert into oschedules(type, ofwname, date, time, loc, work, proctor, req) 
        values("' .$request->input('type') .'","' .$request->input('ofwname') .'","' .$request->input('date') 
        .'","' .$request->input('time') .'","' .$request->input('loc') .'","' .$request->input('work') 
        .'","' .$request->input('proctor') .'","' .$req.'")');
        return redirect('ofwSched');
    }
    public function editOsched(Request $request)
    {
        $OschedID=$request->input('OschedID');
        $showdata = DB::select('select * from oschedules where id=' .$OschedID);

        return view('editOsched',['osc'=>$showdata]);
    }
    public function updateOSched(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1);  

        $schedData = DB::update('update oschedules set ofwname="' .$request->input('ofwname'). '",date= 
        "' .$request->input('date'). '",time= "' .$request->input('time'). '",loc= "' .$request->input('loc'). '",work= 
        "' .$request->input('work'). '",proctor= "' .$request->input('proctor'). '",req="' .$req .'"
        where id='.$request->input('id') .' ');
        return redirect('ofwSched');
    }
    public function deleteOsched(Request $request)
    {
        DB::delete("DELETE FROM oschedules WHERE id = " .$request->input('delId'));
        return redirect('ofwSched');
    }
    public function oAnn()
    {
        $annData = DB::select('select * from genannouncements where service="OFW"');
        // dd($annData);
        return view ('Sannouncements',['Sann'=>$annData]);
    }
    public function addOann()
    {
        return view('addOAnn');
    }
    public function insertoAnn(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1);  

        // dd($request->input('type'));
        $SchedData = DB::insert('insert into oannouncements(date, schedule, details, req) 
        values("' .$request->input('date') .'","' .$request->input('sched') .'","' 
        .$request->input('dets') .'","' .$req .'")');
        return redirect('Oannouncements');
    }
    public function EditOAnn(Request $request)
    {
        $OannID=$request->input('OannID');
        $showdata = DB::select('select * from oannouncements where id=' .$OannID);
        // dd($showdata);
        return view('editOann',['Oann'=>$showdata]);
    }
    public function updateOann(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1); 

        $announceData = DB::update('update oannouncements set date="' .$request->input('date'). '",schedule= 
        "' .$request->input('sched'). '",details= "' .$request->input('details'). '",req="' .$req. '"
        where id='.$request->input('id') .' ');

        return redirect('Oannouncements');
    }
    public function deleteOAnn(Request $request)
    {
        DB::delete("DELETE FROM oannouncements WHERE id = " .$request->input('delId'));
        return redirect('Oannouncements');
    }
    public function ostatus()
    {
        $ostatus=DB::select('select * from ofw');
        return view('ostatus',['status'=>$ostatus]);
    }
    public function onotif(Request $request)
    {
        $id = $request->input('ONid');
        // dd($id);
        $OfwData = DB::select('
        SELECT *
        FROM users
        INNER JOIN ofw ON users.id = ofw.userid
        WHERE ofw.id =' .$id );
        // dd($EmpData);

        return view('oEmail',['oData'=>$OfwData]);
    }
    public function oapprove(Request $request)
    {
        $id = $request->input('delIdofw');
        DB::update('update ofw set status="Approved" where id= ' .$id);

        $ostatus=DB::select('select * from ofw');
        return view('ostatus',['status'=>$ostatus]);
    }
    public function ofwP()
    {
        $ofwData= DB::select('
        SELECT *
        FROM ofw as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id;
        
        ');
        return view('NLOfw',['ofwdata'=>$ofwData]);
    }
    public function ostatP()
    {
        $ostatus=DB::select('select * from ofw');
        return view('NLOstatus',['status'=>$ostatus]);
    }
}
