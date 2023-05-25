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
        return view('AddProfile');
    }
    public function insertP(Request $request)
    {
        $pData=DB::insert('insert into uprofile(name, suffix, gender, address, contactnum, telenum, emailadd, pobirth,
        passnum, birthday, age, height, weight, bloodtype, yGraduated, school, work, cname, guardian, relation,
        cstatus, spouse, language, elem, hs, college, degree) values("' .$request->input('name') .'","' 
        .$request->input('suffix') .'","' .$request->input('gender') .'","' .$request->input('address') .'","'
        .$request->input('contactnum') .'","' .$request->input('telnum') .'","' .$request->input('emailadd') .'","'
        .$request->input('birthplace') .'","' .$request->input('passnum') .'","' .$request->input('birthday') .'","'
        .$request->input('age') .'","' .$request->input('height') .'","' .$request->input('weight') .'","'
        .$request->input('bloodtype') .'","' .$request->input('yGraduated') .'","' .$request->input('school') .'","'
        .$request->input('work') .'","' .$request->input('cname') .'","' .$request->input('guardian') .'","'
        .$request->input('relationship') .'","' .$request->input('cstatus') .'","' .$request->input('spouse') .'","'
        .$request->input('language') .'","' .$request->input('elem') .'","' .$request->input('hs') .'","'
        .$request->input('college') .'","' .$request->input('degree') .'" )');
        return redirect('userprofile');
    }
    public function editP(Request $request)
    {
        $prID=$request->input('prID');
        
        $showdata = DB::select('select * from users where id=' .$prID);
        // dd($showdata);
        return view('editProfile',['ePr'=>$showdata]); 
    }
    
}
