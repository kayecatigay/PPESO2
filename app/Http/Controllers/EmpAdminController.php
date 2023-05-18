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
    public function allESched(Request $request)
    {
        return view ('')
    }
}
