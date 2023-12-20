<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class EmpAdminController extends Controller
{
    public function EAdashboard()
    {
        $smenus=(new AdminController)->getLinks();
        $stat=DB::select('select * from employment where status="Approved"');
        $Applicants=DB::select('select * from employment');
        $monthlyCounts = DB::select('SELECT DATE_FORMAT(date, "%Y-%m") as month, 
        COUNT(*) as count FROM employment GROUP BY month');

        $hiredEmp = DB::select('select * from users where roles=4');
        // dd($hiredEmp);
        $companies = DB::select("SELECT cname, COUNT(*) as count FROM employment GROUP BY cname");
        // dd($companies);
        return view('EmpDashboard',['smenu'=>$smenus,'applicants'=>count($Applicants),'accepted'=>count($stat),
        'monthlyCounts' => $monthlyCounts, 'companies' => $companies, 'hiredEmp'=>count($hiredEmp)]);
    }
    public function showEmpData(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $userid=Auth::user()->id;
        // $fileData=DB::select('select * from files ');
        
        $empData= DB::select('
        SELECT *
        FROM employment as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id
        INNER JOIN files as f
        ON p.userid = f.userid;
                
        ');
        // dd($empData);
        $fileData=DB::select('select * from files where userid=' .$userid);
        return view('EmpData',['data'=>$empData,'files'=>$fileData,'smenu'=>$smenus]);
        // return view('EmpData');
    }
    public function Etracking(Request $request){
        $smenus=(new AdminController)->getLinks();
        $userid=Auth::user()->id;
        
        $txtsearch=$request->input('filter');
        // var_dump($txtsearch);
        $condition = " AND (u.name LIKE '%" . $txtsearch . "%' OR p.age LIKE '%" . 
        $txtsearch . "%' OR p.gender LIKE '%" . $txtsearch . "%' OR r.posidesired LIKE '%" . 
        $txtsearch . "%' OR r.cname LIKE '%" . $txtsearch . "%' OR p.hire LIKE '%" . $txtsearch . "%' )";

        // dd($condition);
        // $tEracking = DB::select('select * from stracking' .$condition);
        $empData = DB::select('
        SELECT *
        FROM uprofile AS p
        INNER JOIN users AS u ON p.userid = u.id
        INNER JOIN employment AS r ON r.userid = p.userid
        INNER JOIN files AS f ON f.userid = p.userid
        ' . $condition . ';');
        // dd($empData);
        $fileData=DB::select('select * from files where userid=' .$userid);
        return view('EmpData',['data'=>$empData, 'txts' => $txtsearch, 'files'=>$fileData,'smenu'=>$smenus]);
    }
    public function editEdata(request $request) 
    {
        $smenus=(new AdminController)->getLinks();
        $empID=$request->input('empID');
        $showdata = DB::select('select * from employment where id=' .$empID);
        //dd($prod);
        return view('editEdata',['data'=>$showdata,'smenu'=>$smenus]); 
    }
    public function updateEdata(request $request) 
    {
        $smenus=(new AdminController)->getLinks();
        // dd($request->input('gender'));
      

        $empdata= DB::update('update employment set name="' .$request->input('name'). '",posidesired="' 
        .$request->input('posidesi'). '",gender="' .$request->input('gender'). '",region= "' 
        .$request->input('region'). '",province="' .$request->input('province'). '",mun= "' 
        .$request->input('mun'). '",barangay="' .$request->input('barangay'). '",  sitio="' 
        .$request->input('sitio'). '",telephone="' .$request->input('telnum'). '",cellphone="' 
        .$request->input('cellphone'). '",emailadd="' .$request->input('emailadd'). '",birthday="' 
        .$request->input('birthday'). '",Cstatus="' .$request->input('cstatus'). '",spouse="' 
        .$request->input('spouse'). '",height="' .$request->input('height'). '",weight="' 
        .$request->input('weight'). '",religion="' 
        .$request->input('religion'). '",elem="' .$request->input('elem'). '",hschool="' 
        .$request->input('hs'). '",college="' .$request->input('college'). '",degree="' 
        .$request->input('degree'). '",cname="' .$request->input('cname'). '",position="'
        .$request->input('posi'). '",crname="' .$request->input('crname'). '",crcompany="' 
        .$request->input('crcname'). '",crposition="' .$request->input('crposi'). '",crcontact="' 
        .$request->input('crcontact'). '" where id='.$request->input('id') .' ');

        // dd ($empdata);
        
        return redirect('/showAllEApp',['smenu'=>$smenus]);
    }
    public function deleteEdata(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        // dd($request->input('id'));
        DB::delete("DELETE FROM employment WHERE id = " .$request->input('delId'));
        
        return redirect('/showAllEApp',['smenu'=>$smenus]);
    }
    public function Allworks()
    {
        $smenus=(new AdminController)->getLinks();
        $works= DB::select('select * from eworks');
        return view ('Eworks',['work'=>$works,'smenu'=>$smenus]);
    }
    public function addworks(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        return view('addWorks',['smenu'=>$smenus]);
    }
    public function insertWorks(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $works= DB::select('select * from eworks');
        $AWorks=DB::insert('insert into eworks(date, jobdesc, company, contact) 
        values("' .$request->input('date') .'","' .$request->input('jobdesc') .'","'.$request->input('company') .'","'
        .$request->input('contact') .'")');
        return view ('/Eworks',['work'=>$works,'smenu'=>$smenus]);
    }
   public function editW(Request $request)
   {
        $smenus=(new AdminController)->getLinks();
        $workID=$request->input('workID');
        $works= DB::select('select * from eworks');
        $showData = DB::select('select * from eworks where id=' .$workID);
        return view ('editW',['wrk'=>$showData,'work'=>$works,'smenu'=>$smenus]);
   }
   public function updateW(Request $request)
   {
    $smenus=(new AdminController)->getLinks();
    
    $Aworks= DB::update('update eworks set date="' .$request->input('date'). '",
    jobdesc="' .$request->input('jobdesc'). '", company="' .$request->input('company'). '",
    contact="' .$request->input('contact'). '" 
    where id='.$request->input('id') .' ');
    $works= DB::select('select * from eworks');

    return view ('/Eworks',['work'=>$works,'smenu'=>$smenus]);
   }
   
   public function deleteW(Request $request)
   {
        $smenus=(new AdminController)->getLinks();
        // dd($request->input('delId'));
        DB::delete("DELETE FROM eworks WHERE id = " .$request->input('delId'));
        $works= DB::select('select * from eworks');

        return view('/Eworks',['work'=>$works,'smenu'=>$smenus]);
   }
    public function allESched()
    {
        $smenus=(new AdminController)->getLinks();
        $esched=DB::select('select * from eschedules');
        return view('Esched',['sched'=>$esched,'smenu'=>$smenus]);
    }
    public function addeSched(Request $request)
   {
        $smenus=(new AdminController)->getLinks();
        return view ('addEsched',['smenu'=>$smenus]);
   }
   public function insertEs(Request $request)
   {
    $smenus=(new AdminController)->getLinks();
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

    return redirect('empSched',['smenu'=>$smenus]);
   }
    public function editeSched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $eSchedid=$request->input('eSchedid');
        $showData = DB::select('select * from eschedules where id=' .$eSchedid);
        return view ('editEsched',['sched'=>$showData,'smenu'=>$smenus]);
    }
    public function updateEs(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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

        return redirect('empSched',['smenu'=>$smenus]);
    }
    public function deleteESched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        DB::delete("DELETE FROM eschedules WHERE id = " .$request->input('delId'));
        return redirect ('empSched',['smenu'=>$smenus]);
    }
    public function eAnn()
    { 
        $smenus=(new AdminController)->getLinks();
        $annData = DB::select('select * from genannouncements where service="EMP"');
        // dd($annData);
        return view ('Sannouncements',['Sann'=>$annData,'smenu'=>$smenus]);
    }
    public function addEann(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        return view ('addEann',['smenu'=>$smenus]);
    }
    public function insertEann(Request $request)
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
        $SchedData = DB::insert('insert into eannouncements(date, schedule, details, req) 
        values("' .$request->input('date') .'","' .$request->input('sched') .'","' .$request->input('dets') .'","'
        .$req .'")');
        return redirect('Eannouncements',['smenu'=>$smenus]);
    }
    public function EditeAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $EannID=$request->input('EannID');
        $showData = DB::select('select * from eannouncements where id=' .$EannID);
        return view ('EditEann',['eann'=>$showData,'smenu'=>$smenus]);
    }
    public function updateEann(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('Eannouncements',['smenu'=>$smenus]);
    }
    public function deleteEann(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        DB::delete("DELETE FROM eannouncements WHERE id = " .$request->input('delId'));
        return redirect ('Eannouncements',['smenu'=>$smenus]);
    }
    
    public function estatus()
    {
        $smenus=(new AdminController)->getLinks();
        $estatus=DB::select('select * from employment');
        $empData = DB ::select('
        SELECT users.name
        FROM users
        INNER JOIN employment ON users.id = employment.userid; ');
        return view('estatus',['status'=>$estatus,'eName'=>$empData,'smenu'=>$smenus]);
    }
    public function enotif(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $id = $request->input('ENid');
        // dd($id);
        $EmpData = DB::select('
        SELECT *
        FROM users
        INNER JOIN employment ON users.id = employment.userid
        WHERE employment.id =' .$id );
        // dd($EmpData);

        return view('eEmail',['eData'=>$EmpData,'smenu'=>$smenus]);
    }
    public function eapprove(Request $request)
    {
        $id = $request->input('delId');
        DB::update('update employment set status="Approved" where id= ' .$id);

        // return view('estatus',['status'=>$estatus,'smenu'=>$smenus]);
        return redirect()->route('acceNotif',['id'=>$id]);
    }
    public function ePrint(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $userid=Auth::user()->id;
        
        $txtsearch=$request->input('id');
        // var_dump($txtsearch);
        $condition = " AND (u.name LIKE '%" . $txtsearch . "%' OR p.age LIKE '%" . 
        $txtsearch . "%' OR p.gender LIKE '%" . $txtsearch . "%' OR r.posidesired LIKE '%" . 
        $txtsearch . "%' OR r.cname LIKE '%" . $txtsearch . "%' OR p.hire LIKE '%" . $txtsearch . "%' )";

        // dd($condition);
        // $tEracking = DB::select('select * from stracking' .$condition);
        $empData = DB::select('
        SELECT *
        FROM uprofile AS p
        INNER JOIN users AS u ON p.userid = u.id
        INNER JOIN employment AS r ON r.userid = p.userid
        INNER JOIN files AS f ON f.userid = p.userid
        ' . $condition . ';');
        // dd($empData);
        $fileData=DB::select('select * from files where userid=' .$userid);
        return view('NLEmploy',['data'=>$empData, 'txts' => $txtsearch, 'files'=>$fileData,'smenu'=>$smenus]);
    }
    public function workP()
    {
        $smenus=(new AdminController)->getLinks();
        $works= DB::select('select * from eworks');
        return view ('NLWorks',['work'=>$works,'smenu'=>$smenus]);
    }
    public function estatP()
    {
        $smenus=(new AdminController)->getLinks();
        $estatus=DB::select('select * from employment');
        return view('NLEstatus',['status'=>$estatus,'smenu'=>$smenus]);
    }
    public function empP()
    {
        $smenus=(new AdminController)->getLinks();
        $employers = DB :: select('select * from company');
        // dd($employers);
        // $employers= DB::select(" SELECT * FROM company INNER JOIN users ON company.representative = users.name WHERE users.name = `.$name`;");
        // $employers = DB::select('select * from users where roles = 4');
        return view('NLEmployer',['employer'=>$employers,'smenu'=>$smenus]);
    }
    public function resShow(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $id=$request->input('fileId');
        $show = DB::select('select * from files where id=' .$id);
        // dd($show);
        return view('NLEResume',['show'=>$show,'smenu'=>$smenus]);
    }
    public function employers()
    {
        $smenus=(new AdminController)->getLinks();
        // $employers = DB :: select('select * from company');
        // $employers = DB::select('select * from users where roles = 4');
        // dd($employers);
        
        $employers= DB::select("SELECT * FROM company INNER JOIN users ON company.userid = users.id WHERE users.roles = 4;");
        // dd($employers);
        return view('employerW',['employer'=>$employers,'smenu'=>$smenus]);
    }
    public function delEmp(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        DB::delete("DELETE FROM company WHERE id = " .$request->input('delId'));
        return view ('EmployerW',['smenu'=>$smenus]);
    }
    public function printApp(Request $request)
    {
        $userid = $request->input('showId');
        // dd($userid);
        $showdata = DB::select('
            SELECT s.cname AS uprofile_column,
                s.*, p.*, u.* 
            FROM uprofile AS s 
            INNER JOIN employment AS p ON s.userid = p.userid 
            INNER JOIN users AS u ON p.userid = u.id 
            WHERE p.userid = ?', [$userid]
        );

        // dd($showdata);
        // $showdata = DB::select('select * from uprofile');
        return view ('NLuserEmploy', compact('showdata'));
    }
    public function EdashboardP(Request $request)
    {
        $stat=DB::select('select * from employment where status="Approved"');
        $Applicants=DB::select('select * from employment');
        $monthlyCounts = DB::select('SELECT DATE_FORMAT(date, "%Y-%m") as month, 
        COUNT(*) as count FROM employment GROUP BY month');

        $hiredEmp = DB::select('select * from users where roles=4');
        // dd($hiredEmp);
        $companies = DB::select("SELECT cname, COUNT(*) as count FROM employment GROUP BY cname");
        // dd($companies);
        return view('NLEDashboard',['applicants'=>count($Applicants),'accepted'=>count($stat),
        'monthlyCounts' => $monthlyCounts, 'companies' => $companies, 'hiredEmp'=>count($hiredEmp)]);
    }
}
