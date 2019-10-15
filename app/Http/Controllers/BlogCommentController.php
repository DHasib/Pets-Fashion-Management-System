<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\BlogPost;
use App\User;
use App\BlogComment;

use Validator;
use Session;

class BlogCommentController extends Controller
{
    //store Blogs Comment..........................................................................................................
       public function blogComment(Request $request)
       {
     
        $validate_data =  Validator::make($request->all(),[

            "comment"              =>"required|string|min:4", 
            "user_id"              =>"required|integer",
            "blog_id"              =>"required|integer",
           ])->validate();

          $Blog_Comment  =  BlogComment::create([
              'user_id'     => $request->user_id,
              'blog_id'     => $request->blog_id,
              'comment'     => $request->comment,
            
           ]);
           
            session::flash("success", "Sucessfully Post a Comment");
            return redirect()->back();
       }

    //Delete User Comment From Blog.............................................................................................
       public function deleteComment($id){

        $Comment = BlogComment::find($id);

          if($Comment){
              if($Comment->user_id == Auth::id()){

                $Comment->delete();

                Session::flash('success', ' succesfully deleted the Comment.');
    
                return redirect()->back();
              }
              else{
                Session::flash('error', ' You do not have permission to Deleted other user Comment.');
                return redirect()->back();
              }
          }else{

            Session::flash('error', ' Invailed Order.');

            return redirect()->back();
         }
          
     


       }
}
