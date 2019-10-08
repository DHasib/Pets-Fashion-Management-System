<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\OrderDetail;
use App\OrderList;
use App\PaymentDetail;

use Illuminate\Http\Request;
use App\user;
use App\BlogPost;
use App\Category;
use App\Pet;
use App\Product;
use Auth;
use Validator;
use Session;


class adminController extends Controller
{ 
    //count Panding Order (Same user Multiple order count)........... 
            public function  total_user_order() {
        
        $total_user_order = DB::table('order_lists')
                        // ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                            ->select('user_id', DB::raw('count(user_id)  as total_order_details'))
                            //->where('order_details.order_status', '=',  '1')
                            ->groupBy('user_id')
                            ->get();
                            return $total_user_order;
            }
     //count Panding totl Pet Order.....................   
            public function  total_pet_order() {
                
                $total_pet_order =DB::table('users')
                    ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                    ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                    ->select('type', DB::raw('count(type)  as total_pet_type'))
                    ->where('order_lists.type', '=',  'pet')
                    ->where(function ($query) {
                    $query->where('order_status', '=',  '1');
                    })
                    ->groupBy('type')
                    ->get();
                    return $total_pet_order;
            }   
    //count Panding totl Product Order............. 
            public function  total_product_order()  {        
                $total_product_order =DB::table('users')
                    ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                    ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                    ->select('type', DB::raw('count(type)  as total_product_type'))
                    ->where('order_lists.type', '=',  'product')
                    ->where(function ($query) {
                    $query->where('order_status', '=',  '1');
                    })
                    ->groupBy('type')
                    ->get(); 

                    return $total_product_order;
            }
    
 //Show Admin Profile...................................................................................................
    public function showAdminProfile()
    {
        return view("admin/profile/profile")->with('user', Auth::user())
                                            ->with('authUser', Auth::user())
                                            ->with('posts', BlogPost::where('user_id', Auth::user()->id)->get())
                                            ->with('panding_order',          $this->total_user_order()->count())
                                            ->with('total_panding_pet',      $this->total_pet_order())
                                            ->with('total_panding_product',  $this->total_product_order()); 
    }
//Show Admin Profile..........................................................................................................
     public function settingAdminProfile()
     {
         return view("admin/profile/setting")->with('user', Auth::user())
                                             ->with('authUser', Auth::user())
                                            ->with('panding_order',          $this->total_user_order()->count())
                                            ->with('total_panding_pet',      $this->total_pet_order())
                                            ->with('total_panding_product',  $this->total_product_order()); 
     }
//Show Admin Dashboard............................................................................................................
    public function showAdminDashboard() 
    {

        return view("admin/profile/dashboard")->with('posts_count',          BlogPost::all()->count())
                                            ->with('panding_count',          BlogPost::where('status', 1)->get()->count())
                                            ->with('trashed_count',          BlogPost::onlyTrashed()->get()->count())
                                            ->with('users_count',            User::all()->count())
                                            ->with('categories_count',       Category::all()->count())
                                            ->with('pets_count',             Pet::all()->count())
                                            ->with('product_count',          Product::all()->count())
                                            ->with('total_item_sale',        OrderList::all('quentity')->Sum('quentity'))
                                            ->with('authUser',               Auth::user())
                                            ->with('panding_order',          $this->total_user_order()->count())
                                            ->with('total_panding_pet',      $this->total_pet_order())
                                            ->with('total_panding_product',  $this->total_product_order())
                                            ->with('total_panding_product',  $this->total_product_order());
    } 
//Panding Blogs list...............................................................................................................................
        public function showPanding()
        {
            $authUser = Auth::user(); 
            $panding = BlogPost::all();
            $panding_order           =  $this->total_user_order()->count();
            $total_panding_pet       =    $this->total_pet_order();
            $total_panding_product   = $this->total_product_order();

            return view('admin/blog_post/panding_blog', compact('panding', "authUser","panding_order","total_panding_pet","total_panding_product"));                                 

        }
//Astive user Blog....................................................................
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

