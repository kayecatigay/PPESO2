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
    public function Eregistrationform()
    {
        if (!Auth::check()) { //check if user is logged in
            session(['routeto' => '/Eregistration']);
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
 
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
    public function insertEMPdata(Request $request)
    {

        $empdata= DB::insert('insert into employment(userid, posidesired, cname, crname, crcontact) 
        values(' .$request->input('userid') .',"'.$request->input('posidesired') .'","' .$request->input('cname') .'","' 
        .$request->input('crname') .'","' .$request->input('crcontact') .'")');
    
        return view('emphomepage');
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