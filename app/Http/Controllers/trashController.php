<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\BlogPost;
use App\Pet;
use Auth;


class trashController extends Controller
{

 //========================================================================================================================================================================================================  
 
//......................................................Start Trash For Blog Post by both user and admin...................................................................................................................
 
// ========================================================================================================================================================================================================  

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
//Permanently Delete Trashed Blog Post..................................... 
    public function kill($id)
    {
        $trashed = BlogPost::withTrashed()->where('id', $id)->first();
        
        $trashed->forceDelete();

        Session::flash('success', 'Blog Deleted Permanently.');

        return redirect()->back();
    }
//Resore Trashed Blog Post..................................... 
    public function restore($id)
    {
        $trashed = BlogPost::withTrashed()->where('id', $id)->first();

        $trashed->restore();

        Session::flash('success', 'Post Restored Successfully.');

        return redirect()->back()->with('authUser', Auth::user()); 
    }



 //========================================================================================================================================================================================================  
 
//......................................................Start Trash For Items (pets and Products) only by Admin...................................................................................................................
 
// ========================================================================================================================================================================================================  
//Trashed a Pet ..................................... 
public function destroypet($id)
{
    $pet = Pet::find($id); 

    $pet->delete();

    Session::flash('success', 'The Sell Pet was just trashed.');

    return redirect()->back();
}
//Show Trashed  Pets for admin..................................... 
public function trashedPet() 
{
    $trashed = Pet::onlyTrashed()->get();
    
    return view('admin/pets/trashed')->with('trashed', $trashed)
                                          ->with('authUser', Auth::user()); 
}

//Permanently Delete Trashed for Pets..................................... 
public function killPet($id)
{
    $trashed = Pet::withTrashed()->where('id', $id)->first();
    
    $trashed->forceDelete();

    Session::flash('success', 'Pet Deleted Permanently.');

    return redirect()->back();
}
//Resore Trashed for Pets ..................................... 
public function restorePet($id)
{
    $trashed = Pet::withTrashed()->where('id', $id)->first();

    $trashed->restore();

    Session::flash('success', 'Pet Restored Successfully.');

    return redirect()->back()->with('authUser', Auth::user()); 
}





}