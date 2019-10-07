<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BlogPost;
use App\LikeBlog;
use Auth;

class LikeBlogController extends Controller
{
//to insert user like into blog.............................
    public  function blogLike($id){

        LikeBlog::create([
            'blog_id' => $id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }

//to insert user Unlike into blog.............................
    public  function blogUnlike($id){
        
        $like = LikeBlog::where('blog_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        return redirect()->back();

    }
}
