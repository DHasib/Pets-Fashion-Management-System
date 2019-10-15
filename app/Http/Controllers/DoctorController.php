<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\DoctorAppoinment;

use Session;
use App\DynamicLinks;

class DoctorController extends Controller
{
    
//Show User Get Doctor Appoinment Details....................................................................................................................
public function showDoctorAppoinment(){
      
    return view("user/doctor_appoinment")->with('user',                 Auth::user())
                                         ->with('recent_appoinments',   DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 0)->get())
                                         ->with('link',                 DynamicLinks::all())
                                         ->with('previous_appoinments', DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 1)->get())
                                         ->with('appoinments_details',  DoctorAppoinment::where('status', 0)->get());
}


    //To Insert Doctor Appoinment.............................................................................
    public function storeAppoinment(Request $request){
       
       
        $dap = DoctorAppoinment::where('user_id', Auth::id())->get();

        $validate_data =  Validator::make($request->all(),[

            "category_id"      =>"required|integer", 
            "pet_problem"      =>"required|string|min:50|max:500",
            "pet_p_n_date"     =>"required|date",
            "pet_age"          =>"required|string",
            "doctor_v_date"    =>"required|date",
          
           ])->validate();

          if( strtotime($request->pet_p_n_date) > strtotime('now'))
          {
              session()->flash("error", "You can't select future date to noticed pet problen !! please Select Valid Date");
              return redirect()->back();
          }
          if( strtotime($request->doctor_v_date) < strtotime('now'))
          {
              session()->flash("error", "You can't select Previous date to Visite Doctor !! please Select Valid Date");
              return redirect()->back();
          }
       
          if($dap->toarray() != null )
          {
              foreach($dap as $d){
                  if( ($d->status == 0 ) &&  ($d->doctor_visit_date > NOW()) )
                  {
                      session()->flash("error", "You Allready get a doctor appoinment!!! please Visite Doctor  first then take another appoinment");
                      return redirect()->back();
                  }
              }
           }
         

          $store_appoinment  =  DoctorAppoinment::create([
              'category_id'           => $request->category_id,
              'pet_problem'           => $request->pet_problem,
              'problem_notice_date'   => $request->pet_p_n_date,
              'pet_age'               => $request->pet_age,
              'doctor_visit_date'     => $request->doctor_v_date,
              'user_id'               => Auth::id()

           ]);
                   session::flash("success", "Sucessfully Get Doctor Appoinment Please Check Your Profile for More Details");
                   return redirect()->back();
    }



    //Mars Appoinment As visited User By doctor.....................................................................................................................
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
 
     //User cancel Doctor Appoinment....................................................................
     public function cancelAppoinment($id){
 
         $cancel = DoctorAppoinment::find($id);
 
        if($cancel){
 
            if($cancel->user_id == Auth::id()){
                $cancel->delete();
 
                session()->flash("success", "Appoinment has been cancel");
        
        
                return view("user/doctor_appoinment")->with('user',                 Auth::user())
                                                     ->with('recent_appoinments',   DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 0)->get())
                                                     ->with('link',                 DynamicLinks::all())
                                                     ->with('previous_appoinments', DoctorAppoinment::where('user_id', Auth::user()->id)->where('status', 1)->get())
                                                     ->with('appoinments_details',  DoctorAppoinment::where('status', 0)->get());
            }else{
                session()->flash("error", "You don't have a permission to delete Other User Appoinment ");
                return redirect()->back();
            }
        
        }else{
 
         session()->flash("error", "Invailed Appoinment ID");
         return redirect()->back();
        }
     }






}
