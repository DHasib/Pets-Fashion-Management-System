<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        //2nd way to fetch and send data...................
             return view('admin/categories/crud_categories')->with('categories', Category::all());

    }


    protected function store(Request $request)
    {
       //DD($request->all());

        $validate_data =  Validator::make($request->all(),[

            "name"   => "required|alpha|min:3|max:20|unique:categories",
          
           ])->validate();
           
       
        $category = new Category;

        $category->name = $request->name;

        $is_saved = $category->save();

        if ($is_saved){
            session()->flash("success", "Sucessfully Added Pet Category");
            return view("admin/categories/crud_categories")->with('categories', Category::all());
        }else{
            session()->flash("error", "Failed to Upload Slider");
            return view("admin/categories/crud_categories")->with('categories', Category::all());
        }

    }

    protected function edit($id)
    {
 
        return view('admin/categories/crud_categories')->with('category', Category::find($id))
                                                       ->with('categories', Category::all());
    }

    protected function update(Request $request, $id)
    {

            $validate_data =  Validator::make($request->all(),[ 
                'name' => 'required|alpha|min:3|max:20|unique:categories'
            ])->validate();

            $category = Category::find($id);

            $category->name = $request->name;

        $is_saved = $category->save();

            if ($is_saved){
                session()->flash("success", "Sucessfully Update Pet Category");
                return view("admin/categories/crud_categories")->with('categories', Category::all());
            }else{
                session()->flash("error", "Failed to Update Pet Category");
            return view("admin/categories/crud_categories")->with('categories', Category::all());
            }

    }

    protected function delete($id)
    {
        $category = Category::find($id);

        if($category){

        /* foreach($category->posts as $post){
                $post->forceDelete();
            }*/

            $category->delete();

            Session::flash('success', 'You succesfully deleted the category.');

            return view("admin/categories/crud_categories")->with('categories', Category::all());
       }
       else{
        session()->flash("error", "Please select First Category to Delete");
        return view("admin/categories/crud_categories")->with('categories', Category::all());
       }
    
    }



}
