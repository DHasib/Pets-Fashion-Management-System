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

    Auth::routes();

    Route::get('/', 'HomeController@index');

        //show blog posted user profile......................................................................
            Route::get("selected/user/profile/{id}", "ProfileController@pUserShow");

            //Publicly Blog Show.............................................................................
                    Route::get("blog", "HomeController@blog");
                    Route::get("post/{slug}", "HomeController@singleBlog");
                    Route::get("blog/category/{id}", "HomeController@blogCategory");
                
            //Publicly Pets Show in Shop......................................................................
                    Route::get("pets", "HomeController@petsIndex");
                    Route::get("about/pet/{slug}", "HomeController@aboutPet");
                    Route::get("pets/category/{id}", "HomeController@petsCategory");
                    //Search Pet...............................................
                    Route::post("pets/search", "HomeController@searchPets");

            //Publicly Produstc Show in Shop..................................................................
                    Route::get("products", "HomeController@productIndex");
                    Route::get("about/product/{slug}", "HomeController@aboutProduct");
                    Route::get("products/category/{id}", "HomeController@productsCategory");
                    //Search Product..................................................
                    Route::post("products/search", "HomeController@searchProducts");

            //Publicly Order Items and store into cart and show Cart Order Dettails..........................
                    Route::get("pet/add/cart/{pet_id}", "ShoppingController@petAddToCart");
                    Route::get("product/add/cart/{product_id}", "ShoppingController@productAddToCart");
                    Route::get("shopping/cart", "ShoppingController@cart");
                    Route::get("cart/delete/{id}/{status}", "ShoppingController@cart_delete");
                    Route::get("cart/incr/{rowId}/{id}/{qty}/{status}", "ShoppingController@incr");
                    Route::get("cart/decr/{rowId}/{qty}/{status}", "ShoppingController@decr");


           //Show Pet Keeping Form For Guest USer.............................................................
                   Route::get("pet_keeping_cost", "HomeController@pet_keeping_cost");
           //Contact Us For Show..............................................................................
                   Route::get("contact_us", "HomeController@contact_us");
            //Show doctor Appoinment Forn Into Guest User.....................................................
                   Route::get("doctor_appoinment", "HomeController@doctor_appoinment");
             


//Route group for Registered Users.........................................................................................................................................................................................
//.................................................................................................................................................................................................................
    Route::prefix('user')->middleware(['auth'])->group(function () {

            //to get doctor Appoinment......................................................................
                Route::post("store/appoinment", "DoctorController@storeAppoinment");
                Route::get("doctor/appoinment", "DoctorController@showDoctorAppoinment");
                Route::get("appoinment/cancel/{id}", "DoctorController@cancelAppoinment");
                 

            //Like and unlike a Blog.........................................................................
                Route::get("blog/like/{id}", "LikeBlogController@blogLike");
                Route::get("blog/unlike/{id}", "LikeBlogController@blogUnlike");
            //Comment a blog .................................................................................
                Route::Post("blog/comment", "BlogCommentController@blogComment");
                Route::get("delete/comment/{id}", "BlogCommentController@deleteComment");

                    
            //read book by user..............................................................................
                Route::get("read/books", "BookController@readBooks");

            //User Order Details Show........................................................................
                Route::get("order/details", "OrderDetailController@userOrderDetails");
                
            //Add to cart Checkout must login as a user......................................................  
                Route::post("cart/checkout", "ChechOutController@cartCheckOut");
          
            //User Blog show ................................................................................. 
                Route::get("blog/edit/{id}", "BlogPostsController@userBlogEdit");
                Route::Resource("blogPost", "BlogPostsController");
                Route::get("show/blog", "BlogPostsController@postBlog");
            //User Trashed Blod Details Show..................................................................
                Route::get("trash/{id}", "trashController@destroy");
                Route::get("trashed", "trashController@trashedUser");
                Route::get("restore/{id}", "trashController@restore");
                Route::get("killed/{id}", "trashController@kill");

            //User Profile  Details Show with settings using UserController.....................................
                Route::get("profile/show", "ProfileController@index");
                Route::get("profile/setting", "ProfileController@userProfileSetting");
                    //using ProfileController....................................................................  
                    Route::Post("profile/update", "ProfileController@updateProfile");
                    Route::Post("profile/save", "ProfileController@saveProfile");
                    Route::Post("profile/image/upload", "ProfileController@uloadProfileImage");
                    Route::Post("account/password/change", "ProfileController@changeUserPassword");
                    Route::Post("change/email", "ProfileController@changeEmail");
                    Route::Post("change/phonenumber", "ProfileController@changePhoneNumber");
          

    });

