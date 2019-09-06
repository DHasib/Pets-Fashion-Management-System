<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
   // return view('html.index');
//});




Auth::routes();

Route::get('home', 'HomeController@index');

Route::get("pet_products", "HomeController@pet_products");

Route::get("pets", "HomeController@pets");

Route::get("calculate_pet_keeping_cost", "HomeController@calculate_pet_keeping_cost");

Route::get("user/doctor_support", "HomeController@doctor_support");

Route::get("blog", "HomeController@blog");

Route::get("contact_us", "HomeController@contact_us");

Route::get("cart", "HomeController@cart");

Route::get("check_out", "HomeController@check_out");

Route::get("user_profile", "HomeController@user_profile");

Route::get("admin_pannel", "HomeController@admin_pannel");

Route::get("items_details", "HomeController@items_details");

Route::get("doctor_management", "HomeController@doctor_management");

Route::get("page_not_found", "HomeController@page_not_found");

//Route group for registered user
Route::prefix('user')->middleware(['auth'])->group(function () {
 
  //  Route::get("doctor_support", "HomeController@doctor_support");
});


Route::get('admin', function () {
    return view('layouts/admin_master');
});











//Route group for admin
Route::prefix('admin')->middleware(['auth','auth.admin'])->group(function () {
  Route::get('admin', function () {
      return view('layouts/admin_master');
  });
  
  //Top Header Edit Work...............
  Route::get("topHeader/show", "DynamicHomepageController@showTopHeader");

  Route::post("topHeader/update", "DynamicHomepageController@updatetopHeader");


  //Slide Edit Work...............
  Route::get("slider/show", "DynamicHomepageController@showUploadSlider");
  Route::get('slider/edit/{slider_id}', 'DynamicHomepageController@editSlide');

  Route::post("slider/update", "DynamicHomepageController@updateSliderDetails");


});