<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function redirectPath()
        {
            // dd(auth()->user()->roles);
            if(auth()->user()->roles==99)
            {
                dd("need approval from ppeso");
                exit;
            }
            if (auth()->user()->roles) {
                return '/adminhomepage';
            }
             else {
                
                if (session('routeto')=="") {
                    return '/home';
                }
                else{
                    $route=session('routeto');
                    session(['routeto' => '']);
                    return $route;

                }
                
            }

        }
}
