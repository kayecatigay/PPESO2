<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function testsidebar()
    {
        return view('testsider');
    }
    public function index()
    {
        return view ('services');
    }

    public function shome()
    {
        return view('scholarhome');
    }
    public function registrationform()
    {
        if (!Auth::check()) { //check if user is logged in
            session(['routeto' => '/Sregistration']);
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
 
        $scholar = DB::select('select * from scholarship where userid=' .Auth()->user()->id);
        // $registered=($scholar) ? true : false;
        $userId = Auth::user()->id;
        $allowed = DB::select('SELECT * FROM uprofile WHERE userid = ?', [$userId]);

        if (count($allowed) > 0) {
            return view('scholardetails',['reg'=>$scholar]);
        } else {
            return redirect('/AddProfile')->with('message', 'This information is required');
        }
        // $allowed = DB::select('select * from uprofile where userid=' .Auth()->user()->id);
        // dd($allowed);
        
    }
    public function insertdata(Request $request)
    {
       
        $scholardata = DB::insert('insert into scholarship(appId, date, status, userid) 
        values("' .$request->input('appId') .'","' .$request->input('date') .'","'
        .$request->input('status') .'",' .$request->input('userid') .') ');
        return redirect ('scholardetails');
    }
    public function viewolddata(Request $request)
    {
        $scholarolddata = DB::select('select * from scholarship where userid=' .Auth()->user()->id);
        // dd($scholarolddata);
        return view('oldscholardetails',['olddata'=>$scholarolddata]);
    }
    public function updatedata(Request $request)
    {
        
        $updatedata = DB::update('update scholarship set typeS="' .$request->input('typeS') .'",name="' .$request->input('name') .'",sex="' .$request->input('gender') .'",address="' .$request->input('add') .'",emailadd="' .$request->input('emailadd') .'",
        contactnum="' .$request->input('contactnum') .'",placeofbirth="' .$request->input('birthplace') .'",birthday="' .$request->input('birthday') .'",age=' .$request->input('age') .',
        height='. $request->input('height') .',weight=' .$request->input('weight') .',bloodtype="' .$request->input('bloodtype') .'",religion="' .$request->input('religion') .'",
        guardian="' .$request->input('guardian') .'",relation="' .$request->input('relationship') .'",yGraduated="' .$request->input('yGraduated') .'",school="' .$request->input('school')
        .'",work="' .$request->input('work') .'",companyn="' .$request->input('cname') .'" where userid=' .$request->input('userid') );
        
        return redirect('/oldscholardetails');
   
    }
    public function emphome()
    {
        return view ('emphomepage');
    }
    public function Eregistrationform(Request $request)
    {
        if (!Auth::check()) { //check if user is logged in
            session(['routeto' => '/Eregistration']);
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
 
        // $jobdescription=$request->input('avaiPosi');
        $employee = DB::select('select * from employment where userid=' .Auth()->user()->id);
         // $registered=($employee) ? true : false;
        // dd($employee[0]);
        $userId = Auth::user()->id;
        $allowed = DB::select('SELECT * FROM uprofile WHERE userid = ?', [$userId]);

        if (count($allowed) > 0) {
            return view('eDetails',['reg'=>$employee]);
        } else {
            return redirect('/AddProfile')->with('message', 'This information is required');
        }
    }
    public function addE(Request $request)
    {
        
        $company=DB::select('select company from eworks');
        $companies = DB::table('eworks')->select('jobdesc', 'company')->get();
        // dd($company);
        return view ('addEmpT',['emp'=>$companies,'company'=>$company]);
    }
    
    public function insertEmpF(Request $request)
    {
        $empdata=DB::select('select * from eworks');
        $company=DB::select('select company from eworks');

        $transID=date("Y") .Auth()->user()->id  .bin2hex(random_bytes(2));
        $ndate=date("Y-m-d");
        $status="pending";
        $desire=$request->input('avaiPosi');
        $comname=$request->input('cname');

        $available = DB::select('select * from employment where posidesired = ? and cname = ?', [$desire, $comname]);
        // dd($available);
        if (!empty($available)) 
        {
            echo '<script>alert("Position is already taken.");</script>';
            return view('addEmpT',['emp'=>$empdata,'company'=>$company]);
        }
        else
        {
            $EmpData = DB::insert('insert into employment(userid, appId, date, status, posidesired, cname, crname, crcontact) 
            values("' .Auth()->user()->id .'","' .$transID .'","' .$ndate .'","' .$status .'","' .$desire 
            .'","' .$comname .'","'  .$request->input('crname') .'","'  .$request->input('crcontact') .'" )');
            
            return redirect('Eregistration');
        }
  
        
    }
    public function insertEMPdata(Request $request)
    {

        $empdata= DB::insert('insert into employment(userid, posidesired, cname, crname, crcontact) 
        values(' .$request->input('userid') .',"'.$request->input('posidesired') .'","' .$request->input('cname') .'","' 
        .$request->input('crname') .'","' .$request->input('crcontact') .'")');
    
        return view('emphomepage');
    }
    public function availableW()
    {
        $works=DB::select('select * from eworks');
        // dd($works);
        return view('worksA',['availableW'=>$works]);
    }

    public function ofwhome()
    {
        return view ('ofwhomepage');
    }
    public function ofwform()
    {
        if (!Auth::check()) { //check if user is logged in
            session(['routeto' => '/ofwregistration']);
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
 
        $ofw = DB::select('select * from ofw where userid=' .Auth()->user()->id);
        // $registered=($ofw) ? true : false;
        $userId = Auth::user()->id;
        $allowed = DB::select('SELECT * FROM uprofile WHERE userid = ?', [$userId]);

        if (count($allowed) > 0) {
            return view('ofwdetails',['ofw'=>$ofw]);
        } else {
            return redirect('/AddProfile')->with('message', 'This information is required');
        }
        
    }
    public function ofwinsert(Request $request)
    {
        //$name=$request->input('lastname') ."," .$request->input('firstname') ." " .$request->input('middlename');
        $ofwData = DB::insert('insert into ofw(userid, JobDesc, OfwCat, Company, Country, PeriodOfEmp) 
        values(' .$request->input('userid') .',"' .$request->input('JobDesc').'","' .$request->input('OfwCat') .'","' 
        .$request->input('Company') .'","' .$request->input('Country') .'","' .$request->input('PeriodOfEmp') .'")');

        return view('ofwhomepage');
    }
}
?>