<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            "name"              =>"required|min:5|string",
            "email"             =>"required|email|unique:users",
            "PhoneNum"          =>"required|regex:/(01)[0-9]{9}/|max:16|unique:users",
            "location"          =>"required|string|max:30",
            "password"          =>"required|string|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",      
        ],[
            "password.regex"    =>" Your password must be 8 characters long and should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $user = User::create([
            'name'             => $data['name'],
            'email'            => $data['email'],
            'PhoneNum'         => $data['PhoneNum'],
            'location'         => $data['location'],
            'password'         => Hash::make($data['password']),
            'role'             =>    0,
        ]);

        return  $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png'
        ]);

       
    }
}



