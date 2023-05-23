<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function aphome()
    {
        return view ('Aprofile');
    }
    public function getLinks()
    {
        // switch ((Auth()->user()->roles))
        // {
        //     case "1":
        //         $smenus=array('PEAP');
        //         break;
        //     case "2":
        //         $smenus=array('Employment');
        //         break;
        //     case "3":
        //         $smenus=array('OFW');
        //         break;
        //     case "4":
        //         $smenus=array('PEAP','Employment','OFW');
        //         break;
        //     default:
        //         $smenus=array('');
        // }
        // if(Auth()->user()->roles==1)
        // {
            $smenus=array(
                ['PEAP','', 
                    array(['Scholarship','/showAllSApp'],['Schedules','/SAllSched'],['Tracking','/Stracking'],['Announcements','/Sannouncements'])
                ]
                            
            );
        // }
        // else
        // {
        //     $smenus=array();
        // }
        return $smenus;
    }
    public function dashboard()
    {
        
        // return view ('dashboard');
        // dd(count($smenus));
        $smenus=$this->getLinks();
        return view ('dashboard',['smenu'=>$smenus]);
    }
    public function ahome(Request $request)
    {
        if (!($request->user()->roles)) { //check if user is logged in
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
        else
        {
            return view('adminhome');
        }
        
    }
    public function side()
    {
        return view('sidebar');
    }

    
    
    public function empD()
    {
        $applicant = DB::select('select * from employment');
        // dd($applicant);
        return view('empDash',['employee'=>$applicant]);
        // return view('empDash');
    }
    public function editEdata(request $request) {
        $empID=$request->input('empID');
        $showdata = DB::select('select * from employment where id=' .$empID);
        //dd($prod);
        return view('editEdata',['eEMP'=>$showdata]); 
    }
    public function updateEdata(request $request) {
        // dd($request->input('gender'));
        
        $language="";
        $language.= ($request->input('english')=="on") ? "|english" :"";
        $language.= ($request->input('tagalog')=="on") ? "|tagalog" :"";
        $language.= ($request->input('chinese')=="on") ? "|chinese" :"";
        $language=substr($language,1);  

        $empdata= DB::update('update employment set name="' .$request->input('name'). '",gender="' 
        .$request->input('gender'). '",address="' .$request->input('add'). '",emailadd="' 
        .$request->input('emailadd'). '",cellphone="' .$request->input('cellphone'). '",telephone="' 
        .$request->input('telnum'). '",birthday="' .$request->input('birthday'). '",Cstatus="' 
        .$request->input('cstatus'). '",height="' .$request->input('height'). '",weight="' 
        .$request->input('weight'). '",spouse="' .$request->input('spouse'). '",religion="' 
        .$request->input('religion'). '",language="' .$language. '",elem="' 
        .$request->input('elem'). '",hschool="' .$request->input('hs'). '",college="' 
        .$request->input('college'). '",degree="' .$request->input('degree'). '",cname="' 
        .$request->input('cname'). '",position="' .$request->input('posi'). '",crname="'
        .$request->input('crname'). '",crcompany="' .$request->input('crcname'). '",crposition="' 
        .$request->input('crposi'). '",crcontact="' .$request->input('crcontact'). '"
        where id='.$request->input('id') .' ');

        // dd ($empdata);
        
        return redirect('/empD');
    }
    public function deleteEdata(Request $request){
        // dd($request->input('id'));
        DB::delete("DELETE FROM employment WHERE id = " .$request->input('delId'));
        
        return redirect('/empD');
    }

    public function ofwD()
    {

        $ofw = DB::select('select * from ofw');
        // dd($ofw);
        return view('ofwDash',['data'=>$ofw]);
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
        return redirect('/ofwD');
    }
    public function deleteOdata(Request $request){
        // dd($request->input('id'));
        DB::delete("DELETE FROM ofw WHERE id = " .$request->input('delId'));
        
        return redirect('/ofwD');
    }
    public function usersD(Request $request)
    {
        $users = DB::select('select * from users');
        // dd($users);
        return view('UsersData',['user'=>$users]);
    }
    public function editUdata(Request $request)
    {
        $userID = $request->input('usrID');
        $showdata = DB::select('select * from users where id=' .$userID);
        // dd($userID);
        return view('editUdata',['usr'=>$showdata]);
    }
    public function updateUdata(Request $request)
    {
        // dd($request->input('roles'));
        $urole=0;
        $urole= ($request->input('roles')== "user") ? 0 : $urole;
        $urole= ($request->input('roles')== "supadmin") ? 4 : $urole;
        $urole= ($request->input('roles')== "oadmin") ? 3 : $urole;
        $urole= ($request->input('roles')== "eadmin") ? 2 : $urole;
        $urole= ($request->input('roles')== "sadmin") ? 1 : $urole;

        $userData = DB::update('update users set roles= "' .$urole 
            .'" where id=' .$request->input('id').' ');
        return redirect('/usersD');
    }
    public function deleteUdata(Request $request)
    {
        DB::delete("DELETE FROM users WHERE id = " .$request->input('delId'));
        return redirect('/usersD');
    }
}