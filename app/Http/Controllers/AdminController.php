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
        $Tusers=DB::select('select * from users');
        $muser=DB::select('select * from uprofile where gender="male"');
        $fuser=DB::select('select * from uprofile where gender="female"');
        // dd(count($muser));
        return view ('dashboard',['smenu'=>$smenus,'totalusers'=>count($Tusers),'muser'=>count($muser),'fuser'=>count($fuser)]);
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
        $urole= ($request->input('roles')== "supadmin") ? 5 : $urole;
        $urole= ($request->input('roles')== "employer") ? 4 : $urole;
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
    public function status()
    {
        return view('status');
    }
    public function dashboardP()
    {
        
        
        // return view ('dashboard');
        // dd(count($smenus));
        $smenus=$this->getLinks();
        $Tusers=DB::select('select * from users');
        $muser=DB::select('select * from uprofile where gender="male"');
        $fuser=DB::select('select * from uprofile where gender="female"');
        // dd(count($muser));
        return view ('NLDashboard',['smenu'=>$smenus,'totalusers'=>count($Tusers),'muser'=>count($muser),'fuser'=>count($fuser)]);
    }
}