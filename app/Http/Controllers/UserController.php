<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;

class UserController extends Controller
{
     //Show User Management Form..............................
        public function showUserDetails()
        {
            $users = User::all();
            return view("admin/manage_users/manage_user", compact("users")); 
        } 

   //Block User By admin..............................
        protected function blockedUser(Request $request)
        {
            $users = User::all();
            $ValuePassPath = 'block_days_user'.$request->id;
            $retrivValur =  $request->$ValuePassPath;

                $validate_data =  Validator::make($request->all(),[
    
                  'block_days_user'.$request->id   =>"required|date", 

                ])->validate();

                if( strtotime($retrivValur) < strtotime('now'))
                {
                    session()->flash("error", "You can't Block User From Previous/Today Days !! please Select Blocked Duration");
                    return view("admin/manage_users/manage_user", compact("users")); 
                }

                else if(now()->diffInDays($retrivValur) > 6 )
                {
                    session()->flash("error", "You can Not Blocked User More Than 7 days");
                    return view("admin/manage_users/manage_user", compact("users")); 
                }

                else if($UserDetails = User::find($request->id))
                {
                    $UserDetails->blocked_date  = $retrivValur; //Database Insertation
                    $is_saved = $UserDetails->save();

                        if ($is_saved){
                            session()->flash("seccess", "Sucessfully Blocked User");
                            return view("admin/manage_users/manage_user", compact("users")); 
                        }else{
                            session()->flash("error", "Failed to Blocked User");
                            return view("admin/manage_users/manage_user", compact("users")); 
                        }
                }
                else
                {
                    session()->flash("error", "Invalid Selected User To Block");
                    return view("admin/manage_users/manage_user", compact("users")); 
                }
        
    }

    //Unblock user by admin..............................
        protected function unBlockedUser(Request $request)
        {
                $users = User::all();

            if($UserDetails = User::find($request->id))
            {
                    $UserDetails->blocked_date    = null;

                    $is_saved = $UserDetails->save();

                    if ($is_saved)
                    {
                        session()->flash("success", "Sucessfully Unblocked User");
                        return view("admin/manage_users/manage_user", compact("users")); 
                    }
                    else
                    {
                        session()->flash("error", "Failed to Unblocked User");
                        return view("admin/manage_users/manage_user", compact("users")); 
                    }
            }
            else
            {
                    session()->flash("error", "Invalid Selected User Details");
                    return view("admin/manage_users/manage_user", compact("users")); 
            }
        
        }

   //Search User by admin..............................
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

                            return view("admin/manage_users/manage_user", compact("users"));  
                }
        }
    //Access granted as a  Doctor..............................
        public function makeDoctor($user_id) 
        {

            $users = User::all();
            $user = User::find($user_id);
        
            if($user->role == 0)
            {
                
                    $user->role = 2;
                    $is_saved = $user->save();
                if(  $is_saved)
                {
                    session()->flash("success", "Access Granted to a Details");
                    return view("admin/manage_users/manage_user", compact("users", "user")); 
                }
                else
                {
                    session()->flash("error", "Failed to make him Doctor");
                    return view("admin/manage_users/manage_user", compact("users" ,"user")); 
                    }
        }
        else
        {
            session()->flash("error", "Already make as him Doctor");
            return view("admin/manage_users/manage_user", compact("users", "user")); 
        }
    
        }
    //Remove Doctor Access..............................
    protected function removeDoctor($user_id) 
        {
            $users = User::all();
            $user = User::find($user_id);
        
            if($user->role == 2)
            {
                $user->role = 0;
                $is_saved = $user->save();

                    if(  $is_saved)
                    {
                        session()->flash("success", "Remove Access successfully");
                        return view("admin/manage_users/manage_user", compact("users", "user")); 
                    }
                    else
                    {
                        session()->flash("error", "Failed to remove him Doctor");
                        return view("admin/manage_users/manage_user", compact("users" ,"user")); 
                    }
            }
            else
            {
                session()->flash("error", "Already make as him Doctor");
                return view("admin/manage_users/manage_user", compact("users", "user")); 
            }
  
        }


  /////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Admin Profile Update...........................................................
        protected function updateAdminProfile(Request $request)
        {
            
                $validate_data =  Validator::make($request->all(),[
                "shop_contact_number"   =>"required|regex:/(01)[0-9]{9}/|max:16", 
                "shop_email"            =>"required|email",
                "shop_open_details"     =>"required|max:50|string",
                "shop_fb_link"          =>"required|url",
                "shop_tw_link"          =>"required|url",
                "shop_glg_link"         =>"required|url",
                "shop_pint_link"        =>"required|url",
                "shop_instrsg_link"     =>"required|url",
                "shop_lnkd_link"        =>"required|url",
            ])->validate();

                $link = DynamicLinks::all();
                $headerDerails = DynamicLinks::find($request->id) ;
            
                $headerDerails->shop_contact_number     = $request->shop_contact_number;
                $headerDerails->shop_email              = $request->shop_email;
                $headerDerails->shop_open_details       = $request->shop_open_details;
                $headerDerails->shop_fb_link            = $request->shop_fb_link;
                $headerDerails->shop_tw_link            = $request->shop_tw_link;
                $headerDerails->shop_glg_link           = $request->shop_glg_link;
                $headerDerails->shop_pint_link          = $request->shop_pint_link;
                $headerDerails->shop_instrsg_link       = $request->shop_instrsg_link;
                $headerDerails->shop_lnkd_link          = $request->shop_lnkd_link;
                
                $is_saved = $headerDerails->save();

                if ($is_saved){
                    session()->flash("success", "Sucessfully Upload Header Details");
                    return view("admin/home_page/home_top_header", compact("link"));
                }else{
                    session()->flash("error", "Failed to Upload Header Details");
                    return view("admin/home_page/home_top_header", compact("link"));
                }
            
        
        }




}
