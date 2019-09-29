<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Auth;
use App\Category;
use Validator;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('admin/shop/products/index')->with('products', Product::all())
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
            Session::flash('info', 'Empty Category!! You must have some categories before attempting to create a Sell Product.');

            return redirect()->back();
        }

        return view ('admin/shop/products/create', compact('categories',"authUser"));

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
                "category_id"       =>"required|integer",
                "price"             =>"required|integer",
                "discount"          =>"integer|max:100|min:5",
                "stock"             =>"required|integer|min:1|max:100000",
                "image"             =>"required|image|mimes:jpeg,jpg|max:2050",
            ])->validate();


            $image = $request->image;
            $product_image_new_name      =  $image->getClientOriginalName();
            $image->move('images/uploads/products_img', $product_image_new_name);


                $product  =  Product::create([
                'title'           =>  $request->title,
                'description'     =>  $request->description,
                'category_id'     =>  $request->category_id,
                'price'           =>  $request->price,
                'stock'           =>  $request->stock,
                'image'           => 'images/uploads/products_img/'.  $product_image_new_name,
                'discount'        =>  $request->discount,
                'slug'            =>  str_slug($request->title),
            ]);
            
                    session::flash("success", "Sucessfully Added Products for Sell");
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
        
        $product = Product::find($id);

        return view('admin/shop/products/edit')->with('product', $product)
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
            "category_id"       =>"required|integer",
            "discount"          =>"integer|max:100|min:5",
            "price"             =>"required|integer",
            "stock"             =>"required|integer|min:1|max:100000",
            "image"             =>"image|mimes:jpeg,jpg|max:2050",
           ])->validate();

           $product  =  Product::find($id);

           if($request->hasFile('image'))
           {
           $product_img = $request->image;
           $product_image_new_name      = $product_img->getClientOriginalName();
           $product_img->move('images/uploads/products_img', $product_image_new_name);
           $product->image           = 'images/uploads/products_img/'.  $product_image_new_name;
           }

              $product->title           = $request->title;
              $product->description     = $request->description;
              $product->category_id     = $request->category_id;
              $product->price           = $request->price;
              $product->stock           = $request->stock;
              $product->discount        = $request->discount;
              $product->slug            = str_slug($request->title);
           
              
              $is_saved = $product->save();

              if ($is_saved){
                session::flash("success", "Sucessfully UPDATE a Product Information");
                  return redirect()->back();
              }else{
                session::flash("success", "Failed to UPDATE a Product Information");
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
                    return view("admin/shop/products/index")->with('products',   Product::all())
                                                            ->with('Categories', Category::all())
                                                            ->with('authUser',   Auth::user());
                    } 
                    else 
                    {
                        $products = Product::where('title','LIKE', '%'.$search.'%')
                                        ->get(); 

                               
                        return view('admin/shop/products/index')->with('products',     $products)
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
