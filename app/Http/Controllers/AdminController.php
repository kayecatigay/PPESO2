<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User; // Assuming you have a User model


class AdminController extends Controller
{
    public function aphome()
    {
        return view('Aprofile');
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

        if (Auth()->user()->roles == 1) {
            $smenus = array(
                [
                    'PEAP', '',
                    array(
                        ['Scholarship', '/showAllSApp'], ['Tracking', '/Stracking'],
                        ['Announcements', '/Sannouncements'], ['Status', '/Pstatus'], ['Visualization', '/SAdashboard']
                    )
                ]
            );
        } elseif (Auth()->user()->roles == 2) {
            $smenus = array(
                [
                    'Employment', '',
                    array(
                        ['Applicants', '/showAllEApp'], ['Works Available', '/AllWorks'],
                        ['Announcements', '/Eannouncements'], ['Employer', '/EmployerW'], ['Status', '/Estatus'], ['Visualization', '/EAdashboard']
                    )
                ]
            );
        } elseif (Auth()->user()->roles == 3) {
            $smenus = array(
                [
                    'OFW', '',
                    array(
                        ['Applicants', '/ShowAllOApp'], ['Announcements', '/Oannouncements'],
                        ['Status', '/Ostatus'], ['Visualization', '/Oadmindashboard']
                    )
                ],
            );
        } elseif (Auth()->user()->roles == 4) {
            $smenus = array(
                [
                    'Employment', '',
                    array(
                        ['Applicants', '/showAllEApp'], ['Works Available', '/AllWorks'],
                        ['Announcements', '/Eannouncements'], ['Employer', '/EmployerW'], ['Status', '/Estatus'], ['Visualization', '/EAdashboard']
                    )
                ]
            );
        } elseif (Auth()->user()->roles == 5) {
            $smenus = array(
                [
                    'PEAP', '',
                    array(
                        ['Scholarship', '/showAllSApp'], ['Tracking', '/Stracking'],
                        ['Status', '/Pstatus'], ['Visualization', '/SAdashboard']
                    )
                ],

                [
                    'Employment', '',
                    array(
                        ['Applicants', '/showAllEApp'], ['Works Available', '/AllWorks'],
                        ['Employer', '/EmployerW'], ['Status', '/Estatus'], ['Visualization', '/Eadmindashboard']
                    )
                ],

                [
                    'OFW', '',
                    array(
                        ['Applicants', '/ShowAllOApp'],
                        ['Status', '/Ostatus'], ['Visualization', '/Oadmindashboard']
                    )
                ]
            );
        } else {
            $smenus = array();
        }
        // dd(Auth()->user()->roles);
        // dd($smenus);
        return $smenus;
    }
    public function dashboard()
    {

        $smenus = $this->getLinks();
        $Tusers = DB::select('select * from users');
        $muser = DB::select('select * from uprofile where gender="male"');
        $fuser = DB::select('select * from uprofile where gender="female"');

        $AcceptedPEAP = DB::select('select * from scholarship where status="Approved"');
        $AcceptedEMP = DB::select('select * from employment where status="Approved"');
        $AcceptedOFW = DB::select('select * from ofw where status="Approved"');

        $ipData = DB::select("
        SELECT s.tribe
        FROM uprofile as s
        INNER JOIN scholarship as p ON s.userid = p.userid
        WHERE LOWER(s.ip) = 'yes'
        ");

        $ipCountByTribe = [];
        foreach ($ipData as $entry) {
            $tribe = $entry->tribe;

            if (!isset($ipCountByTribe[$tribe])) {
                $ipCountByTribe[$tribe] = 1;
            } else {
                $ipCountByTribe[$tribe]++;
            }
        }

        $peapApp = DB::table('scholarship')->distinct()->count('userid');
        $empApp = DB::table('employment')->distinct()->count('userid');
        $ofwApp = DB::table('ofw')->distinct()->count('userid');
        // dd($peapApp);
        return view('dashboard', [
            'smenu' => $smenus, 'totalusers' => count($Tusers),
            'muser' => count($muser), 'fuser' => count($fuser), 'apeap' => count($AcceptedPEAP),
            'aemp' => count($AcceptedEMP), 'aofw' => count($AcceptedOFW), 'totalpeap' => $peapApp,
            'totalemp' => $empApp, 'totalofw' => $ofwApp, 'ipCountByTribe' => $ipCountByTribe
        ]);
    }
    public function ahome(Request $request)
    {
        if (!($request->user()->roles)) { //check if user is logged in
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        } else {
            $showdata = DB::select('select * from homepage');
            $showworks = DB::select('select * from eworks');
            return view('adminhome', ['show' => $showdata, 'eworks' => $showworks]);
        }
    }
    public function side()
    {
        return view('sidebar');
    }

    public function usersD(Request $request)
    {
        $smenus = $this->getLinks();
        $users = DB::select('select * from users');
        // dd($users);
        return view('UsersData', ['user' => $users, 'smenu' => $smenus]);
    }
    public function editUdata(Request $request)
    {
        $smenus = $this->getLinks();
        $userID = $request->input('usrID');
        $showdata = DB::select('select * from users where id=' . $userID);
        // dd($userID);
        return view('editUdata', ['usr' => $showdata, 'smenu' => $smenus]);
    }
    public function updateUdata(Request $request)
    {
        // dd($request->input('roles'));
        $urole = 0;
        $urole = ($request->input('roles') == "user") ? 0 : $urole;
        $urole = ($request->input('roles') == "supadmin") ? 5 : $urole;
        $urole = ($request->input('roles') == "employer") ? 4 : $urole;
        $urole = ($request->input('roles') == "oadmin") ? 3 : $urole;
        $urole = ($request->input('roles') == "eadmin") ? 2 : $urole;
        $urole = ($request->input('roles') == "sadmin") ? 1 : $urole;

        $userData = DB::update('update users set roles= "' . $urole
            . '" where id=' . $request->input('id') . ' ');
        return redirect('/usersD');
    }
    public function deleteUdata(Request $request)
    {
        DB::delete("DELETE FROM users WHERE id = " . $request->input('delId'));
        return redirect('/usersD');
    }
    public function eApplicant(Request $request)
    {
        $smenus = $this->getLinks();
        $showdata = DB::select("select * from company");
        // dd($showdata);
        $showfile = DB::select('SELECT * FROM `reqs` ');
        // dd($showfile);
        return view('/empApp', ['empApp' => $showdata, 'filedata' => $showfile, 'smenu' => $smenus]);
    }
    public function pEmpApp(Request $request)
    {
        $userid = $request->input('showId');
        // dd($userid);
        $showfile = DB::select('SELECT * FROM `reqs` WHERE userid =' . $userid);
        // dd($showfile);
        return view('NLEmpApp', ['files' => $showfile]);
    }
    public function pEmpApp2(Request $request)
    {
        $smenus = $this->getLinks();
        $userid = $request->input('showId2');
        // dd($userid);
        $showfile = DB::select('SELECT * FROM `reqs` WHERE userid =' . $userid);
        // dd($showfile);
        return view('NLEmpApp2', ['files' => $showfile, 'smenu' => $smenus]);
    }
    public function deleteempD(Request $request)
    {
        DB::delete("DELETE FROM company WHERE id = " . $request->input('delId'));
        return redirect('/empApp');
    }

    public function status()
    {
        return view('status');
    }
    public function dashboardP()
    {
        $Tusers = DB::select('select * from users');
        $muser = DB::select('select * from uprofile where gender="male"');
        $fuser = DB::select('select * from uprofile where gender="female"');

        $AcceptedPEAP = DB::select('select * from scholarship where status="Approved"');
        $AcceptedEMP = DB::select('select * from employment where status="Approved"');
        $AcceptedOFW = DB::select('select * from ofw where status="Approved"');

        $ipData = DB::select("
        SELECT s.tribe
        FROM uprofile as s
        INNER JOIN scholarship as p ON s.userid = p.userid
        WHERE LOWER(s.ip) = 'yes'
        ");

        $ipCountByTribe = [];
        foreach ($ipData as $entry) {
            $tribe = $entry->tribe;

            if (!isset($ipCountByTribe[$tribe])) {
                $ipCountByTribe[$tribe] = 1;
            } else {
                $ipCountByTribe[$tribe]++;
            }
        }

        $peapApp = DB::table('scholarship')->distinct()->count('userid');
        $empApp = DB::table('employment')->distinct()->count('userid');
        $ofwApp = DB::table('ofw')->distinct()->count('userid');
        // dd($peapApp);
        return view('NLDashboard', [
            'totalusers' => count($Tusers),
            'muser' => count($muser), 'fuser' => count($fuser), 'apeap' => count($AcceptedPEAP),
            'aemp' => count($AcceptedEMP), 'aofw' => count($AcceptedOFW), 'totalpeap' => $peapApp,
            'totalemp' => $empApp, 'totalofw' => $ofwApp, 'ipCountByTribe' => $ipCountByTribe
        ]);
    }
    public function sendsms()
    {
        $smenus = $this->getLinks();
        return view('messages', ['smenu' => $smenus]);
    }
    public function showPrintView()
    {
        $users = User::all(); // Fetch all users as an example
        return View::make('print')->with('users', $users);
    }
    public function feedback(Request $request)
    {
        $smenus = (new AdminController)->getLinks();
        $fback = DB::select('select * from feedback');

        return view('feedback', ['smenu' => $smenus, 'fback' => $fback]);
    }
}