 //Show User Management Form............................................................................................................................
            public function showUserDetails()
            {
                $users = User::all();
                $authUser = Auth::user(); 
                $panding_order           =  $this->total_user_order()->count();
                $total_panding_pet       =  $this->total_pet_order();
                $total_panding_product   =  $this->total_product_order();

                return view("admin/manage_users/manage_user", compact("users", "authUser",  "panding_order","total_panding_pet","total_panding_product")); 
            } 

//Block User By admin..........................................................................................................................................
            protected function blockedUser(Request $request)
            {
                $users = User::all();
                $authUser = Auth::user(); 
                $panding_order           =  $this->total_user_order()->count();
                $total_panding_pet       =    $this->total_pet_order();
                $total_panding_product   = $this->total_product_order();

                $ValuePassPath = 'block_days_user'.$request->id;
                $retrivValur =  $request->$ValuePassPath;

                    $validate_data =  Validator::make($request->all(),[

                      'block_days_user'.$request->id   =>"required|date", 

                    ])->validate();

                    if( strtotime($retrivValur) < strtotime('now'))
                    {
                        session()->flash("error", "You can't Block User From Previous/Today Days !! please Select Blocked Duration");
                        return view("admin/manage_users/manage_user", compact("users","panding_order","total_panding_pet","total_panding_product")); 
                    }

                    else if(now()->diffInDays($retrivValur) > 6 )
                    {
                        session()->flash("error", "You can Not Blocked User More Than 7 days");
                        return view("admin/manage_users/manage_user", compact("users", "authUser", "panding_order","total_panding_pet","total_panding_product" )); 
                    }

                    else if($UserDetails = User::find($request->id))
                    {
                        $UserDetails->blocked_date  = $retrivValur; //Database Insertation
                        $is_saved = $UserDetails->save();

                            if ($is_saved){
                                session()->flash("seccess", "Sucessfully Blocked User");
                                return view("admin/manage_users/manage_user", compact("users" ,"authUser","panding_order","total_panding_pet","total_panding_product")); 
                            }else{
                                session()->flash("error", "Failed to Blocked User");
                                return view("admin/manage_users/manage_user", compact("users","panding_order","total_panding_pet","total_panding_product")); 
                            }
                    }
                    else
                    {
                        session()->flash("error", "Invalid Selected User To Block");
                        return view("admin/manage_users/manage_user", compact("users", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                    }
 
}

//Unblock user by admin..........................................................................................................................................
            protected function unBlockedUser(Request $request)
            {
                    $users = User::all();
                    $authUser = Auth::user();
                    $panding_order           =  $this->total_user_order()->count();
                    $total_panding_pet       =    $this->total_pet_order();
                    $total_panding_product   = $this->total_product_order();

                if($UserDetails = User::find($request->id))
                {
                        $UserDetails->blocked_date    = null;

                        $is_saved = $UserDetails->save();

                        if ($is_saved)
                        {
                            session()->flash("success", "Sucessfully Unblocked User");
                            return view("admin/manage_users/manage_user", compact("users", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                        }
                        else
                        {
                            session()->flash("error", "Failed to Unblocked User");
                            return view("admin/manage_users/manage_user", compact("users", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                        }
                }
                else
                {
                        session()->flash("error", "Invalid Selected User Details");
                        return view("admin/manage_users/manage_user", compact("users", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                }
            
            }

//Search User by admin................................................................................................................................
        protected function search(Request $request)
        {
            $authUser = Auth::user(); 
            $panding_order           =  $this->total_user_order()->count();
            $total_panding_pet       =    $this->total_pet_order();
            $total_panding_product   = $this->total_product_order();

            $validate_data =  Validator::make($request->all(),[

                'search_user'  => "required|string", 

            ])->validate();

                $user_search = $request->search_user;

                if ($user_search == NULL) 
                {
                $users= User::all();
                return view("admin/users/user_details", compact("users", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                } 
                else 
                {
                    $users = User::where('name','LIKE', '%'.$user_search.'%')
                                ->orWhere('email', 'like', '%'.$user_search.'%')
                                ->orWhere('PhoneNum', 'like', '%'.$user_search.'%')
                                ->orWhere('location', 'like', '%'.$user_search.'%')
                                ->get(); 

                            return view("admin/manage_users/manage_user", compact("users", "authUser","panding_order","total_panding_pet","total_panding_product"));  
                }
        }
//Access granted as a  Doctor............................................................................................................................................
            protected function makeDoctor($user_id) 
            {

                $authUser = Auth::user(); 
                $users = User::all();
                $user = User::find($user_id);
                $panding_order           =  $this->total_user_order()->count();
                $total_panding_pet       =    $this->total_pet_order();
                $total_panding_product   = $this->total_product_order();
            
                if($user->role == 0)
                {
                    
                        $user->role = 2;
                        $is_saved = $user->save();
                    if(  $is_saved)
                    {
                        session()->flash("success", "Access Granted to a Details");
                        return view("admin/manage_users/manage_user", compact("users", "user", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                    }
                    else
                    {
                        session()->flash("error", "Failed to make him Doctor");
                        return view("admin/manage_users/manage_user", compact("users" ,"user", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                        }
            }
            else
            {
                session()->flash("error", "Already make as him Doctor");
                return view("admin/manage_users/manage_user", compact("users", "user", "authUser","panding_order","total_panding_pet","total_panding_product")); 
            }

            }
//Remove Doctor Access.......................................................................................................................................................
            protected function removeDoctor($user_id) 
            {
                $authUser = Auth::user(); 
                $users = User::all();
                $user = User::find($user_id);
                $panding_order           =  $this->total_user_order()->count();
                $total_panding_pet       =  $this->total_pet_order();
                $total_panding_product   =  $this->total_product_order();
            
                if($user->role == 2)
                {
                    $user->role = 0;
                    $is_saved = $user->save();

                        if(  $is_saved)
                        {
                            session()->flash("success", "Remove Access successfully");
                            return view("admin/manage_users/manage_user", compact("users", "user", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                        }
                        else
                        {
                            session()->flash("error", "Failed to remove him Doctor");
                            return view("admin/manage_users/manage_user", compact("users" ,"user", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                        }
                }
                else
                {
                    session()->flash("error", "Already make as him Doctor");
                    return view("admin/manage_users/manage_user", compact("users", "user", "authUser","panding_order","total_panding_pet","total_panding_product")); 
                }

            }





}
