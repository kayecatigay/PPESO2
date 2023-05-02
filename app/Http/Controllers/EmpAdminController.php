<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmpAdminController extends Controller
{
    public function EAdashboard()
    {
        return view('EmpDashboard');
    }
}
