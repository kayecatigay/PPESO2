<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class uProfileController extends Controller
{
    public function phome()
    {
        // $profhome=DB::select('select * from users');
        // return view ('uProfile',['pr'=>$profhome]);
        return view ('uProfile');
    }
    public function addP(Request $request)
    {
        
        $userid=$request->input('userid');
        $showdata = DB::select('select * from uprofile where userid=' .$userid);
        $showwork = DB::select('select * from uwork where userid=' .$userid);
        return view('AddProfile',['pdata'=>$showdata,'uwork'=>$showwork]);
    }
    public function insertP(Request $request)
    {
        $language="";
        $language.= ($request->input('english')=="on") ? ", english" :"";
        $language.= ($request->input('tagalog')=="on") ? ", tagalog" :"";
        $language.= ($request->input('chinese')=="on") ? ", chinese" :"";
        $language.= ($request->input('japanese')=="on") ? ", japanese" :"";
        $language.= ($request->input('korea')=="on") ? ", hangul" :"";
        $language=substr($language,1); 

        $userid=$request->input('userid');
        $showdata = DB::select('select * from uprofile where userid=' .$userid);
        if($showdata)
        {
            $uPData = DB::update('update uprofile set suffix="' .$request->input('suffix'). '",
            gender="' .$request->input('gender'). '",address= "' .$request->input('address'). '",
            contactnum="' .$request->input('contactnum'). '",telenum= "' .$request->input('telnum'). '",
            emailadd="' .$request->input('emailadd'). '",pobirth= "' .$request->input('birthplace'). '",
            passnum="' .$request->input('passnum'). '",birthday= "' .$request->input('birthday'). '",
            age="' .$request->input('age'). '",height= "' .$request->input('height'). '",
            weight="' .$request->input('weight'). '",bloodtype= "' .$request->input('bloodtype'). '",
            yGraduated="' .$request->input('yGraduated'). '",school= "' .$request->input('school'). '",
            work="' .$request->input('work'). '",cname= "' .$request->input('cname'). '",
            guardian="' .$request->input('guardian'). '",relation= "' .$request->input('ralationship'). '",
            cstatus="' .$request->input('cstatus'). '",spouse= "' .$request->input('spouse'). '",
            language="' .$language. '",elem= "' .$request->input('elem'). '",
            hs="' .$request->input('hs'). '",college= "' .$request->input('college'). '",
            degree="' .$request->input('degree'). '" where userid='.$request->input('userid') .' ');
        }
        else
        {
            $pData = DB::insert('insert into uprofile(userid, suffix, gender, address, contactnum, telenum, emailadd, pobirth,
            passnum, birthday, age, height, weight, bloodtype, yGraduated, school, work, cname, guardian, relation,
            cstatus, spouse, language, elem, hs, college, degree) values("' .$request->input('userid') .'","' 
            .$request->input('suffix') .'","' .$request->input('gender') .'","' .$request->input('address') .'","'
            .$request->input('contactnum') .'","' .$request->input('telnum') .'","' .$request->input('emailadd') .'","'
            .$request->input('birthplace') .'","' .$request->input('passnum') .'","' .$request->input('birthday') .'","'
            .$request->input('age') .'","' .$request->input('height') .'","' .$request->input('weight') .'","'
            .$request->input('bloodtype') .'","' .$request->input('yGraduated') .'","' .$request->input('school') .'","'
            .$request->input('work') .'","' .$request->input('cname') .'","' .$request->input('guardian') .'","'
            .$request->input('relationship') .'","' .$request->input('cstatus') .'","' .$request->input('spouse') .'","'
            .$language .'","' .$request->input('elem') .'","' .$request->input('hs') .'","'
            .$request->input('college') .'","' .$request->input('degree') .'" )');
    
        }
        
        return redirect('userprofile');
    }
    public function editP(Request $request)
    {
        $prID=$request->input('prID');
        $showdata = DB::select('select * from users where id=' .$prID);
        // dd($showdata);
        return view('editProfile',['ePr'=>$showdata]); 
    }
    public function addW()
    {
        return view ('addWorke');
    }
    public function insertWorke(Request $request)
    {
        $WEdata = DB::insert('insert into uwork(userid, cname, position, crname, crcontact, crcname, crposi)
        values("' .$request->input('userid') .'","' .$request->input('cname') .'","' .$request->input('posi') .'","'
        .$request->input('crname') .'","' .$request->input('crcontact') .'","' .$request->input('crcname') .'","'
        .$request->input('crposi') .'" )');

        return redirect('userprofile');
    }
    public function deleteWorke(Request $request)
    {
        DB::delete("DELETE FROM uwork WHERE id = " .$request->input('delId'));
        return redirect('userprofile');
    }
}
