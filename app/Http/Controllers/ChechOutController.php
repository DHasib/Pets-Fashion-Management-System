<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use Session;
use App\Pet;
use App\Product;
use App\DynamicLinks;


use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use App\OrderDetail;
use Carbon\Carbon;
use App\OrderList;
use App\PaymentDetail;
use Stripe\Charge;
use Stripe\Stripe;

class ChechOutController extends Controller
{
    

            public function dk()
            {  
                $test  = DB::table('users')
                            ->join('order_details', 'users.id', '=', 'order_details.user_id')
                            ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                            ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                            ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                            ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email', 'users.id', 'payment_details.created_at')                       

                            ->where('order_lists.type', '=',  'pet')
                            ->where(function ($query) {
                                $query->where('users.id', '=', Auth::user()->id);
                            })
                            ->orderBy('created_at')
                            ->groupBy('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email', 'users.id', 'payment_details.created_at')
                            ->get();    

            /*   $pet_order_details = DB::table('users')
                                ->join('order_details', 'users.id', '=', 'order_details.user_id')
                                ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                                ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                                ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email', 'users.id', 'payment_details.created_at')                       
                                ->where('order_lists.type', '=',  'pet')
                                ->where(function ($query) {
                                    $query->where('users.id', '=', Auth::user()->id);
                                })
                                ->latest('payment_details.created_at', 'desc')
                                //->count()
                                ->get();
                        $kk = 'Date(created_at) = CURDATE()';
                            $dddk = $pet_order_details->where();*/

            $product_order_details = DB::table('users')
                                ->join('order_details', 'users.id', '=', 'order_details.user_id') 
                                ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                                ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                ->join('products', 'order_lists.item_id', '=', 'products.id')
                                ->select('users.name', 'order_lists.type', 'products.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email','users.id', 'payment_details.created_at')       
                                ->where('order_lists.type', '=',  'product')
                                ->where(function ($query) {
                                    $query->where('users.id', '=', Auth::user()->id);
                                })
                                ->latest('users.created_at')
                            // ->unionAll($test);
                                ->get();
                            
                    

                            
        DD(      $test );

                            return view("public/shop/shopping_cart/cart",  compact("pet_order_details"));
            }
              
                   

