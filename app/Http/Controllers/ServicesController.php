<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    public function index()
    {
        return view ('services');
    }
    public function shome()
    {
        if (!Auth::check()) { //check if user is logged in
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
 
        $scholar = DB::select('select * from scholarship where userid=' .Auth()->user()->id);
        $registered=($scholar) ? true : false;
        return view('scholarhome',['reg'=>$registered]);
    }
    public function registrationform()
    {

        return view ('scholardetails');
    }
    public function insertdata(Request $request)
    {
       
        $scholardata = DB::insert('insert into scholarship(name, sex, address, emailadd, contactnum, placeofbirth, birthday, age, height, weight, bloodtype, religion, 
        guardian, relation, userid) values("' .$request->input('name') .'","' .$request->input('gender') .'","' .$request->input('add') .'","' 
        .$request->input('emailadd') .'",' .$request->input('contactnum') .',"' .$request->input('birthplace') .'","' .$request->input('birthday') .'",' 
        .$request->input('age') .',' .$request->input('height') .',' .$request->input('weight') .',"' .$request->input('bloodtype') .'","'
        .$request->input('religion') .'","' .$request->input('guardian') .'","' .$request->input('relationship') .'",' .$request->input('userid') .') ');

        return view ('\scholardetails');
    }
    public function viewolddata(Request $request)
    {
        $scholarolddata = DB::select('select * from scholarship where userid=' .Auth()->user()->id);
        // dd($scholarolddata);
        return view('oldscholardetails',['olddata'=>$scholarolddata]);
    }
    public function updatedata(Request $request)
    {
            // dd('update scholarship set name="' .$request->input('name') .'",sex="' .$request->input('gender') .'",address="' .$request->input('add') .'",emailadd="' .$request->input('emailadd') .'",
            // contactnum="' .$request->input('contactnum') .'",placeofbirth="' .$request->input('birthplace') .'",birthday="' .$request->input('birthday') .'",age=' .$request->input('age') .',
            // height='. $request->input('height') .',weight=' .$request->input('weight') .',bloodtype="' .$request->input('bloodtype') .'",religion="' .$request->input('religion') .'",
            // guardian="' .$request->input('guardian') .'",relation="' .$request->input('relationship') .'" where userid=' .$request->input('userid') );

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
        return view ('eDetails');
    }
    public function insertEMPdata()
    {
        //
    }
}
?>