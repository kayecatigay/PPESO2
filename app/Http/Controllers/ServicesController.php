<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        $registered=($scholar) ? true : false;
        return view('scholardetails',['reg'=>$registered]);
    }
    public function insertdata(Request $request)
    {
       
        $scholardata = DB::insert('insert into scholarship(name, sex, address, emailadd, contactnum, placeofbirth, birthday, age, height, weight, bloodtype, religion, 
        guardian, relation, userid) values("' .$request->input('name') .'","' .$request->input('gender') .'","' .$request->input('add') .'","' 
        .$request->input('emailadd') .'",' .$request->input('contactnum') .',"' .$request->input('birthplace') .'","' .$request->input('birthday') .'",' 
        .$request->input('age') .',' .$request->input('height') .',' .$request->input('weight') .',"' .$request->input('bloodtype') .'","'
        .$request->input('religion') .'","' .$request->input('guardian') .'","' .$request->input('relationship') .'",' .$request->input('userid') .') ');

        return view ('scholarhome');
    }
    public function viewolddata(Request $request)
    {
        $scholarolddata = DB::select('select * from scholarship where userid=' .Auth()->user()->id);
        // dd($scholarolddata);
        return view('oldscholardetails',['olddata'=>$scholarolddata]);
    }
    public function updatedata(Request $request)
    {
        
        $updatedata = DB::update('update scholarship set name="' .$request->input('name') .'",sex="' .$request->input('gender') .'",address="' .$request->input('add') .'",emailadd="' .$request->input('emailadd') .'",
        contactnum="' .$request->input('contactnum') .'",placeofbirth="' .$request->input('birthplace') .'",birthday="' .$request->input('birthday') .'",age=' .$request->input('age') .',
        height='. $request->input('height') .',weight=' .$request->input('weight') .',bloodtype="' .$request->input('bloodtype') .'",religion="' .$request->input('religion') .'",
        guardian="' .$request->input('guardian') .'",relation="' .$request->input('relationship') .'" where userid=' .$request->input('userid') );
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
        $registered=($employee) ? true : false;
        return view('eDetails',['reg'=>$registered]);
    }
    public function insertEMPdata(Request $request)
    {
        $language="";
        $language.= ($request->input('english')=="on") ? "|english" :"";
        $language.= ($request->input('tagalog')=="on") ? "|tagalog" :"";
        $language.= ($request->input('chinese')=="on") ? "|chinese" :"";
        $language=substr($language,1);  
        

        $empdata= DB::insert('insert into employment(posidesired, name, gender, address, telephone, cellphone, emailadd, birthday, Cstatus, spouse, height, weight, religion, language,
        elem, hschool, college, degree, cname, position, crname, crcompany, crposition, crcontact, userid) values("' .$request->input('posidesi') .'","' .$request->input('name') .'","'
        .$request->input('gender') .'","' .$request->input('add') .'","' .$request->input('telnum') .'","' .$request->input('contactnum') .'","' .$request->input('emailadd') .'","' .$request->input('birthday') .'","'
        .$request->input('cstatus') .'","' .$request->input('spouse') .'",' .$request->input('height') .',' .$request->input('weight') .',"' .$request->input('religion') .'","' .$language .'","'
        .$request->input('elem') .'","' .$request->input('hs') .'","' .$request->input('college') .'","' .$request->input('degree') .'","' .$request->input('cname') .'","' .$request->input('posi') .'","'
        .$request->input('crname') .'","' .$request->input('crcname') .'","' .$request->input('crposi') .'","' .$request->input('crcontact') .'",' .$request->input('userid') .')');
    
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
        $registered=($ofw) ? true : false;
        return view('ofwdetails',['reg'=>$registered]);
    }
    public function ofwinsert(Request $request)
    {
        //$name=$request->input('lastname') ."," .$request->input('firstname') ." " .$request->input('middlename');
        $ofwData = DB::insert('insert into ofw(userid, lastname, firstname, middlename, suffix, birthday, age, sex, contactnum, address, passnum, 
        emailadd, fbacc) values(' .$request->input('userid') .',"' .$request->input('lastname') .'","' .$request->input('firstname') .'","'
        .$request->input('middlename') .'","' .$request->input('suffix') .'","' .$request->input('birthday') .'",' .$request->input('age') .',"'
        .$request->input('sex') .'","' .$request->input('contactnum') .'","' .$request->input('address') .'","'.$request->input('passnum') .'","'
        .$request->input('emailadd') .'","' .$request->input('fbacc') .'")');

        return view('ofwhomepage');
    }
}
?>