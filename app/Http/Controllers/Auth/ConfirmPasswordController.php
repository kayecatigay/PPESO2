<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
        $this->middleware('auth');
    }
    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }
    public function confirm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',      // At least one uppercase letter
                'regex:/[0-9]/',      // At least one number
                'regex:/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/',  // At least one special character
            ],
            'password_confirmation' => 'required|string|same:password',  // Confirm password matches
            // Add other validation rules for additional form fields here
        ]);
        if ($validator->fails()) {
            return redirect('your-registration-route')
                ->withErrors($validator)
                ->withInput();
        }
        // Registration logic if validation passes
        // This is where you would create a new user, store data in the database, etc.

        // Return a response or redirect to a success page
        return redirect('success-route')->with('success', 'Registration successful!');
        // Your custom logic after password confirmation
    }
    
}
