<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use session;


use App\DynamicLinks;
use App\user;
use App\BlogPost;
use App\Category;
use App\LikeBlog;
use App\BlogComment;

use App\DoctorAppoinment;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Show User Profile............................................................
    public function index()
    {
        return view("user/profile")->with('user',           Auth::user())
                                    ->with('posts',         BlogPost::where('user_id', Auth::user()->id)->get())
                                    ->with('link',          DynamicLinks::all())
                                    ->with('LikeBlog',      LikeBlog::all())
                                    ->with('BlogComment',   BlogComment::all());

    }


//Show Admin Profile.....................................................
    public function userProfileSetting()
    {
        return view("user/setting")->with('user',             Auth::user())
                                   ->with('link',             DynamicLinks::all());
    }


    //Show blog posted user profile....................
        public function pUserShow($id){

            $user = user::find($id);
        
            //dd($id);
            return view("public/profile")->with('user',    $user)
                                        ->with('uposts',   BlogPost::where('user_id',$id)->get())
                                        ->with('link',    DynamicLinks::all())
                                        ->with('LikeBlog',         LikeBlog::all())
                                        ->with('BlogComment',      BlogComment::all());

        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//Update profile details.............................................................................................
    public function updateProfile(Request $request) 
    {
            $validate_data =  Validator::make($request->all(),[
                "name"           =>"required|min:5|string",
                "gender"         =>"required|string",
                "location"       =>"required|string|max:30",
            ])->validate();

            $user = Auth::user();

            $user->name        = $request->name;
            $user->gender      = $request->gender;
            $user->location    = $request->location;
             
             $is_saved = $user->save();
 
             if ($is_saved){
                 session()->flash("message", "Sucessfully Update Profile");
                 return redirect()->back();
             }else{
                 session()->flash("error", "Failed to Update Profile");
                 return redirect()->back();
             }
    }

    //Change Email address.....................................................
    public function changeEmail(Request $request){
       
            $validate_data =  Validator::make($request->all(),[
                "email"          =>"required|email|unique:users",
            ])->validate();

            $user = Auth::user();

            $user->email       = $request->email;
             
             $is_saved = $user->save();
 
             if ($is_saved){
                 session()->flash("message", "Sucessfully Change Your Email");
                 return redirect()->back();
             }else{
                 session()->flash("error", "Failed toChange Your Email");
                 return redirect()->back();
             }
        }
       
//Change Phone Number ...................................................
    public function changePhoneNumber(Request $request){
      
            $validate_data =  Validator::make($request->all(),[
                    "PhoneNum"       =>"required|regex:/(01)[0-9]{9}/|max:16|unique:users",
                ])->validate();

                $user = Auth::user();

                $user->PhoneNum    = $request->PhoneNum;
                    
                    $is_saved = $user->save();

                    if ($is_saved){
                        session()->flash("message", "Sucessfully Change your Phone Number ");
                        return redirect()->back();
                    }else{
                        session()->flash("error", "Failed to Change your Phone Number");
                        return redirect()->back();
                    }
       
    }

//Save profile details.............................................................................................
    public function saveProfile(Request $request) 
    {
      $validate_data =  Validator::make($request->all(),[
            "user_fb_link"   =>"required|url",
            "user_yt_link"   =>"required|url",
            "your_self"      =>"required|string|min:50|max:1000",
        ])->validate();

            $user = Auth::user();

            $user->profile->about       = $request->your_self;
            $user->profile->facebook    = $request->user_fb_link;
            $user->profile->youtube     = $request->user_yt_link;
           
            
            $is_saved = $user->profile->save();

            if ($is_saved){
                session()->flash("message", "Sucessfully Added Profile Details");
                return redirect()->back();
            }else{
                session()->flash("error", "Failed to Upload Header Details");
                return redirect()->back();
            }
    }



//Upload profile Picture.............................................................................................
    public function uloadProfileImage(Request $request) 
    {
      $validate_data =  Validator::make($request->all(),[
            
            "profile_pic"    => "required|image|mimes:jpeg,jpg|max:2050",

      ],[
        "profile_pic.image"       =>"Image Must be a Image",
        "profile_pic.mimes"       =>"Please insert jpeg,jpg formate Images",
        "profile_pic.max"         =>"Image can't be larger then 1 MB ",
      ])->validate();

         $user = Auth::user();
        
         $FileLocation = public_path() . '/images/uploads/profile_img';

            if ($request->hasFile('profile_pic')) 
            {
                $image = $request->file('profile_pic');
               $image_new_name      =  time().$image->getClientOriginalName();

               $user->profile->user_img  = '/images/uploads/profile_img/' . $image_new_name ;

                $image->move($FileLocation,  $user->profile->user_img);
            } 
            
            $is_saved = $user->profile->save();

            if ($is_saved){
                session()->flash("message", "Sucessfully Upload Profile Picture");
                return redirect()->back();
            }else{
                session()->flash("error", "Failed to Upload Profile Picture");
                return redirect()->back();
            }
    }


//Change User Password .............................................................................................
    public function changeUserPassword(Request $request) 
    {

        $user = Auth::user();
     
      $validate_data =  Validator::make($request->all(),[
            "old_pass"    =>"required",
            "new_pass"    =>"required|string|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", 
          
      ],[
          "new_pass.regex"    =>"New Password must be 8 characters long and should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",

      ])->validate();


                if( Hash::check($request->old_pass, $user->password)){

                    $user->password    = $request->new_pass;

                    $is_saved = $user->save();
        
                    if ($is_saved){
                        session()->flash("message", "Successfuly Change Tour Password");
                        return redirect()->back();
                    }

                }  
                else{
                    session()->flash("error", "Old Passwrod Does Not Match");
                    return redirect()->back();
                }
     }

//Show User Get Doctor Appoinment Details.....................................................
    public function showDoctorAppoinment(){
      
        return view("user/doctor_appoinment")->with('user',                 Auth::user())
                                             ->with('recent_appoinments',   DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 0)->get())
                                             ->with('link',                 DynamicLinks::all())
                                             ->with('previous_appoinments', DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 1)->get())
                                             ->with('appoinments_details',  DoctorAppoinment::where('status', 0)->get());
    }
//Mars Appoinment As visited User By doctor.....................................................
    public function markAsVisited($id){

       $Visited = DoctorAppoinment::find($id);

       $Visited->status    = 1;
       $is_saved = $Visited->save();
      
       if($is_saved){
             session()->flash("success", "This Patient Mark as visited ");


             return view("user/doctor_appoinment")->with('user',                 Auth::user())
                                                  ->with('recent_appoinments',   DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 0)->get())
                                                  ->with('link',                 DynamicLinks::all())
                                                  ->with('previous_appoinments', DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 1)->get())
                                                  ->with('appoinments_details',  DoctorAppoinment::where('status', 0)->get());

       }
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