//Route group for Admin Activities.........................................................................................................................................................................................
//.................................................................................................................................................................................................................
     Route::prefix('admin')->middleware(['auth' , 'auth.admin'])->group(function () {
                

                //Books add and sho using Book Controller...................................................
                      Route::get("add/book", "BookController@index");
                      Route::POST("store/book", "BookController@store");
                      Route::get("book/list", "BookController@list");
                      Route::post("search/book", "BookController@search");

                    
                //Post Pets CRUD Functionaly using Resource Controller......................................
                        Route::Resource("pet", "PetController");
                        Route::POST("pet/search", "PetController@search");

                //Order Detail  Functionaly using OrderDetail Controller....................................
                        Route::get("order/panding", "OrderDetailController@pandingOrder");
                        Route::get("order/list", "OrderDetailController@listOrder");
                        Route::post("order/complete", "OrderDetailController@completeOrder");

                    //to shoe Sales report...................................................................
                        Route::get("salse/report", "OrderDetailController@salseReport");
                        Route::get("sales/pdf/convert", "DynamicPDFController@pdf");
                        
                //Post Product CRUD Functionaly using Resource Controller.....................................
                        Route::Resource("product", "ProductController");
                        Route::POST("product/search", "ProductController@search");

                    //Post Blog CRUD Functionaly using Resource Controller....................................
                        Route::Resource("blogPost", "BlogPostsController");
                        Route::post("search/blog", "BlogPostsController@search");

                    //Trash Blogs Controller...................................................................
                        Route::get("trash/{id}", "trashController@destroy");
                        Route::get("trashed", "trashController@trashed");
                        Route::get("restore/{id}", "trashController@restore");
                        Route::get("killed/{id}", "trashController@kill");
                    //only admin can access....................................................................
                        Route::get("show/panding", "adminController@showPanding");
                        Route::get("active/{id}", "adminController@active");
                    //trashed pets by only admin................................................................
                        Route::get("trash/{id}/pet", "trashController@destroyPet");
                        Route::get("trashed/pet", "trashController@trashedPet");
                        Route::get("restore/{id}/pet", "trashController@restorePet");
                        Route::get("killed/{id}/pet", "trashController@killPet");
                        //trashed pets by only admin............................................................
                            Route::get("trash/{id}/product", "trashController@destroyProduct");
                            Route::get("trashed/product", "trashController@trashedProduct");
                            Route::get("restore/{id}/product", "trashController@restoreProduct");
                            Route::get("killed/{id}/product", "trashController@killProduct");

                    //Catageries CRUD FunctiConaly Controller only for admin....................................
                        Route::get("category/show", "CategoriesController@index");
                        Route::post("create/pet/category", "CategoriesController@store");
                        Route::get("edit/pet/category/{category_id}", "CategoriesController@edit");
                        Route::post("update/pet/category/{category_id}", "CategoriesController@update");
                        Route::get("delete/pet/category/{category_id}", "CategoriesController@delete");

                    //Admin Profile..............................................................................
                        Route::get("profile/show", "adminController@showAdminProfile");
                        Route::get("dashboard/show", "adminController@showAdminDashboard");
                        Route::get("profile/setting", "adminController@settingAdminProfile");

                        Route::Post("profile/update", "ProfileController@updateProfile");
                        Route::Post("change/email", "ProfileController@changeEmail");
                        Route::Post("change/phonenumber", "ProfileController@changePhoneNumber");

                        Route::Post("profile/save", "ProfileController@saveProfile");
                        Route::Post("profile/image/upload", "ProfileController@uloadProfileImage");
                        Route::Post("account/password/change", "ProfileController@changeUserPassword");
                        
                    //User Details Show/Block Work...............................................................
                        Route::get("make/doctor/{user_id}", "adminController@makeDoctor");
                        Route::get("remove/doctor/{user_id}", "adminController@removeDoctor");
                        Route::get("users/table", "adminController@showUserDetails");
                        Route::post("user/blocked", "adminController@blockedUser");
                        Route::post("user/unblocked", "adminController@unBlockedUser");
                        Route::post("search/user", "adminController@search");

                    //Top Header setting Work....................................................................
                        Route::get("topHeader/show", "DynamicHomepageController@showTopHeader");
                        Route::post("topHeader/update", "DynamicHomepageController@updatetopHeader");

                    //Slide Edit Work.............................................................................
                        Route::get("slider/show", "DynamicHomepageController@showUploadSlider");
                        Route::get('slider/edit/{slider_id}', 'DynamicHomepageController@editSlide');
                        Route::post("slider/update", "DynamicHomepageController@updateSliderDetails");


});


Route::prefix('doctor')->middleware(['auth' , 'auth.doctor'])->group(function () {

        //User Get Doctoe Appoinment..........................................................................
        Route::get("appoinment/show", "DoctorController@showDoctorAppoinment");
        // Doctoe Mark User Appoinment as complete to visiited................................................
        Route::get("visited/{id}", "DoctorController@markAsVisited");
        Route::get("appoinment/cancel/{id}", "DoctorController@cancelAppoinment");

});