<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicHomepage;
use App\DynamicLinks;
use App\BlogPost;
use App\Pet;
use App\Product;
use App\User;
use Auth;
use App\Category;
use App\LikeBlog;

use App\BlogComment;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sdata = DynamicHomepage::all();
        $link = DynamicLinks::all();
        return view('public/html/index')->with('sdata',              $sdata)
                                        ->with('link',               $link)
                                        ->with('pet_collection',     Pet::orderBy('created_at', 'desc')->take(4)->get())
                                        ->with('product_collection', Product::orderBy('created_at', 'desc')->take(4)->get())
                                        ->with('discountPet',        Pet::orderBy('created_at', 'desc')->get()->where('discount',!null))
                                        ->with('discountProduct',    Product::orderBy('created_at', 'desc')->get()->where('discount',!null))
                                        ->with('blogs',              BlogPost::orderBy('created_at', 'desc')->get()->where('status',0)->take(3));
    } 

//==================================================================================================================================================================================================================

              //.......................................................Start Blogs Show Publicly Function..................................................................................................................

//==================================================================================================================================================================================================================

                     //Latest Blog Show................................................................................................................................
                          public function blog()
                            {

                                return view("public/blogs/index")->with('link',       DynamicLinks::all())
                                                                ->with('categories',  Category::all())
                                                                ->with('first_post',  BlogPost::orderBy('created_at', 'desc')->get()->where('status',0)->first())
                                                                ->with('second_post', BlogPost::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->where('status',0)->first())
                                                                ->with('third_post',  BlogPost::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->where('status',0)->first())
                                                                ->with('dog',         Category::find(1))
                                                                ->with('cat',         Category::find(2))
                                                                ->with('birds',       Category::find(3))
                                                                ->with('rabbit',      Category::find(4))
                                                                ->with('discountPet',      Pet::all())
                                                                ->with('discountProduct',  Product::all())
                                                                ->with('LikeBlog',         LikeBlog::all())
                                                                ->with('BlogComment',        BlogComment::all());
                            }
                            
                          
                    //Selected Blog Post Details Show............................................................................................
                            public function singleBlog($slug)
                            {
                                $post = BlogPost::where('slug', $slug)->first();

                                $next_id = BlogPost::where('id', '>', $post->id)->min('id');
                                $prev_id = BlogPost::where('id', '<', $post->id)->max('id');

                                return view('public/blogs/about')->with('post',            $post)
                                                                ->with('title',            $post->title)
                                                                ->with('link',             DynamicLinks::all())
                                                                ->with('categories',       Category::take(5)->get())
                                                                ->with('next',             BlogPost::find($next_id))
                                                                ->with('prev',             BlogPost::find($prev_id))
                                                                ->with('discountPet',      Pet::all())
                                                                ->with('discountProduct',  Product::all())
                                                                ->with('comments',         BlogComment::orderBy('created_at', 'desc')->get()->where('blog_id', $post->id))
                                                                ->with('authUser',         Auth::user())
                                                                ->with('LikeBlog',         LikeBlog::where('blog_id', $post->id)->get())
                                                                ->with('BlogComment',        BlogComment::where('blog_id', $post->id)->get());
                            }
                        
                    //Category wise Blog  Show..........................................................................................................
                            public function blogCategory($id)
                            {
                                $category = Category::find($id);

                                return view('public/blogs/category_blog')->with('category',   $category)
                                                            ->with('title',      $category->name)
                                                            ->with('link',       DynamicLinks::all()) 
                                                            ->with('categories', Category::all())
                                                            ->with('discountPet',      Pet::all())
                                                            ->with('discountProduct',  Product::all())
                                                            ->with('LikeBlog',         LikeBlog::all())
                                                            ->with('BlogComment',        BlogComment::all());
                            }
                            
                            

//==================================================================================================================================================================================================================

              //.......................................................Start Pets Show Publicly Function..................................................................................................................

//==================================================================================================================================================================================================================


                    //All pets List Show..............................................................................................................
                            public function petsIndex()
                            {
                                    return view("public/shop/pets/index")->with('link', DynamicLinks::all())
                                                                  ->with('categories',  Category::all())
                                                                  ->with('pets',        Pet::orderBy('created_at', 'desc')->paginate(9))
                                                                  ->with('discountPet', Pet::all())
                                                                  ->with('discountProduct',  Product::all());
                            }
                    //Selected Pets Details Show .......................................................................................................
                            public function aboutPet($slug)
                            {
                            $pet = Pet::where('slug', $slug)->first();

                                $next_id = Pet::where('id', '>', $pet->id)->min('id');
                                $prev_id = Pet::where('id', '<', $pet->id)->max('id');

                                return view('public/shop/pets/about')->with('pet',         $pet)
                                                              ->with('title',       $pet->title)
                                                              ->with('link',        DynamicLinks::all())
                                                              ->with('categories',  Category::take(5)->get())
                                                              ->with('next',        Pet::find($next_id))
                                                              ->with('prev',        Pet::find($prev_id))
                                                              ->with('discountPet', Pet::all())
                                                              ->with('discountProduct',  Product::all());
                            }
                     //Category-wise Pets  Show .....................................................................................................
                            public function petsCategory($id)
                            {
                                $category = Category::find($id);

                                return view("public/shop/pets/category_pets")->with('category',  $category)
                                                                            ->with('title',      $category->name)
                                                                            ->with('link',       DynamicLinks::all()) 
                                                                            ->with('categories', Category::all())
                                                                            ->with('discountPet', Pet::all())
                                                                            ->with('discountProduct',  Product::all());
                            }

                  //Pets Search By anyone using title...........................................................................................................
                        protected function searchPets(Request $request)
                        {
                            $categories = Category::all();
                            $link = DynamicLinks::all();
                           $discountPet = Pet::all();
                           $discountProduct = Product::all();

                            $validate_data =  Validator::make($request->all(),[

                                'search_pets'  => "required|string", 

                            ])->validate();

                                $search_pets = $request->search_pets;

                                if ($search_pets == NULL) 
                                {
                                $pets = Pet::paginate(2);
                                return view("public/shop/pets/index", compact("pets","categories","link","discountProduct","discountPet")); 
                                } 
                                else 
                                {
                                    $pets = Pet::where('title','LIKE', '%'.$search_pets.'%')
                                                    ->paginate(9);

                                            return view("public/shop/pets/index", compact("pets","discountProduct","categories","link","discountPet"));  
                                }
                        }


