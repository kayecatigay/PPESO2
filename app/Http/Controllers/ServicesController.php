<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function insertdata()
    {
        DB::insert('insert into scholarship values ');
    }
}
?>