     //Cart Check Out functionality...............................................................  
            public function cartCheckOut()
            {  
                //Strip Api Key seeting...............................................
                    Stripe::setApiKey("sk_test_E9Vu5aotgU4lL8uuIz3RGOBS00iK7MVdL6");

                        //Strip Chareg create..........................................
                            $charge = Charge::create([
                                'amount'      => Cart::instance('pet')->Total() + Cart::instance('product')->Total(),
                                'currency'    => 'usd',
                                'description' => 'Pets Fashion Online Shop Item sell Test',
                                'source'      => request()->stripeToken
                            ]);

                        //User payment_details store..........................................
                            $payment_details = PaymentDetail::create([
                                'payment_type'       => request()->stripeTokenType,
                                'email'              => request()->stripeEmail,
                                'received_amount'    => $charge->amount,
                                'account_id'         => $charge->id
                            ]);
                    //Pet cart instance data fetch and store using foreach loop...............................
                        foreach(Cart::instance('pet')->content() as $pet){

                            //Cart pet OrderList store..........................................
                                $odrlist = OrderList::create([
                                'quentity'      => $pet->qty,
                                'total_price'   => ($pet->price * $pet->qty),
                                'type'          => 'pet',
                                'item_id'       => $pet->id
                                ]);

                            //To update Pet Stock Quentity after User Order...........
                                $minus = Pet::find($pet->id);
                                $valus = ($minus->stock - $pet->qty);
                                $minus->stock  = $valus;
                                    $minus->save();

                            //list out all athe Pet OrderDetails from one user....................
                                $odrdetails = OrderDetail::create([
                                    'order_list_id'        => $odrlist->id,
                                    'payment_details_id'   => $payment_details->id,
                                    'user_id'              => Auth::user()->id,
                                    ]);
                        }
                    //Product cart instance data fetch and store using foreach loop...............................
                        foreach(Cart::instance('product')->content() as $product){

                            //Cart Product OrderList store..........................................
                                    $odrlist = OrderList::create([
                                    'quentity'      => $product->qty,
                                    'total_price'   => ($product->price * $product->qty),
                                    'type'          => 'product',
                                    'item_id'       => $product->id,
                                    ]);
                            //To update Product Stock Quentity after User Order...........
                                    $minus = Product::find($product->id);
                                    $valus = ($minus->stock - $product->qty);
                                    $minus->stock  = $valus;
                                    $minus->save();
                                    
                            //list out all athe Product OrderDetails from one user....................
                                $odrdetails = OrderDetail::create([
                                    'order_list_id'        => $odrlist->id,
                                    'payment_details_id'   => $payment_details->id,
                                    'user_id'              => Auth::user()->id,
                                    ]);
                        }

                    Cart::instance('pet')->destroy();
                    Cart::instance('product')->destroy();

                    Session::flash('success', 'Purchase successfull. wait for our email and do not forgot to check your Email......');
                    Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessfuly); 
                    return redirect()->back();
                    
            }







}

   /* $pet_order_details = DB::table('users')->orderBy('created_at', 'desc')
                        ->join('order_details', 'users.id', '=', 'order_details.user_id')
                        ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                        ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                        ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                        ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email', 'users.id', 'payment_details.created_at')                       
                        ->where('order_lists.type', '=',  'pet')
                        ->where(function ($query) {
                            $query->where('users.id', '=', Auth::user()->id);
                        })
                        ->get();
                       return view("public/shop/shopping_cart/cart",  compact("pet_order_details"));

       $product_order_details = DB::table('users')->orderBy('created_at', 'desc')
                         ->join('order_details', 'users.id', '=', 'order_details.user_id')
                         ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                         ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                         ->join('products', 'order_lists.item_id', '=', 'products.id')
                         ->select('users.name', 'order_lists.type', 'products.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email','users.id')       
                         ->where('order_lists.type', '=',  'product')
                         ->where(function ($query) {
                            $query->where('users.id', '=', Auth::user()->id);
                        })
                        ->get();

    DD($pet_order_details,  $product_order_details);*/
/*
$order_items = DB::table('users')
                ->join('order_details', 'users.id', '=', 'order_details.user_id')
                ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                ->select('order_lists.type', 'order_lists.item_id' )
                ->where('order_lists.type', '=',  'pet')
                ->get();

                DD($order_items);

$order_details = DB::table('users')
            ->join('order_details', 'users.id', '=', 'order_details.user_id')
            ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
            ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
            ->join('pets', 'order_lists.item_id', '=', 'pets.id')
            ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity',  'order_lists.total_price', 'order_lists.item_id', 'payment_details.received_amount', 'payment_details.email')
            ->select('order_lists.type')
            ->where('order_lists.type', '=',  'pet')
            ->get();

            DD($order_details);

*/
/*
$pet_order_details = DB::table('users')
                        ->join('order_details', 'users.id', '=', 'order_details.user_id')
                        ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                        ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                        ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                        ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email', 'users.id')                       
                        ->where('order_lists.type', '=',  'pet')
                        ->get();

$product_order_details = DB::table('users')
                            ->join('order_details', 'users.id', '=', 'order_details.user_id')
                            ->join('order_lists', 'order_details.order_list_id', '=', 'order_lists.id')
                            ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                            ->join('products', 'order_lists.item_id', '=', 'products.id')
                            ->select('users.name', 'order_lists.type', 'products.title', 'order_lists.quentity',  'order_lists.total_price', 'payment_details.received_amount', 'payment_details.email','users.id')                       
                            ->where('order_lists.type', '=',  'product')
                            ->get();


            $single_user_order_list = DB::table('users')
                                        ->where('users.id', '=', Auth::user()->id)
                                        ->union($pet_order_details)
                                        ->get();


                            DD($single_user_order_list);*/