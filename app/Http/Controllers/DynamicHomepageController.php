<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DynamicHomepage;

use App\DynamicLinks;

use Validator;

use session;


class DynamicHomepageController extends Controller
{

// ================  Slider Area ===================================================================================================================================================================================================

    public function showUploadSlider()
    {
         $sdata = DynamicHomepage::all();
        return view("admin/home_page/home_slider", compact("sdata"));
    }  

    protected function updateSliderDetails(Request $request)
    {
        
            $validate_data =  Validator::make($request->all(),[
            "slider_title"          =>"required|max:50|string",
            "slider_heading"        =>"required|max:100|string",
            "slider_desc"           =>"required|max:200|string",
            "slider_image"          =>"required|image|mimes:jpeg,jpg|max:2050",
           ])->validate();

           $sdata = DynamicHomepage::all();
         if($sliderDetails = DynamicHomepage::find($request->id))
         {
           
            $FileLocation = public_path() . '/images/Slider_img';

            $sliderDetails->slider_title      = $request->slider_title;
            $sliderDetails->slider_heading    = $request->slider_heading;
            $sliderDetails->slider_desc       = $request->slider_desc;
            $sliderDetails->slider_image      = $request->slider_image;
                
            
                if ($request->hasFile('slider_image')) 
                {
                    $image = $request->file('slider_image');
                   $image_new_name      =  time().$image->getClientOriginalName();

                   $sliderDetails->slider_image = '/images/Slider_img/' . $image_new_name ;

                    $image->move($FileLocation, $sliderDetails->slider_image);
                } 
                $is_saved = $sliderDetails->save();

                if ($is_saved){
                    session()->flash("message", "Sucessfully Upload Slider");
                    return view("admin/home_page/home_slider", compact("sdata"));
                }else{
                    session()->flash("error", "Failed to Upload Slider");
                    return view("admin/home_page/home_slider", compact("sdata"));
                }
          }
          else{
            session()->flash("error", "Please First Select the Slider Details which you Want to Update");
            return view("admin/home_page/home_slider", compact("sdata"));
          }
      
    }

    public function editSlide($slider_id)
    { 
        $sdata = DynamicHomepage::all();
        $eslider = DynamicHomepage::find($slider_id);
    
        return view("admin/home_page/home_slider", compact("eslider","sdata"));

    }

// ============  Top Header Area =======================================================================================================================================================================================================
    

public function showTopHeader()
{
     $link = DynamicLinks::all();
    return view("admin/home_page/home_top_header", compact("link"));
}  


protected function updatetopHeader(Request $request)
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
                session()->flash("message", "Sucessfully Upload Header Details");
                return view("admin/home_page/home_top_header", compact("link"));
            }else{
                session()->flash("message", "Failed to Upload Header Details");
                return view("admin/home_page/home_top_header", compact("link"));
            }
        
      
    }



}
