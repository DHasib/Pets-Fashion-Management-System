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

            //Publicly Blog Show.....................................................................
                    Route::get("blog", "HomeController@blog");
                    Route::get("post/{slug}", "HomeController@singleBlog");
                    Route::get("blog/category/{id}", "HomeController@blogCategory");

            //Publicly Pets Show in Shop..............................................................
                    Route::get("pets", "HomeController@petsIndex");
                    Route::get("about/pet/{slug}", "HomeController@aboutPet");
                    Route::get("pets/category/{id}", "HomeController@petsCategory");
                    Route::post("pets/search", "HomeController@searchPets");

            //Publicly Produstc Show in Shop..............................................................
                    Route::get("products", "HomeController@productIndex");
                    Route::get("about/product/{slug}", "HomeController@aboutProduct");
                    Route::get("products/category/{id}", "HomeController@productsCategory");
                    Route::post("products/search", "HomeController@searchProducts");

            //Publicly Order Items and store add to cart Show ..............................................................
                    Route::get("pet/add/cart/{pet_id}", "ShoppingController@petAddToCart");
                    Route::get("product/add/cart/{product_id}", "ShoppingController@productAddToCart");
                    Route::get("shopping/cart", "ShoppingController@cart");

                    Route::get("cart/delete/{id}/{status}", "ShoppingController@cart_delete");
                    Route::get("cart/incr/{rowId}/{id}/{qty}/{status}", "ShoppingController@incr");
                    Route::get("cart/decr/{rowId}/{qty}/{status}", "ShoppingController@decr");

                  





                Route::get("calculate_pet_keeping_cost", "HomeController@calculate_pet_keeping_cost");

                Route::get("user/doctor_support", "HomeController@doctor_support");



                Route::get("contact_us", "HomeController@contact_us");

            //    Route::get("cart", "HomeController@cart");

             //   Route::get("check_out", "HomeController@check_out");

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


        Route::post("cart/checkout", "ChechOutController@cartCheckOut");
        Route::get("dk", "ChechOutController@dk");


        Route::get("blog/edit/{id}", "BlogPostsController@userBlogEdit");
        Route::Resource("blogPost", "BlogPostsController");
        Route::get("show/blog", "BlogPostsController@postBlog");
        
        Route::get("trash/{id}", "trashController@destroy");
        Route::get("trashed", "trashController@trashedUser");
        Route::get("restore/{id}", "trashController@restore");
        Route::get("killed/{id}", "trashController@kill");

        
        Route::get("profile/show", "UserController@showUserProfile");
        Route::get("profile/setting", "UserController@userProfileSetting");


        Route::Post("profile/update", "ProfileController@updateProfile");
        Route::Post("profile/save", "ProfileController@saveProfile");
        Route::Post("profile/image/upload", "ProfileController@uloadProfileImage");
        Route::Post("account/password/change", "ProfileController@changeUserPassword");

      


    
    });








//Route group for Admin Activities.........................................................................................................................................................................................
//.................................................................................................................................................................................................................
                Route::prefix('admin')->middleware(['auth' , 'auth.admin'])->group(function () {
                
                    //Route::get("admin/index", "ProfileController@showAdminDashboard");
                    
                //Post Pets CRUD Functionaly using Resource Controller......................
                        Route::Resource("pet", "PetController");

                //Sales details Functionaly using OrderDetail Controller......................
                        Route::get("order/panding", "OrderDetailController@pandingOrder");
                        Route::get("order/list", "OrderDetailController@listOrder");
                        Route::post("order/complete", "OrderDetailController@completeOrder");

                //Post Product CRUD Functionaly using Resource Controller......................
                        Route::Resource("product", "ProductController");

                    //Post Blog CRUD Functionaly using Resource Controller......................
                        Route::Resource("blogPost", "BlogPostsController");
                        Route::post("search/blog", "BlogPostsController@search");

                    //Trash Blogs Controller......................
                        Route::get("trash/{id}", "trashController@destroy");
                        Route::get("trashed", "trashController@trashed");
                        Route::get("restore/{id}", "trashController@restore");
                        Route::get("killed/{id}", "trashController@kill");
                    //only admin can access..................................  
                        Route::get("show/panding", "adminController@showPanding");
                        Route::get("active/{id}", "adminController@active");
                    //trashed pets by only admin......................................
                        Route::get("trash/{id}/pet", "trashController@destroyPet");
                        Route::get("trashed/pet", "trashController@trashedPet");
                        Route::get("restore/{id}/pet", "trashController@restorePet");
                        Route::get("killed/{id}/pet", "trashController@killPet");
                        //trashed pets by only admin......................................
                            Route::get("trash/{id}/product", "trashController@destroyProduct");
                            Route::get("trashed/product", "trashController@trashedProduct");
                            Route::get("restore/{id}/product", "trashController@restoreProduct");
                            Route::get("killed/{id}/product", "trashController@killProduct");

                    //Catageries CRUD FunctiConaly Controller only for admin......................
                        Route::get("category/show", "CategoriesController@index");
                        Route::post("create/pet/category", "CategoriesController@store");
                        Route::get("edit/pet/category/{category_id}", "CategoriesController@edit");
                        Route::post("update/pet/category/{category_id}", "CategoriesController@update");
                        Route::get("delete/pet/category/{category_id}", "CategoriesController@delete");

                    //Admin Profile...............................................................
                        // Route("Admin Profile", "ProfileController");
                        Route::get("profile/show", "adminController@showAdminProfile");
                        Route::get("dashboard/show", "adminController@showAdminDashboard");
                        Route::get("profile/setting", "adminController@settingAdminProfile");

                        Route::Post("profile/update", "ProfileController@updateProfile");
                        Route::Post("profile/save", "ProfileController@saveProfile");
                        Route::Post("profile/image/upload", "ProfileController@uloadProfileImage");
                        Route::Post("account/password/change", "ProfileController@changeUserPassword");
                        
                    //User Details Show/Block Work...............................................
                        Route::get("make/doctor/{user_id}", "adminController@makeDoctor");
                        Route::get("remove/doctor/{user_id}", "adminController@removeDoctor");
                        Route::get("users/table", "adminController@showUserDetails");
                        Route::post("user/blocked", "adminController@blockedUser");
                        Route::post("user/unblocked", "adminController@unBlockedUser");
                        Route::post("search/user", "adminController@search");

                    //Top Header setting Work........................................................
                        Route::get("topHeader/show", "DynamicHomepageController@showTopHeader");
                        Route::post("topHeader/update", "DynamicHomepageController@updatetopHeader");

                    //Slide Edit Work.............................................................
                        Route::get("slider/show", "DynamicHomepageController@showUploadSlider");
                        Route::get('slider/edit/{slider_id}', 'DynamicHomepageController@editSlide');
                        Route::post("slider/update", "DynamicHomepageController@updateSliderDetails");


});