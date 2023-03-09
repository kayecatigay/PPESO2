<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index()
    {
        return view ('services');
    }
    public function registrationform()
    {
        return view ('scholardetails');
    }
    public function insertdata(Request $request)
    {
       
        $scholardata = DB::insert('insert into scholarship(name, sex, emailadd, address, contactnum, birthday, placeofbirth, age, height, weight, bloodtype, religion, 
        guardian, relation) values("' .$request->input('name') .'","' .$request->input('gender') .'","' .$request->input('add') .'","' 
        .$request->input('emailadd') .'",' .$request->input('contactnum') .',"' .$request->input('birthday') .'","' .$request->input('birthplace') .'",' 
        .$request->input('age') .',' .$request->input('height') .',' .$request->input('weight') .',"' .$request->input('bloodtype') .'","'
        .$request->input('religion') .'","' .$request->input('guardian') .'","' .$request->input('relationship') .'") ');

        return view ('\scholardetails');
    }
    public function Eregistrationform()
    {
        return view ('eDetails');
    }
}
?>