//==================================================================================================================================================================================================================

              //.......................................................Start Products shoW Publicly Function..................................................................................................................

//==================================================================================================================================================================================================================

                //All product List Show..............................................................................................................
                        public function productIndex()
                        {
                                return view("public/shop/pet_products/index")->with('link',      DynamicLinks::all())
                                                                      ->with('categories',       Category::all())
                                                                      ->with('products',         Product::orderBy('created_at', 'desc')->paginate(9))
                                                                      ->with('discountProduct',  Product::all())
                                                                      ->with('discountPet',       Pet::all());
                        }
                //Selected product Details Show .......................................................................................................
                        public function aboutProduct($slug)
                        {
                        $product = Product::where('slug', $slug)->first();

                            $next_id = Product::where('id', '>', $product->id)->min('id');
                            $prev_id = Product::where('id', '<', $product->id)->max('id');

                            return view('public/shop/pet_products/about')->with('product',   $product)
                                                                  ->with('title',            $product->title)
                                                                  ->with('link',             DynamicLinks::all())
                                                                  ->with('categories',       Category::take(5)->get())
                                                                  ->with('next',             Product::find($next_id))
                                                                  ->with('prev',             Product::find($prev_id))
                                                                  ->with('discountProduct',  Product::all())
                                                                  ->with('discountPet',      Pet::all());
                        } 
                //Category-wise product  Show .....................................................................................................
                        public function productsCategory($id)
                        {
                            $category = Category::find($id);

                            return view("public/shop/pet_products/category_products")->with('category',  $category)
                                                                              ->with('title',            $category->name)
                                                                              ->with('link',             DynamicLinks::all()) 
                                                                              ->with('categories',       Category::all())
                                                                              ->with('discountProduct',  Product::all())
                                                                              ->with('discountPet',      Pet::all());
                        }

                //product Search By anyone using title...........................................................................................................
                        protected function searchProducts(Request $request)
                        {
                        $categories = Category::all();
                        $link = DynamicLinks::all();
                        $discountProduct = Product::all();
                        $discountPet = Pet::all();

                        $validate_data =  Validator::make($request->all(),[

                            'search_products'  => "required|string", 

                        ])->validate();

                            $search_products = $request->search_products;

                            if ($search_products == NULL) 
                            {
                            $products = Product::paginate(2);
                            return view("public/shop/pet_products/index", compact("products","discountPet","categories","link","discountProduct")); 
                            } 
                            else 
                            {
                                $products = Product::where('title','LIKE', '%'.$search_products.'%')
                                                ->paginate(9);

                                        return view("public/shop/pet_products/index", compact("products","discountPet","categories","link","discountProduct"));  
                            }
                        }

//==================================================================================================================================================================================================================

              //.......................................................Start Pet Keeping cost calculator Function..................................................................................................................

//==================================================================================================================================================================================================================

              //Pet Keeping cost index.................................................
                    public function calculate_pet_keeping_cost()
                    {
                     // DD($request->value);
                        return view("public/html.calculate_pet_keeping_cost") ->with('link',           DynamicLinks::all()) 
                                                                              ->with('categories',       Category::all())
                                                                              ->with('discountProduct',  Product::all())
                                                                              ->with('discountPet',      Pet::all());
                    }

                    public function test(Request $request)
                    {
                        /*if($request->get('name') == 'dog' ){

                        }*/
                        $id = $request->get('name');
                      //DD( $id);
                      return response()->json(['success'=>'Data is successfully added'.$id]);
                       
                    }







    public function doctor_support(){
        $link = DynamicLinks::all();
        return view("public/html.doctor_support", compact('link'));
    }

    public function contact_us(){
        $link = DynamicLinks::all();
        return view("public/html.contact_us" , compact('link'));
    }
   
    public function page_not_found (){
        $link = DynamicLinks::all();
        return view("public/html.page_not_found", compact('link'));// DUE.............
    }
}
