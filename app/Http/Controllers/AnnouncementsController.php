<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function GAnnounce()
    {
        return view('announcements');
    }
    public function GeneralA()
    {
        return view('genAnn');
    }
    public function scholarAnn()
    {
        return view('peapAnn');
    }
    public function empAnn()
    {
        return view('employAnn');
    }
    public function ofwAnn()
    {
        return view('ofwAnn');
    }
}
