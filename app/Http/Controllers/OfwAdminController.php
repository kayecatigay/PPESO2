<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OfwAdminController extends Controller
{
    public function OAdashboard()
    {
        return view('OfwDashboard');
    }
    public function showOFWdata()
    {
        return view('');
    }
}
