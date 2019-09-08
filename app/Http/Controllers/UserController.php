<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;

class UserController extends Controller
{
    public function showUserDetails()
    {
         $users = User::all();
         return view("admin/users/user_details", compact("users")); 
    } 


    protected function blockedUser(Request $request)
    {
        $users = User::all();
        $ValuePassPath = 'block_days_user'.$request->id;
        $retrivValur =  $request->$ValuePassPath;



        //DD('block_days_user'.$request->id);
        //DD(now()->diffInDays($retrivValur));
            $validate_data =  Validator::make($request->all(),[
  
                'block_days_user'.$request->id   =>"required|date", 

           ])->validate();

            if( strtotime($retrivValur) < strtotime('now'))
            {
                session()->flash("error", "You can't Block User From Previous/Today Days !! please Select Blocked Duration");
                return view("admin/users/user_details", compact("users")); 
            }

            else if(now()->diffInDays($retrivValur) > 6 )
            {
                session()->flash("error", "You can Not Blocked User More Than 7 days");
                return view("admin/users/user_details", compact("users")); 
            }

             else if($UserDetails = User::find($request->id))
            {
                $UserDetails->blocked_date  = $retrivValur; //Database Insertation
                $is_saved = $UserDetails->save();

                if ($is_saved){
                    session()->flash("message", "Sucessfully Blocked User");
                    return view("admin/users/user_details", compact("users")); 
                }else{
                    session()->flash("error", "Failed to Blocked User");
                    return view("admin/users/user_details", compact("users")); 
                }
           }
           else{
                session()->flash("error", "Invalid Selected User To Block");
                return view("admin/users/user_details", compact("users")); 
          }
      
    }
    protected function unBlockedUser(Request $request)
    {
        
            $users = User::all();

           if($UserDetails = User::find($request->id))
           {
                $UserDetails->blocked_date    = null;

                $is_saved = $UserDetails->save();

                if ($is_saved)
                {
                    session()->flash("message", "Sucessfully Unblocked User");
                    return view("admin/users/user_details", compact("users")); 
                }
                else
                {
                    session()->flash("message", "Failed to Unblocked User");
                    return view("admin/users/user_details", compact("users")); 
                }
           }
           else
           {
                session()->flash("message", "Invalid Selected User Details");
                return view("admin/users/user_details", compact("users")); 
          }
      
    }


    protected function search(Request $request)
    {
        $validate_data =  Validator::make($request->all(),[
  
            'search_user'  => "required|string", 

       ])->validate();

         $user_search = $request->search_user;

        if ($user_search == NULL) 
        {
           $users= User::all();
           return view("admin/users/user_details", compact("users")); 
        } 
        else 
        {
            $users = User::where('name','LIKE', '%'.$user_search.'%')
                        ->orWhere('email', 'like', '%'.$user_search.'%')
                        ->orWhere('PhoneNum', 'like', '%'.$user_search.'%')
                        ->orWhere('location', 'like', '%'.$user_search.'%')
                        ->get(); 

                    return view("admin/users/user_details", compact("users"));  
        }
      
       
    }
   

}
