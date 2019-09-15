<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\BlogPost;
use Auth;

class trashController extends Controller
{

//Trashed a blog post..................................... 
    public function destroy($id)
    {
        $plog_post = BlogPost::find($id); 

        $plog_post->delete();

        Session::flash('success', 'The post was just trashed.');

        return redirect()->back();
    }
//Show Trashed  blog for admin..................................... 
    public function trashed() 
    {
        $trashed = BlogPost::onlyTrashed()->where('user_id', Auth::user()->id)->get();
        
        return view('admin/blog_post/trashed')->with('trashed', $trashed)
                                              ->with('authUser', Auth::user()); 
    }

//Show Trashed  blog for User..................................... 
    public function trashedUser() 
    {
        $trashed = BlogPost::onlyTrashed()->where('user_id', Auth::user()->id)->get();
        
        return view('user/trashed')->with('trashed', $trashed)
                                              ->with('user', Auth::user()); 
    }
//Permanently Delete Trashed post..................................... 
    public function kill($id)
    {
        $trashed = BlogPost::withTrashed()->where('id', $id)->first();
        
        $trashed->forceDelete();

        Session::flash('success', 'Blog Deleted Permanently.');

        return redirect()->back();
    }
// Resore Trashed post..................................... 
    public function restore($id)
    {
        $trashed = BlogPost::withTrashed()->where('id', $id)->first();

        $trashed->restore();

        Session::flash('success', 'Post Restored Successfully.');

        return redirect()->back()->with('authUser', Auth::user()); 
    }



}
