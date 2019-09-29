<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pet;
use App\User;
use Auth;
use App\Category;
use Validator;
use Session;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/shop/pets/index')->with('pets', Pet::all())
                                       ->with('Categories', Category::all())
                                       ->with('authUser',   Auth::user());
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
            Session::flash('info', 'Empty Category!! You must have some categories before attempting to create a Sell Pet.');

            return redirect()->back();
        }

        return view ('admin/shop/pets/create', compact('categories',"authUser"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

       // DD($request->All());
        $validate_data =  Validator::make($request->all(),[

            "title"             =>"required|string|min:10|max:50", 
            "description"       =>"required|string",
            "gender"            =>"required|string",
            "category_id"       =>"required|integer",
            "price"             =>"required|integer",
            "discount"          =>"integer|max:100|min:5",
            "stock"             =>"required|integer|min:1|max:100000",
            "image"             =>"required|image|mimes:jpeg,jpg|max:2050",
           ])->validate();

      //DD($request->gender);
           $image = $request->image;
           $pet_image_new_name      =  $image->getClientOriginalName();
           $image->move('images/uploads/pets_img', $pet_image_new_name);


             $pet  =  Pet::create([
              'title'           =>  $request->title,
              'description'     =>  $request->description,
              'category_id'     =>  $request->category_id,
              'price'           =>  $request->price,
              'stock'           =>  $request->stock,
              'gender'          =>  $request->gender,
              'image'           => 'images/uploads/pets_img/'.  $pet_image_new_name,
              'discount'        =>  $request->discount,
              'slug'            =>  str_slug($request->title),
           ]);
           
                   session::flash("success", "Sucessfully Added Pet for Sell");
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
        $pet = pet::find($id);

        return view('admin/shop/pets/edit')->with('pet', $pet)
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

            "title"             =>"required|string|min:10|max:50", 
            "description"       =>"required|string",
            "gender"            =>"required|string",
            "category_id"       =>"required|integer",
            "discount"          =>"integer|max:100|min:5",
            "price"             =>"required|integer",
            "stock"             =>"required|integer|min:1|max:100000",
            "image"             =>"image|mimes:jpeg,jpg|max:2050",
           ])->validate();

           $pet  =  Pet::find($id);
           if($request->hasFile('image'))
           {
           $pet_img = $request->image;
           $pet_image_new_name      = $pet_img->getClientOriginalName();
           $pet_img->move('images/uploads/pets_img', $pet_image_new_name);
           $pet->image           = 'images/uploads/pets_img/'.  $pet_image_new_name;
           }

              $pet->title           = $request->title;
              $pet->gender          = $request->gender;
              $pet->description     = $request->description;
              $pet->category_id     = $request->category_id;
              $pet->price           = $request->price;
              $pet->stock           = $request->stock;
              $pet->discount        = $request->discount;
              $pet->slug            = str_slug($request->title);
              
              $is_saved = $pet->save();

              if ($is_saved){
                session::flash("success", "Sucessfully UPDATE a Pet Information");
                  return redirect()->back();
              }else{
                session::flash("success", "Failed to UPDATE a Pet Information");
                  return redirect()->back();
              }
           
    }
   //Search Product by admin................................................................................................................................
            protected function search(Request $request)
            {
            
                $validate_data =  Validator::make($request->all(),[

                    'search'  => "required|string", 

                ])->validate();

                    $search = $request->search;

                    if ($search == NULL) 
                    {
                    return view("admin/shop/pets/index")->with('pets',   Pet::all())
                                                        ->with('Categories', Category::all())
                                                        ->with('authUser',   Auth::user());
                    } 
                    else 
                    {
                        $pets = Pet::where('title','LIKE', '%'.$search.'%')
                                        ->get(); 

                                
                        return view('admin/shop/pets/index')->with('pets',    $pets)
                                                            ->with('Categories', Category::all())
                                                            ->with('authUser',   Auth::user());
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
}
