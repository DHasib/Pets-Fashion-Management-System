<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\DynamicLinks;
use Validator;
use Auth;
use Session;

class BookController extends Controller
{
    //to show add books form.............................................
    public function index(){
        
        $authUser = Auth::user(); 
        return view('admin/books/add_book')->with('authUser', $authUser);
    }

    //to store Books....................................................
    public function store(Request $request)
    {

        $authUser = Auth::user(); 
        $validate_data =  Validator::make($request->all(),[

            "title"             =>"required|string|min:4|max:30", 
            "image"             =>"required|image|mimes:jpeg,jpg",
            "books"             =>"required|mimes:pdf",           
          
        ])->validate();

           $image = $request->image;
           $image_new_name      =  $image->getClientOriginalName();
           $image->move('images/uploads/books/images', $image_new_name);

           $books = $request->books;
           $books_new_name      =  $books->getClientOriginalName();
           $books->move('images/uploads/books/pdf', $books_new_name);
           

          $book_read  =  Book::create([
              'title'           => $request->title,
              'image'      => 'images/uploads/books/images/'.  $image_new_name,
              'books'           =>  'images/uploads/books/pdf/'.  $books_new_name,
           ]);
           
                   session::flash("success", "Sucessfully Add a Book");
                   return redirect()->back()->with('authUser', $authUser);
    }



//to Show all the book list fro admin..............................................
    public function list(){
            
        $books = Book::all();
        $authUser = Auth::user(); 
        
        return view('admin/books/book_list')->with('books', $books)
                                            ->with('authUser', $authUser);

    }


    //Search books by title....................................................................................................
    protected function search(Request $request)
    {
        $validate_data =  Validator::make($request->all(),[

            'search'  => "required|string", 

        ])->validate();

          $authUser = Auth::user();
            $search = $request->search;

            if ($search == NULL) 
            {
            $books= Book::all();
            return view("admin/books/book_list", compact("books", "authUser")); 
            } 
            else 
            {
                $books = Book::where('title','LIKE', '%'.$search.'%')
                                         ->get(); 

                        return view("admin/books/book_list", compact("books", "authUser"));  
            }
    }




    //to Show all the book list for user..............................................
    public function readBooks(){
            
        $books = Book::paginate(9);
        $user = Auth::user(); 
        
        return view('user/read_books')->with('books', $books)
                                      ->with('user', $user)
                                      ->with('link',   DynamicLinks::all());

    }

}
