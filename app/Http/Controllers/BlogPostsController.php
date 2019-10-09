<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use Session;
use App\BlogPost;
use App\Category;

use App\DynamicLinks;

class BlogPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Show All Blog Details For Admin......................................
    public function index()
    {
       
        return view('admin/blog_post/index')->with('posts', BlogPost::all())
                                            ->with('authUser',  Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        //$tags = Tag::all();

        $authUser = Auth::user();
        if($categories->count() == 0)
        {
            Session::flash('info', 'Empty Category!! You must have some categories before attempting to create a post.');

            return redirect()->back();
        }

        return view ('admin/blog_post/create', compact('categories', "authUser"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validate_data =  Validator::make($request->all(),[

            "blog_title"              =>"required|string|min:4|max:30", 
            "category_id"             =>"required|integer",
            "blog_content"            =>"required|string|min:50",
            "blog_image"              =>"required|image|mimes:jpeg,jpg|max:2050",
          
           ],[
            "blog_image.image"       =>"File Must be a Image",
            "blog_image.mimes"       =>"File only accept jpeg,jpg formate",
            "blog_image.max"         =>"Image can't be larger then 1 MB ",
          ])->validate();

           $blog_image = $request->blog_image;
           $blog_image_new_name      =  $blog_image->getClientOriginalName();
           $blog_image->move('images/uploads/blog_img', $blog_image_new_name);
           

          $Blog_Post  =  BlogPost::create([
              'category_id'    => $request->category_id,
              'blog_title'     => $request->blog_title,
              'blog_content'   => $request->blog_content,
              'blog_image'     => 'images/uploads/blog_img/'.  $blog_image_new_name,
              'slug'           =>  str_slug($request->blog_title),
              'user_id'        => Auth::id()
           ]);
           
                   session::flash("success", "Sucessfully Post a Blog");
                   return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $blog_post = BlogPost::find($id);

        return view('admin/blog_post/edit')->with('blog_post', $blog_post)
                                           ->with('categories', Category::all())
                                           ->with('authUser',  Auth::user());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validate_data =  Validator::make($request->all(),[

            "blog_title"              =>"required|string|min:4|max:30", 
            "category_id"             =>"required|integer",
            "blog_content"            =>"required|string|min:50",
            "blog_image"              =>"image|mimes:jpeg,jpg|max:2050",
          
        ],[
            "blog_image.image"       =>"File Must be a Image",
            "blog_image.mimes"       =>"File only accept jpeg,jpg formate",
            "blog_image.max"         =>"Image can't be larger then 1 MB ",
          ])->validate();


           $Blog_Post  =  BlogPost::find($id);
           if($request->hasFile('blog_image'))
           {
                $blog_image = $request->blog_image;
                $blog_image_new_name      = $blog_image->getClientOriginalName();
                $blog_image->move('images/uploads/blog_img', $blog_image_new_name);
                $Blog_Post->blog_image     = 'images/uploads/blog_img/'.  $blog_image_new_name;
           }

              $Blog_Post->category_id    = $request->category_id;
              $Blog_Post->blog_title     = $request->blog_title;
              $Blog_Post->blog_content   = $request->blog_content;
             
              
              $is_saved = $Blog_Post->save();

              if ($is_saved){
                session::flash("success", "Sucessfully UPDATE a Blog");
                  return redirect()->back();
              }else{
                session::flash("success", "Failed to UPDATE a Blog");
                  return redirect()->back();
              }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //
    }


//Search User by admin....................................................................................................
       protected function search(Request $request)
       {
           $validate_data =  Validator::make($request->all(),[
   
               'search_user'  => "required|string", 

           ])->validate();

             $authUser = Auth::user();
               $user_search = $request->search_user;

               if ($user_search == NULL) 
               {
               $posts= BlogPost::all();
               return view("admin/blog_post/index", compact("posts", "authUser")); 
               } 
               else 
               {
                   $posts = BlogPost::where('blog_title','LIKE', '%'.$user_search.'%')
                                            ->get(); 

                           return view("admin/blog_post/index", compact("posts", "authUser"));  
               }
       }




    //For Only User Show Their Edit Blog Form..............................................................................................
            public function userBlogEdit($id)
            {

                $blog_post = BlogPost::find($id);

                return view('user/edit')->with('blog_post',   $blog_post)
                                        ->with('categories',  Category::all())
                                        ->with('user',        Auth::user())
                                        ->with('link',        DynamicLinks::all());

            }

 //Blog post form show for Only User...................................................................................................
            public function postBlog()
            {

            $categories  =  Category::all();
            $link        =  DynamicLinks::all();

            $user = Auth::user();
            if($categories->count() == 0)
            {
                Session::flash('info', 'Empty Category!! You must have some categories before attempting to create a post.');

                return redirect()->back();
            }

            return view ('user/post', compact('categories', "user","link"));
            
            }


}
