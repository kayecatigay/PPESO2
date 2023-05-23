<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmpAdminController extends Controller
{
    public function EAdashboard()
    {
        return view('EmpDashboard');
    }
    public function showEmpData()
    {
        $empData= DB::select('select * from employment');
        return view('EmpData',['data'=>$empData]);
        // return view('EmpData');
    }
    public function editEdata(request $request) {
        $empID=$request->input('empID');
        $showdata = DB::select('select * from employment where id=' .$empID);
        //dd($prod);
        return view('editEdata',['data'=>$showdata]); 
    }
    public function updateEdata(request $request) {
        // dd($request->input('gender'));
        
        $language="";
        $language.= ($request->input('english')=="on") ? "|english" :"";
        $language.= ($request->input('tagalog')=="on") ? "|tagalog" :"";
        $language.= ($request->input('chinese')=="on") ? "|chinese" :"";
        $language=substr($language,1);  

        $empdata= DB::update('update employment set name="' .$request->input('name'). '",posidesired="' 
        .$request->input('posidesi'). '",gender="' .$request->input('gender'). '",address="' 
        .$request->input('add'). '",telephone="' .$request->input('telnum'). '",cellphone="' 
        .$request->input('cellphone'). '",emailadd="' .$request->input('emailadd'). '",birthday="' 
        .$request->input('birthday'). '",Cstatus="' .$request->input('cstatus'). '",spouse="' 
        .$request->input('spouse'). '",height="' .$request->input('height'). '",weight="' 
        .$request->input('weight'). '",language="' .$language. '",religion="' 
        .$request->input('religion'). '",elem="' .$request->input('elem'). '",hschool="' 
        .$request->input('hs'). '",college="' .$request->input('college'). '",degree="' 
        .$request->input('degree'). '",cname="' .$request->input('cname'). '",position="'
        .$request->input('posi'). '",crname="' .$request->input('crname'). '",crcompany="' 
        .$request->input('crcname'). '",crposition="' .$request->input('crposi'). '",crcontact="' 
        .$request->input('crcontact'). '" where id='.$request->input('id') .' ');

        // dd ($empdata);
        
        return redirect('/showAllEApp');
    }
    public function deleteEdata(Request $request){
        // dd($request->input('id'));
        DB::delete("DELETE FROM employment WHERE id = " .$request->input('delId'));
        
        return redirect('/showAllEApp');
    }
    public function Allworks()
    {
        $works= DB::select('select * from eworks');
        return view ('Eworks',['work'=>$works]);
    }
    public function addworks(Request $request)
    {
        return view('addWorks');
    }
    public function insertWorks(Request $request)
    {
        $skills="";
        $skills.= ($request->input('hardworking')=="on") ? ", hardworking" :"";
        $skills.= ($request->input('risk')=="on") ? ", risk taker" :"";
        $skills.= ($request->input('probsol')=="on") ? ", problem solving" :"";
        $skills.= ($request->input('creative')=="on") ? ", creative" :"";
        $skills.= ($request->input('multitask')=="on") ? ", multitasking" :"";
        $skills.= ($request->input('technical')=="on") ? ", technicality" :"";
        $skills.= ($request->input('leadership')=="on") ? ", leadership" :"";
        $skills.= ($request->input('analytics')=="on") ? ", analytics" :"";

        $req="";
        $req.= ($request->input('resume')=="on") ? ", resume" :"";
        $req.= ($request->input('visa')=="on") ? ", visa" :"";
        $req.= ($request->input('indigency')=="on") ? ", indigency" :"";
        $req.= ($request->input('PSA')=="on") ? ", psa" :"";
        $req=substr($req,1);  
        
        $AWorks=DB::insert('insert into eworks(date, jobdesc, company, skills, req, contact) 
        values("' .$request->input('date') .'","' .$request->input('jobdesc') .'","'.$request->input('company') .'","'
        .$skills .'","' .$req .'","' .$request->input('contact') .'")');
        return redirect ('AllWorks');
    }
   public function editW(Request $request)
   {
        $workID=$request->input('workID');
        $showData = DB::select('select * from eworks where id=' .$workID);
        return view ('editW',['wrk'=>$showData]);
   }
   public function updateW(Request $request)
   {
    $skills="";
    $skills.= ($request->input('hardworking')=="on") ? ", hardworking" :"";
    $skills.= ($request->input('risk')=="on") ? ", risk" :"";
    $skills.= ($request->input('probsol')=="on") ? ", probsol" :"";
    $skills.= ($request->input('creative')=="on") ? ", creative" :"";
    $skills.= ($request->input('multitask')=="on") ? ", multitask" :"";
    $skills.= ($request->input('technical')=="on") ? ", technical" :"";
    $skills.= ($request->input('leadership')=="on") ? ", leadership" :"";
    $skills.= ($request->input('analytics')=="on") ? ", analytics" :"";
    $skills=substr($skills,1);  

    $req="";
    $req.= ($request->input('resume')=="on") ? ", resume" :"";
    $req.= ($request->input('visa')=="on") ? ", visa" :"";
    $req.= ($request->input('indigency')=="on") ? ", indigency" :"";
    $req.= ($request->input('psa')=="on") ? ", psa" :"";
    $req=substr($req,1);  

    $Aworks= DB::update('update eworks set date="' .$request->input('date'). '",
    jobdesc="' .$request->input('jobdesc'). '", company="' .$request->input('company'). '",
    skills="' .$skills .'", req="' .$req. '",contact="' .$request->input('contact'). '" 
    where id='.$request->input('id') .' ');
    
    return redirect ('/AllWorks');
   }
   
   public function deleteW(Request $request)
   {
        // dd($request->input('delId'));
        DB::delete("DELETE FROM eworks WHERE id = " .$request->input('delId'));
            
        return redirect('/AllWorks');
   }
    public function allESched()
    {
        $esched=DB::select('select * from eschedules');
        return view('Esched',['sched'=>$esched]);
    }
    public function addeSched(Request $request)
   {
    return view ('addEsched');
   }
   public function insertEs(Request $request)
   {
    $req="";
    $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
    $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
    $req.= ($request->input('validid')=="on") ? ", validid" :"";
    $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
    $req.= ($request->input('water')=="on") ? ", water" :"";
    $req=substr($req,1);  
    // dd($req);
    $AWorks=DB::insert('insert into eschedules(type, EmName, Date, Time, Loc, work, Proctor, req) 
    values("' .$request->input('type') .'","' .$request->input('emname') .'","' .$request->input('date') .'","'.$request->input('time') .'","'
    .$request->input('loc') .'","' .$request->input('work') .'","' .$request->input('proctor')  .'","'  .$req.'")');

    return redirect('empSched');
   }
    public function editeSched(Request $request)
    {
        $eSchedid=$request->input('eSchedid');
        $showData = DB::select('select * from eschedules where id=' .$eSchedid);
        return view ('editEsched',['sched'=>$showData]);
    }
    public function updateEs(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1);  
        // dd($req);
        $Esched=DB::update('update eschedules set type="' .$request->input('type'). '", EmName="' .$request->input('emname'). '",
        Date="' .$request->input('date'). '", Time="' .$request->input('time'). '",
        Loc="' .$request->input('loc'). '", work="' .$request->input('work'). '",
        Proctor="' .$request->input('proctor'). '", req="' .$req .'" where id='.$request->input('id') .'');

        return redirect('empSched');
    }
    public function deleteESched(Request $request)
    {
        DB::delete("DELETE FROM eschedules WHERE id = " .$request->input('delId'));
        return redirect ('empSched');
    }
    public function eAnn()
    {
        $eannouncements=DB::select('select * from eannouncements');
        return view ('Eannouncements',['Eann'=>$eannouncements]);
    }
    public function addEann(Request $request)
    {
        return view ('addEann');
    }
    public function insertEann(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1);  

        // dd($request->input('type'));
        $SchedData = DB::insert('insert into eannouncements(date, schedule, details, req) 
        values("' .$request->input('date') .'","' .$request->input('sched') .'","' .$request->input('dets') .'","'
        .$req .'")');
        return redirect('Eannouncements');
    }
    public function EditeAnn(Request $request)
    {
        $EannID=$request->input('EannID');
        $showData = DB::select('select * from eannouncements where id=' .$EannID);
        return view ('EditEann',['eann'=>$showData]);
    }
    public function updateEann(Request $request)
    {
        $req="";
        $req.= ($request->input('pencil')=="on") ? ", pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? ", ballpen" :"";
        $req.= ($request->input('validid')=="on") ? ", validid" :"";
        $req.= ($request->input('snacks')=="on") ? ", snacks" :"";
        $req.= ($request->input('water')=="on") ? ", water" :"";
        $req=substr($req,1); 

        $announceData = DB::update('update eannouncements set date="' .$request->input('date'). '",schedule= 
        "' .$request->input('sched'). '",details= "' .$request->input('details'). '",req=
        "' .$req. '" where id='.$request->input('id') .' ');
        return redirect('Eannouncements');
    }
}
