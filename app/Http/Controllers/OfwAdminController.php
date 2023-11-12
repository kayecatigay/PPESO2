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
        $smenus=(new AdminController)->getLinks();
        $Tusers=DB::select('select * from users');
        $muser=DB::select('select * from uprofile where gender="male"');
        $fuser=DB::select('select * from uprofile where gender="female"');

        $AcceptedPEAP=DB::select('select * from scholarship where status="Approved"');
        $AcceptedEMP=DB::select('select * from employment where status="Approved"');
        $AcceptedOFW=DB::select('select * from ofw where status="Approved"');

        $Company=DB::select('SELECT cname,COUNT(*) as totalapp FROM employment GROUP BY cname');
        $AppCom=DB::select('SELECT count(id) FROM `employment` WHERE cname="Google"');

        return view('OfwDashboard',['smenu'=>$smenus,'totalusers'=>count($Tusers),
        'muser'=>count($muser),'fuser'=>count($fuser),'apeap'=>count($AcceptedPEAP),
        'aemp'=>count($AcceptedEMP),'aofw'=>count($AcceptedOFW),'comp'=>count($AppCom),
        'company'=>$Company]);
    }
    public function showOFWdata(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $ofwData= DB::select('
        SELECT *
        FROM ofw as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id;
        
        ');
        return view('OfwData',['ofwdata'=>$ofwData,'smenu'=>$smenus]);
    }
    public function editOdata(request $request) {
        $smenus=(new AdminController)->getLinks();
        $ofwID=$request->input('ofwID');
        $showdata = DB::select('select * from ofw where id=' .$ofwID);
        //dd($prod);
        return view('editOdata',['ofw'=>$showdata,'smenu'=>$smenus]); 
    }
    public function updateOdata(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('showAllOApp',['smenu'=>$smenus]);
    }
    public function deleteOdata(Request $request){
        $smenus=(new AdminController)->getLinks();
        // dd($request->input('id'));
        DB::delete("DELETE FROM ofw WHERE id = " .$request->input('delId'));
        
        return redirect('showAllOApp',['smenu'=>$smenus]);
    }
    public function ofwSched()
    {
        $smenus=(new AdminController)->getLinks();
        $OfwSched=DB::select('select * from oschedules');
        return view ('Osched',['ofwsched'=>$OfwSched,'smenu'=>$smenus]);
    }
    public function addOsched()
    {
        $smenus=(new AdminController)->getLinks();
        return view ('addOsched',['smenu'=>$smenus]);
    }
    public function insertoSched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('ofwSched',['smenu'=>$smenus]);
    }
    public function editOsched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $OschedID=$request->input('OschedID');
        $showdata = DB::select('select * from oschedules where id=' .$OschedID);

        return view('editOsched',['osc'=>$showdata,'smenu'=>$smenus]);
    }
    public function updateOSched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('ofwSched',['smenu'=>$smenus]);
    }
    public function deleteOsched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        DB::delete("DELETE FROM oschedules WHERE id = " .$request->input('delId'));
        return redirect('ofwSched',['smenu'=>$smenus]);
    }
    public function oAnn()
    {
        $smenus=(new AdminController)->getLinks();
        $annData = DB::select('select * from genannouncements where service="OFW"');
        // dd($annData);
        return view ('Sannouncements',['Sann'=>$annData,'smenu'=>$smenus]);
    }
    public function addOann()
    {
        $smenus=(new AdminController)->getLinks();
        return view('addOAnn',['smenu'=>$smenus]);
    }
    public function insertoAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('Oannouncements',['smenu'=>$smenus]);
    }
    public function EditOAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $OannID=$request->input('OannID');
        $showdata = DB::select('select * from oannouncements where id=' .$OannID);
        // dd($showdata);
        return view('editOann',['Oann'=>$showdata,'smenu'=>$smenus]);
    }
    public function updateOann(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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

        return redirect('Oannouncements',['smenu'=>$smenus]);
    }
    public function deleteOAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        DB::delete("DELETE FROM oannouncements WHERE id = " .$request->input('delId'));
        return redirect('Oannouncements',['smenu'=>$smenus]);
    }
    public function ostatus()
    {
        $smenus=(new AdminController)->getLinks();
        $ostatus=DB::select('select * from ofw');
        $ofwData = DB ::select('
        SELECT users.name
        FROM users
        INNER JOIN ofw ON users.id = ofw.userid; ');
        return view('ostatus',['status'=>$ostatus,'oName'=>$ofwData,'smenu'=>$smenus]);
    }
    public function onotif(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $id = $request->input('ONid');
        // dd($id);
        $OfwData = DB::select('
        SELECT *
        FROM users
        INNER JOIN ofw ON users.id = ofw.userid
        WHERE ofw.id =' .$id );
        // dd($EmpData);

        return view('oEmail',['oData'=>$OfwData,'smenu'=>$smenus]);
    }
    public function oapprove(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $id = $request->input('delIdofw');
        DB::update('update ofw set status="Approved" where id= ' .$id);

        $ostatus=DB::select('select * from ofw');
        return view('ostatus',['status'=>$ostatus,'smenu'=>$smenus]);
    }
    public function ofwP()
    {   
        $smenus=(new AdminController)->getLinks();
        $ofwData= DB::select('
        SELECT *
        FROM ofw as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id;
        
        ');
        return view('NLOfw',['ofwdata'=>$ofwData,'smenu'=>$smenus]);
    }
    public function ostatP()
    {
        $smenus=(new AdminController)->getLinks();
        $ostatus=DB::select('select * from ofw');
        return view('NLOstatus',['status'=>$ostatus,'smenu'=>$smenus]);
    }
}
