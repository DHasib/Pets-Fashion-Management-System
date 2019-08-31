<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlController extends Controller
{
     public function home(){
        return view("html.index");
     }
    public function pet_products(){
         
        return view("html.pet_products");
    }
    public function pets(){
         
        return view("html.pets");
    }
    public function calculate_pet_keeping_cost(){
         
        return view("html.calculate_pet_keeping_cost");
    }
    public function doctor_support(){
         
        return view("html.doctor_support");
    }
    public function blog(){
         
        return view("html.blog");
    }
    public function contact_us(){
         
        return view("html.contact_us");
    }
    public function sing_in(){
         
        return view("html.sing_in");
    }
    public function sing_up(){
         
        return view("html.sing_up");
    }
    public function cart(){
         
        return view("html.cart");
    }
    public function check_out(){
         
        return view("html.check_out");
    }
    public function user_profile(){
         
        return view("html.user_profile");
    }
    public function admin_pannel(){
         
        return view("html.admin_pannel");
    }
    public function items_details(){
         
        return view("html.items_details");
    }
    public function doctor_management(){
         
        return view("html.doctor_management");
    }
    public function page_not_found (){
         
        return view("html.page_not_found");
    }


}
