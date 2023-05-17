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
        // $schedID=$request->input('schedID');
        // $showdata = DB::select('select * from sschedules where typeS=' .$schedID);
        $scholardata = DB::select('select * from scholarship where typeS="old"');
        $scholardatanew = DB::select('select * from scholarship where typeS="new"');
        // dd($scholardata);
        return view('ScholarAll',['dataold'=>$scholardata,'datanew'=>$scholardatanew]);
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
    public function editPdata(request $request) {
        $peadID=$request->input('peadID');
        $showdata = DB::select('select * from scholarship where id=' .$peadID);
        //dd($prod);
        return view('editPdata',['ePEAP'=>$showdata]); 
    }
    public function updatePdata(request $request) {
        DB::update('update scholarship set typeS="' .$request->input('typeS') .'",name="' .$request->input('name') .'",sex="' .$request->input('gender') .'",address="' .$request->input('add') .'",emailadd="' .$request->input('emailadd') .'",
        contactnum="' .$request->input('contactnum') .'",placeofbirth="' .$request->input('birthplace') .'",birthday="' .$request->input('birthday') .'",age=' .$request->input('age') .',
        height='. $request->input('height') .',weight=' .$request->input('weight') .',bloodtype="' .$request->input('bloodtype') .'",religion="' .$request->input('religion') .'",
        guardian="' .$request->input('guardian') .'",relation="' .$request->input('relationship') .'",yGraduated="' .$request->input('yGraduated') .'",school="' .$request->input('school')
        .'",work="' .$request->input('work') .'",companyn="' .$request->input('cname') .'" where id=' .$request->input('id') .' ');
        
        return redirect('/showAllSApp');
    }
    public function deletePdata(Request $request){
        // dd($request->input('id'));
        DB::delete("DELETE FROM scholarship WHERE id = " .$request->input('delId'));
        
        return redirect('/showAllSApp');
    }
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
    public function Stracking()
    {
        $tracking = DB::select('select * from stracking');
        return view('Stracking',['track'=>$tracking]);
    }
}
