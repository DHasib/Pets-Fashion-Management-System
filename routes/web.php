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
  //  return view('welcome');
//});


Route::get("home", "HtmlController@home");

Route::get("pet_products", "HtmlController@pet_products");

Route::get("pets", "HtmlController@pets");

Route::get("calculate_pet_keeping_cost", "HtmlController@calculate_pet_keeping_cost");

Route::get("doctor_support", "HtmlController@doctor_support");

Route::get("blog", "HtmlController@blog");

Route::get("contact_us", "HtmlController@contact_us");

Route::get("sing_in", "HtmlController@sing_in");

Route::get("sing_up", "HtmlController@sing_up");

Route::get("cart", "HtmlController@cart");

Route::get("items_details", "HtmlController@items_details");

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
