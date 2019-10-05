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
use App\OrderList;
use App\PaymentDetail;
use Stripe\Charge;
use Stripe\Stripe;

class ChechOutController extends Controller
{
    
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
                                'item_id'       => $pet->id,
                                'user_id'       => Auth::user()->id,
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
                                    'user_id'       => Auth::user()->id,
                                    ]);
                            //To update Product Stock Quentity after User Order...........
                                    $minus = Product::find($product->id);
                                    $valus = ($minus->stock - $product->qty);
                                    $minus->stock  = $valus;
                                    $minus->save();
                                    
                            //list out all athe Product OrderDetails from one user....................
                                $odrdetails = OrderDetail::create([
                                    'order_list_id'        => $odrlist->id,  
                                    'payment_details_id'   => $payment_details->id
                                    ]);
                        }

                   

                    $pet      = Cart::instance('pet')->content();
                    $product  = Cart::instance('product')->content(); 

                    Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessfuly($pet,  $product )); 

                    Session::flash('success', 'Purchase successfull. wait for our email and do not forgot to check your Inbox......');

                    Cart::instance('pet')->destroy();
                    Cart::instance('product')->destroy();

                    return redirect()->back();
                    
            }







}
