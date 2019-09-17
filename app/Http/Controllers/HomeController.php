<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicHomepage;
use App\DynamicLinks;
use App\BlogPost;
use App\Pet;
use App\User;
use App\Category;
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
        return view('html/index', compact('sdata','link'));

    }



//Latest Blog Show................................................................................................................................
    public function blog()
    {
           //$ch = BlogPost::orderBy('created_at', 'desc')->get()->where('status',0)->first();
          // DD($ch);

        return view("blogs")->with('link',        DynamicLinks::all())
                            ->with('categories',  Category::all())
                            ->with('first_post',  BlogPost::orderBy('created_at', 'desc')->get()->where('status',0)->first())
                            ->with('second_post', BlogPost::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->where('status',0)->first())
                            ->with('third_post',  BlogPost::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->where('status',0)->first())
                            ->with('dog',         Category::find(1))
                            ->with('cat',         Category::find(2))
                            ->with('birds',       Category::find(3))
                            ->with('rabbit',      Category::find(4));
    }
    

//Selected Blog Post Details Show............................................................................................
    public function singleBlog($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();

        $next_id = BlogPost::where('id', '>', $post->id)->min('id');
        $prev_id = BlogPost::where('id', '<', $post->id)->max('id');

        return view('selected_blog')->with('post', $post)
                             ->with('title', $post->title)
                             ->with('link', DynamicLinks::all())
                             ->with('categories', Category::take(5)->get())
                             ->with('next', BlogPost::find($next_id))
                             ->with('prev', BlogPost::find($prev_id));
    }
 
//Category wise Blog  Show..........................................................................................................
    public function blogCategory($id)
    {
        $category = Category::find($id);

        return view('category_blog')->with('category', $category)
                               ->with('title', $category->name)
                               ->with('link', DynamicLinks::all()) 
                               ->with('categories', Category::all());
    }

//All pets List Show..............................................................................................................
    public function petsIndex()
    {
            return view("shop/pets/index")->with('link',        DynamicLinks::all())
                                          ->with('categories',  Category::all())
                                          ->with('pets',        Pet::paginate(9));
    }
//Selected Pets Details Show .......................................................................................................
    public function aboutPet($slug)
    {
       $pet = Pet::where('slug', $slug)->first();

        $next_id = Pet::where('id', '>', $pet->id)->min('id');
        $prev_id = Pet::where('id', '<', $pet->id)->max('id');

        return view('shop/pets/about')->with('pet', $pet)
                                      ->with('title', $pet->title)
                                      ->with('link', DynamicLinks::all())
                                      ->with('categories', Category::take(5)->get())
                                      ->with('next', Pet::find($next_id))
                                      ->with('prev', Pet::find($prev_id));
    }
//Category-wise Pets  Show .....................................................................................................
    public function petsCategory($id)
    {
        $category = Category::find($id);

        return view("shop/pets/category_pets")->with('category', $category)
                                                ->with('title', $category->name)
                                                ->with('link', DynamicLinks::all()) 
                                                ->with('categories', Category::all());
    }

  //Pets Search By anyone using title...........................................................................................................
  protected function searchPets(Request $request)
  {
      $categories = Category::all();
      $link = DynamicLinks::all();

      $validate_data =  Validator::make($request->all(),[

          'search_pets'  => "required|string", 

      ])->validate();

          $search_pets = $request->search_pets;

          if ($search_pets == NULL) 
          {
          $pets = Pet::paginate(2);
          return view("shop/pets/index", compact("pets","categories","link")); 
          } 
          else 
          {
              $pets = Pet::where('title','LIKE', '%'.$search_pets.'%')
                              ->paginate(9);

                      return view("shop/pets/index", compact("pets","categories","link"));  
          }
  }





    public function pet_products(){
        $link = DynamicLinks::all();
        return view("html.pet_products", compact('link'));
    }

    public function calculate_pet_keeping_cost(){
        $link = DynamicLinks::all();
        return view("html.calculate_pet_keeping_cost", compact('link'));
    }
    public function doctor_support(){
        $link = DynamicLinks::all();
        return view("html.doctor_support", compact('link'));
    }

    public function contact_us(){
        $link = DynamicLinks::all();
        return view("html.contact_us" , compact('link'));
    }
    public function cart(){
        $link = DynamicLinks::all();
        return view("html.cart" , compact('link'));
    }
    public function check_out(){
        $link = DynamicLinks::all();
        return view("html.check_out" , compact('link'));// DUE.............
    }
    public function user_profile(){
        $link = DynamicLinks::all();
        return view("html.user_profile" , compact('link'));// DUE.............
    }
    public function admin_pannel(){
        $link = DynamicLinks::all();
        return view("html.admin_pannel" , compact('link'));// DUE.............
    }
    public function items_details(){
        $link = DynamicLinks::all();
        return view("html.items_details" , compact('link'));
    }
    public function doctor_management(){
        $link = DynamicLinks::all();
        return view("html.doctor_management", compact('link'));// DUE.............
    }
    public function page_not_found (){
        $link = DynamicLinks::all();
        return view("html.page_not_found", compact('link'));// DUE.............
    }
}
