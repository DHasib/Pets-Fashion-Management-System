<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicHomepage;
use App\DynamicLinks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sdata = DynamicHomepage::all();
        $link = DynamicLinks::all();
        return view('html/index', compact('sdata','link'));
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
    public function cart(){
         
        return view("html.cart");
    }
    public function check_out(){
         
        return view("html.check_out");// DUE.............
    }
    public function user_profile(){
         
        return view("html.user_profile");// DUE.............
    }
    public function admin_pannel(){
         
        return view("html.admin_pannel");// DUE.............
    }
    public function items_details(){
         
        return view("html.items_details");
    }
    public function doctor_management(){
         
        return view("html.doctor_management");// DUE.............
    }
    public function page_not_found (){
         
        return view("html.page_not_found");// DUE.............
    }
}
