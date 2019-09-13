<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\BlogPost;
class trashController extends Controller
{
    public function destroy($id)
    {
        $plog_post = BlogPost::find($id);

        $plog_post->delete();

        Session::flash('success', 'The post was just trashed.');

        return redirect()->back();
    }

    public function trashed() 
    {
        $trashed = BlogPost::onlyTrashed()->get();
        
        return view('admin/blog_post/trashed')->with('trashed', $trashed);
    }

    public function kill($id)
    {
        $trashed = BlogPost::withTrashed()->where('id', $id)->first();
        
        $trashed->forceDelete();

        Session::flash('success', 'Blog Deleted Permanently.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $trashed = BlogPost::withTrashed()->where('id', $id)->first();

        $trashed->restore();

        Session::flash('success', 'Post Restored Successfully.');

        return view ('admin/blog_post/index');
    }

  //Panding Blogs list.............................................
  
  public function showPanding()
  {

    $panding = BlogPost::all();

    return view('admin/blog_post/panding_blog', compact('panding'));
                                 

  }



//Astive user Blog.............................................
    public function active($id)
    {
        $status = BlogPost::find($id);

        //DD( $status->status);
       if($status->status == 1){
   
         $status->status = 0;
         $status->save();

        Session::flash('success', 'Post has been Active Successfully.');

        return redirect()->back();

       }
    }


}
