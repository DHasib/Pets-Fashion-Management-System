<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;
use Auth;
use App\BlogPost;
use App\DynamicLinks;

class UserController extends Controller
{
   
//Show Admin Profile.....................................................
     public function showUserProfile()
     {
         return view("user/profile")->with('user',        Auth::user())
                                    ->with('posts',       BlogPost::where('user_id', Auth::user()->id)->get())
                                    ->with('link',        DynamicLinks::all()); 
     }

//Show Admin Profile.....................................................
public function userProfileSetting()
{
    return view("user/setting")->with('user', Auth::user()); 
}



}
