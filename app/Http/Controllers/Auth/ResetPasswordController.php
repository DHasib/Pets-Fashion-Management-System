<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    
 
   use ResetsPasswords;
   
      public function postReset(Request $request){

        $this->validate($request, [
              'token'      => 'required',
              'email'      => 'required|email',
              "password"   =>"required|string|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",  
        ],[
            "password.regex"   => " Your password must be 8 characters long and should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
        ]);
      //  return $this->postResetTrait($request);
      }
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

  
   

    
}
