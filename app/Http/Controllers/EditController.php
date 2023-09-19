<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edithomepage(Request $request)
    {
        return view('Eadminhome');
    }
    public function title(Request $request)
    {
        $insertTitle= DB::update('update titles set description="' .$request->input('title').'") 
        where userid='.$request->input('userid') .' ');
        return view('Eadminhome',['title'=>$insertTitle]);
    }

}
