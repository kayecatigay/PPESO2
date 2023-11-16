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
        $smenus=(new AdminController)->getLinks();
        $Tusers=DB::select('select * from users');
        $muser=DB::select('select * from uprofile where gender="male"');
        $fuser=DB::select('select * from uprofile where gender="female"');

        $Applicants=DB::select('select * from scholarship');
        $AcceptedPEAP=DB::select('select * from scholarship where status="Approved"');
        $AcceptedEMP=DB::select('select * from employment where status="Approved"');
        $AcceptedOFW=DB::select('select * from ofw where status="Approved"');
        $monthlyCounts = DB::select('SELECT SUBSTRING(date, 1, 7) as month, COUNT(*) as count FROM scholarship GROUP BY month');

        // dd($monthlyCounts);
        $Company=DB::select('SELECT cname,COUNT(*) as totalapp FROM employment GROUP BY cname');
        $AppCom=DB::select('SELECT count(id) FROM `employment` WHERE cname="Google"');

        return view('PEAPdashboard',['smenu'=>$smenus,'applicants'=>count($Applicants),'totalusers'=>count($Tusers),
        'muser'=>count($muser),'fuser'=>count($fuser),'apeap'=>count($AcceptedPEAP),
        'aemp'=>count($AcceptedEMP),'aofw'=>count($AcceptedOFW),'comp'=>count($AppCom),
        'company'=>$Company]);
    }
    public function scholarNOData()
    {
        $smenus=(new AdminController)->getLinks();
        // $schedID=$request->input('schedID');
        // $showdata = DB::select('select * from sschedules where typeS=' .$schedID);
        $scholardata = DB::select('
        SELECT *
        FROM scholarship as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id;
        
        ');
        //  dd($scholardata);
        
        // dd($scholardata);
        return view('ScholarAll',['dataold'=>$scholardata,'smenu'=>$smenus]);
    }
    public function editPdata(request $request) {
        $smenus=(new AdminController)->getLinks();
        $peadID=$request->input('peadID');
        $showdata = DB::select('select * from scholarship where id=' .$peadID);
        //dd($prod);
        return view('editPdata',['ePEAP'=>$showdata,'smenu'=>$smenus]); 
    }
    public function updatePdata(request $request) {
        $smenus=(new AdminController)->getLinks();
        DB::update('update scholarship set typeS="' .$request->input('typeS') .'",name="' .$request->input('name') .'",sex="' .$request->input('gender') .'",address="' .$request->input('add') .'",emailadd="' .$request->input('emailadd') .'",
        contactnum="' .$request->input('contactnum') .'",placeofbirth="' .$request->input('birthplace') .'",birthday="' .$request->input('birthday') .'",age=' .$request->input('age') .',
        height='. $request->input('height') .',weight=' .$request->input('weight') .',bloodtype="' .$request->input('bloodtype') .'",religion="' .$request->input('religion') .'",
        guardian="' .$request->input('guardian') .'",relation="' .$request->input('relationship') .'",yGraduated="' .$request->input('yGraduated') .'",school="' .$request->input('school')
        .'",work="' .$request->input('work') .'",companyn="' .$request->input('cname') .'" where id=' .$request->input('id') .' ');
        
        return redirect('/showAllSApp',['smenu'=>$smenus]);
    }
    public function deletePdata(Request $request){
        $smenus=(new AdminController)->getLinks();
        // dd($request->input('id'));
        DB::delete("DELETE FROM scholarship WHERE id = " .$request->input('delId'));
        
        return redirect('/showAllSApp',['smenu'=>$smenus]);
    }
    public function allSched()
    {
        $smenus=(new AdminController)->getLinks();
        $schedData= DB::select('select * from sschedules');
        // dd($schedData);
        return view ('Asched',['sched'=>$schedData,'smenu'=>$smenus]);
    }
   
    public function addS(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        return view ('addSched',['smenu'=>$smenus]);
    }
    public function insertS(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('SAllSched',['smenu'=>$smenus]);
    }
    public function editSched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $schedID=$request->input('schedID');
        $showdata = DB::select('select * from sschedules where id=' .$schedID);
        //dd($prod);
        return view('editSched',['sched'=>$showdata,'smenu'=>$smenus]); 
    }
    public function updateS(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
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
        return redirect('SAllSched',['smenu'=>$smenus]);
    }
    public function deleteSched(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        // dd($request->input('delId'));
        DB::delete("DELETE FROM sschedules WHERE id = " .$request->input('delId'));
        
        return redirect('/SAllSched',['smenu'=>$smenus]);
    }
    public function sAnn()
    {
        $smenus=(new AdminController)->getLinks();
        $annData = DB::select('select * from genannouncements where service="PEAP"');
        // dd($annData);
        if (empty($annData)) {
            return redirect('Sannouncements');
        }
        return view ('Sannouncements',['Sann'=>$annData,'smenu'=>$smenus]);
    }
    public function addAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $showdata=$request->input('srv');
        return view ('addAnn',['srv'=>$showdata,'smenu'=>$smenus]);
    }
    public function insertA(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $req="";
        $req.= ($request->input('pencil')=="on") ? "|pencil" :"";
        $req.= ($request->input('ballpen')=="on") ? "|ballpen" :"";
        $req.= ($request->input('validid')=="on") ? "|validid" :"";
        $req.= ($request->input('snacks')=="on") ? "|snacks" :"";
        $req.= ($request->input('water')=="on") ? "|water" :"";
        $req=substr($req,1);  

        $body= $request->input('body')." with ".$req;

        // dd($request->input('type'));
        $SchedData = DB::insert('insert into genannouncements(service, title, body, dateFrom, dateTo) 
        values("' .$request->input('service') .'","' .$request->input('title') .'","' .$body.'","' 
        .$request->input('dateFrom') .'","' .$request->input('dateTo') .'")');

        return redirect('Sannouncements',['smenu'=>$smenus]);
    }
    public function editAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $annData=$request->input('annID');
        // $psrv=$request->input('psrv');
        // $annData = DB::select('select * from genannouncements where service="' .$psrv .'"');
        $showdata = DB::select('select * from genannouncements where id=' .$annData);
        // dd($showdata);
        return view('editAnn',['ann'=>$showdata,'smenu'=>$smenus]); 
    }
    public function updateA(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $announceData = DB::update('update genannouncements set dateTo="' .$request->input('dateTo'). '",dateFrom= 
        "' .$request->input('dateFrom'). '",title="' .$request->input('title'). '",body= 
        "' .$request->input('body') .'" where service = "PEAP"');

        return redirect('/Sannouncements',['smenu'=>$smenus]);
    }
    public function deleteAnn(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        DB::delete("DELETE FROM genannouncements WHERE id = " .$request->input('delId'));

        return redirect('/Sannouncements',['smenu'=>$smenus]);
    }
    public function Stracking(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $txtsearch=$request->input('filter');
        // var_dump($txtsearch);
        $condition= " AND ( u.name like '%" .$txtsearch ."%' OR age like '%" .$txtsearch ."%' OR gender like '%" 
        .$txtsearch ."%' OR yGraduated like '%" .$txtsearch ."%' OR school like '%" .$txtsearch ."%' OR work like '%" .$txtsearch 
        ."%' OR cname like '%" .$txtsearch ."%' )";
        // $tEracking = DB::select('select * from stracking' .$condition);
        $scholardata = DB::select('
        SELECT *
        FROM uprofile as p
        INNER JOIN users as u
        ON p.userid = u.id
        where yGraduated!="n/a" and yGraduated!=""
        ' .$condition .';');
        return view('Stracking',['track'=>$scholardata, 'txts' => $txtsearch ,'smenu'=>$smenus]);
    }
    public function pstatus()
    {
        $smenus=(new AdminController)->getLinks();
        $pstatus=DB::select('select * from scholarship');
        $peapData = DB ::select('
        SELECT users.name
        FROM users
        INNER JOIN scholarship ON users.id = scholarship.userid; ');
        // dd($peapData);
        return view('pstatus',['status'=>$pstatus,'pName'=>$peapData,'smenu'=>$smenus]);
    }
    public function pnotif(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $id = $request->input('PNid');
        // dd($id);
        $PeapData = DB::select('
        SELECT *
        FROM users
        INNER JOIN scholarship ON users.id = scholarship.userid
        WHERE scholarship.id =' .$id );
        // dd($PeapData);

        return view('pEmail',['pData'=>$PeapData,'smenu'=>$smenus]);
    }
    public function approve(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $id = $request->input('delId');
        DB::update('update scholarship set status="Approved" where id= ' .$id);
        
        $pstatus=DB::select('select * from scholarship');
        return view('pstatus',['status'=>$pstatus,'smenu'=>$smenus]);
    }
    public function scholarP()
    {
        $smenus=(new AdminController)->getLinks();
        // $schedID=$request->input('schedID');
        // $showdata = DB::select('select * from sschedules where typeS=' .$schedID);
        $scholardata = DB::select('
        SELECT *
        FROM scholarship as s
        INNER JOIN uprofile as p
        ON s.userid = p.userid
        INNER JOIN users as u
        ON p.userid = u.id;
        
        ');
        //  dd($scholardata);
        
        // dd($scholardata);
        return view('NLScholars',['dataold'=>$scholardata,'smenu'=>$smenus]);
    }
    public function trackingP(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $txtsearch=$request->input('filter');
        // var_dump($txtsearch);
        $condition= " AND ( u.name like '%" .$txtsearch ."%' OR age like '%" .$txtsearch ."%' OR gender like '%"  
        .$txtsearch ."%' OR yGraduated like '%" .$txtsearch ."%' OR school like '%" .$txtsearch ."%' OR work like '%" .$txtsearch 
        ."%' OR cname like '%" .$txtsearch ."%' )";
        // $tEracking = DB::select('select * from stracking' .$condition);
        $scholardata = DB::select('
        SELECT *
        FROM uprofile as p
        INNER JOIN users as u
        ON p.userid = u.id
        where yGraduated!="n/a" and yGraduated!=""
        ' .$condition .';');
        return view('NLtracking',['track'=>$scholardata, 'txts' => $txtsearch,'smenu'=>$smenus]);
    }
    public function sannP(Request $request)
    {
        $smenus=(new AdminController)->getLinks();
        $psrv=$request->input('psrv');
        $annData = DB::select('select * from genannouncements where service="' .$psrv .'"');
        // dd($annData);
        return view ('NLSann',['Sann'=>$annData,'smenu'=>$smenus]);
    }
    public function statP()
    {
        $smenus=(new AdminController)->getLinks();
        $pstatus=DB::select('select * from scholarship');
        return view('NLSstatus',['status'=>$pstatus,'smenu'=>$smenus]);
    }
}
