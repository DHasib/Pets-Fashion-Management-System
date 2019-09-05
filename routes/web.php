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

Route::get("doctor_support", "HomeController@doctor_support");

Route::get("blog", "HomeController@blog");

Route::get("contact_us", "HomeController@contact_us");

Route::get("cart", "HomeController@cart");

Route::get("check_out", "HomeController@check_out");

Route::get("user_profile", "HomeController@user_profile");

Route::get("admin_pannel", "HomeController@admin_pannel");

Route::get("items_details", "HomeController@items_details");

Route::get("doctor_management", "HomeController@doctor_management");

Route::get("page_not_found", "HomeController@page_not_found");





