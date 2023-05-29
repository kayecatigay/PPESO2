<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementsController extends Controller
{
    public function GAnnounce()
    {
        return view('announcements');
    }
    public function GeneralA($srv)
    {
        // dd($srv);
        $genAnn = DB::select('select * from genannouncements where service="'.$srv .'"');
        return view('genAnn',['ann'=>$genAnn]);
    }
    public function genInfo($id)
    {
        $genInfo = DB::select('select * from genannouncements where id="'.$id .'"');
        return view('info',['gen'=>$genInfo]);
    }
}
