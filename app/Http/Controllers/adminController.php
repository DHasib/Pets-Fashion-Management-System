<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\BlogPost;
use App\Category;
use App\Pet;
use Auth;
use Validator;
use session;


class adminController extends Controller
{
    
 //Show Admin Profile.....................................................
    public function showAdminProfile()
    {
        return view("admin/profile/profile")->with('user', Auth::user())
                                            ->with('posts', BlogPost::where('user_id', Auth::user()->id)->get()); 
    }
//Show Admin Profile.....................................................
     public function settingAdminProfile()
     {
         return view("admin/profile/setting")->with('user', Auth::user()); 
     }
//Show Admin Dashboard.....................................................
    public function showAdminDashboard()
    {
        return view("admin/profile/dashboard")->with('posts_count',    BlogPost::all()->count())
                                            ->with('panding_count',    BlogPost::where('status', 1)->get()->count())
                                            ->with('trashed_count',    BlogPost::onlyTrashed()->get()->count())
                                            ->with('users_count',      User::all()->count())
                                            ->with('categories_count', Category::all()->count())
                                            ->with('pets_count',       Pet::all()->count())
                                            ->with('authUser',         Auth::user());
    } 
//Panding Blogs list.............................................
        public function showPanding()
        {
            $authUser = Auth::user(); 
            $panding = BlogPost::all();

            return view('admin/blog_post/panding_blog', compact('panding', "authUser"));                                 

        }
//Astive user Blog.............................................
        public function active($id)
        {
            $status = BlogPost::find($id);

            //DD( $status->status);
            if($status->status == 1){
        
                $status->status = 0;
                $status->save();

                Session::flash('success', 'Post has been Active Successfully.');

                return redirect()->back();

            }
        }

 //Show User Management Form..............................
            public function showUserDetails()
            {
                $users = User::all();
                $authUser = Auth::user(); 
                return view("admin/manage_users/manage_user", compact("users", "authUser")); 
            } 

//Block User By admin..............................
            protected function blockedUser(Request $request)
            {
                $users = User::all();
                $authUser = Auth::user(); 

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
                        return view("admin/manage_users/manage_user", compact("users", "authUser" )); 
                    }

                    else if($UserDetails = User::find($request->id))
                    {
                        $UserDetails->blocked_date  = $retrivValur; //Database Insertation
                        $is_saved = $UserDetails->save();

                            if ($is_saved){
                                session()->flash("seccess", "Sucessfully Blocked User");
                                return view("admin/manage_users/manage_user", compact("users" ,"authUser")); 
                            }else{
                                session()->flash("error", "Failed to Blocked User");
                                return view("admin/manage_users/manage_user", compact("users")); 
                            }
                    }
                    else
                    {
                        session()->flash("error", "Invalid Selected User To Block");
                        return view("admin/manage_users/manage_user", compact("users", "authUser")); 
                    }
 
}

//Unblock user by admin..............................
            protected function unBlockedUser(Request $request)
            {
                    $users = User::all();
                    $authUser = Auth::user(); 

                if($UserDetails = User::find($request->id))
                {
                        $UserDetails->blocked_date    = null;

                        $is_saved = $UserDetails->save();

                        if ($is_saved)
                        {
                            session()->flash("success", "Sucessfully Unblocked User");
                            return view("admin/manage_users/manage_user", compact("users", "authUser")); 
                        }
                        else
                        {
                            session()->flash("error", "Failed to Unblocked User");
                            return view("admin/manage_users/manage_user", compact("users", "authUser")); 
                        }
                }
                else
                {
                        session()->flash("error", "Invalid Selected User Details");
                        return view("admin/manage_users/manage_user", compact("users", "authUser")); 
                }
            
            }

//Search User by admin..............................
        protected function search(Request $request)
        {
            $authUser = Auth::user(); 
            $validate_data =  Validator::make($request->all(),[

                'search_user'  => "required|string", 

            ])->validate();

                $user_search = $request->search_user;

                if ($user_search == NULL) 
                {
                $users= User::all();
                return view("admin/users/user_details", compact("users", "authUser")); 
                } 
                else 
                {
                    $users = User::where('name','LIKE', '%'.$user_search.'%')
                                ->orWhere('email', 'like', '%'.$user_search.'%')
                                ->orWhere('PhoneNum', 'like', '%'.$user_search.'%')
                                ->orWhere('location', 'like', '%'.$user_search.'%')
                                ->get(); 

                            return view("admin/manage_users/manage_user", compact("users", "authUser"));  
                }
        }
//Access granted as a  Doctor..............................
            protected function makeDoctor($user_id) 
            {

                $authUser = Auth::user(); 
                $users = User::all();
                $user = User::find($user_id);
            
                if($user->role == 0)
                {
                    
                        $user->role = 2;
                        $is_saved = $user->save();
                    if(  $is_saved)
                    {
                        session()->flash("success", "Access Granted to a Details");
                        return view("admin/manage_users/manage_user", compact("users", "user", "authUser")); 
                    }
                    else
                    {
                        session()->flash("error", "Failed to make him Doctor");
                        return view("admin/manage_users/manage_user", compact("users" ,"user", "authUser")); 
                        }
            }
            else
            {
                session()->flash("error", "Already make as him Doctor");
                return view("admin/manage_users/manage_user", compact("users", "user", "authUser")); 
            }

            }
//Remove Doctor Access..............................
            protected function removeDoctor($user_id) 
            {
                $authUser = Auth::user(); 
                $users = User::all();
                $user = User::find($user_id);
            
                if($user->role == 2)
                {
                    $user->role = 0;
                    $is_saved = $user->save();

                        if(  $is_saved)
                        {
                            session()->flash("success", "Remove Access successfully");
                            return view("admin/manage_users/manage_user", compact("users", "user", "authUser")); 
                        }
                        else
                        {
                            session()->flash("error", "Failed to remove him Doctor");
                            return view("admin/manage_users/manage_user", compact("users" ,"user", "authUser")); 
                        }
                }
                else
                {
                    session()->flash("error", "Already make as him Doctor");
                    return view("admin/manage_users/manage_user", compact("users", "user", "authUser")); 
                }

            }


/////////////////////////////////////////////////////////////////////////////////////////////////////////

//Admin Profile Update...........................................................
            protected function updateAdminProfile(Request $request)
            {
                $authUser = Auth::user(); 
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
                        return view("admin/home_page/home_top_header", compact("link", "authUser"));
                    }else{
                        session()->flash("error", "Failed to Upload Header Details");
                        return view("admin/home_page/home_top_header", compact("link", "authUser"));
                    }
                
            
            }




}
