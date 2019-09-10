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
  ///  return view('html.index');
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


//Route::get('admin', function () {
    //return view('layouts/admin_master');
//});



//Route group for Registered Users.........................................................................................................................................................................................
//.................................................................................................................................................................................................................
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('users.index');
    });
    //Route::get('/addFlat','RoomInfoController@showAddFlatForm');
   
});








//Route group for Admin Activities.........................................................................................................................................................................................
//.................................................................................................................................................................................................................
Route::prefix('admin')->middleware(['auth' , 'auth.admin'])->group(function () {
    Route::get('admin', function () {
        return view('layouts/admin_master');
    });


      //Post Blog CRUD Functionaly using Resource Controller......................
          Route::Resource("blogPost", "BlogPostController");

      //Catageries CRUD Functionaly using Resource Controller......................
          Route::Resource("petCategory", "CategoriesController");

     //Admin Profile...............................................................
        // Route::Resource("profile/show", "ProfileController");
         Route::get("profile/show", "ProfileController@showAdminProfile");
         Route::Post("profile/update", "ProfileController@updateProfile");
         Route::Post("profile/save", "ProfileController@saveProfile");
         Route::Post("profile/image/upload", "ProfileController@uloadProfileImage");
         Route::Post("account/password/change", "ProfileController@changeUserPassword");
        
      //User Details Show/Block Work...............................................
          Route::get("make/doctor/{user_id}", "UserController@makeDoctor");
          Route::get("remove/doctor/{user_id}", "UserController@removeDoctor");
          Route::get("users/table", "UserController@showUserDetails");
          Route::post("user/blocked", "UserController@blockedUser");
          Route::post("user/unblocked", "UserController@unBlockedUser");
          Route::post("search/user", "UserController@search");

      //Top Header Edit Work........................................................
          Route::get("topHeader/show", "DynamicHomepageController@showTopHeader");
          Route::post("topHeader/update", "DynamicHomepageController@updatetopHeader");

      //Slide Edit Work.............................................................
          Route::get("slider/show", "DynamicHomepageController@showUploadSlider");
          Route::get('slider/edit/{slider_id}', 'DynamicHomepageController@editSlide');
          Route::post("slider/update", "DynamicHomepageController@updateSliderDetails");


});