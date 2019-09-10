<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //2nd way to fetch and send data...................
             return view('admin/categories/crud_categories')->with('categories', Category::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //2nd way to validate Requested Datta.................
            //$this->validate($request, [
               
          //  ]);

            $validate_data =  Validator::make($request->all(),[ 
                'categories_name' => 'required|alpha|min:3|max:20|unique:categories'
               ])->validate();


            $category = new Category;

            $category->categories_name = $request->categories_name;

           $is_saved = $category->save();

            if ($is_saved){
                session()->flash("message", "Sucessfully Added Pet Category");
                return view("admin/categories/crud_categories")->with('categories', Category::all());
            }else{
                session()->flash("error", "Failed to Upload Slider");
             return view("admin/categories/crud_categories")->with('categories', Category::all());
            }

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
        $categories = Category::all();
        $category = Category::find($id);

        return view('admin/categories/crud_categories')->with('category', $category)
                                                       ->with('categories', $categories);
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
        //
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
}
