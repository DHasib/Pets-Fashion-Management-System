<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
class OrderDetailController extends Controller
{
     //count Panding Order (Same user Multiple order count)........... 
     public function  total_user_order() {
        
        $total_user_order = DB::table('order_lists')
                        // ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                            ->select('user_id', DB::raw('count(user_id)  as total_order_details'))
                            //->where('order_details.order_status', '=',  '1')
                            ->groupBy('user_id')
                            ->get();
                            return $total_user_order;
            }
     //count Panding totl Pet Order.....................   
            public function  total_pet_order() {
                
                $total_pet_order =DB::table('users')
                                    ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                    ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                    ->select('type', DB::raw('count(type)  as total_pet_type'))
                                    ->where('order_lists.type', '=',  'pet')
                                    ->where(function ($query) {
                                    $query->where('order_status', '=',  '1');
                                    })
                                    ->groupBy('type')
                                    ->get();
                                    return $total_pet_order;
            }   
    //count Panding totl Product Order............. 
            public function  total_product_order()  {        
                $total_product_order =DB::table('users')
                                        ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                        ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                        ->select('type', DB::raw('count(type)  as total_product_type'))
                                        ->where('order_lists.type', '=',  'product')
                                        ->where(function ($query) {
                                        $query->where('order_status', '=',  '1');
                                        })
                                        ->groupBy('type')
                                        ->get(); 

                                        return $total_product_order;
            }
    
//All the panding Order show..............................
    protected function pandingOrder(){
                    
     //Query to find out total panding Product order details..........................
        $product_order_panding = DB::table('users')
                                    ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                    ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                    ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                    ->join('products', 'order_lists.item_id', '=', 'products.id')
                                    
                                    ->select('users.name', 'order_lists.type', 'products.title', 'order_lists.quentity','order_details.id as order_details_id',  'order_lists.total_price','order_lists.item_id', 'payment_details.received_amount','users.location','users.PhoneNum', 'payment_details.created_at')       
                                    ->where('order_lists.type', '=',  'product')
                                    ->where(function ($query) {
                                        $query->where('order_status', '=', 1);
                                    })
                                    ->latest();
     //Query to find out total panding Pet order details and union them to fetch..........................
        $pet_order_panding  = DB::table('users')
                                ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                                ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity','order_details.id as order_details_id',  'order_lists.total_price','order_lists.item_id', 'payment_details.received_amount', 'users.location','users.PhoneNum', 'payment_details.created_at')                       
                                ->where('order_lists.type', '=',  'pet')
                                ->where(function ($query) {
                                    $query->where('order_status', '=', 1);
                                })
                                ->union($product_order_panding)
                                ->latest()
                             
                                ->get(); 


        return view('admin/order_details/order_panding')->with('panding_orders',         $pet_order_panding )
                                                        ->with('pet',                    Pet::all())
                                                        ->with('link',                   DynamicLinks::all())
                                                        ->with('order_detail',           OrderDetail::all())
                                                        ->with('panding_order',          $this->total_user_order()->count())
                                                        ->with('total_panding_pet',      $this->total_pet_order())
                                                        ->with('total_panding_product',  $this->total_product_order())
                                                        ->with('authUser',               Auth::user()); 
    }





//after deleviry successfuly mark as deleviry complete..............................
    protected function completeOrder(Request $request)
    {

        $complete_order =  OrderDetail::find($request->id);

        $complete_order->order_status = 0;
         
         $is_saved = $complete_order->save();

         if ($is_saved){
             session()->flash("success", "Sucessfully Update Order as Deleviry Complete");
             return redirect()->back()->with('authUser', Auth::user());
         }else{
             session()->flash("error", "Failed to Update Order as Deleviry Complete");
             return redirect()->back()->with('authUser', Auth::user());
         }

    }

//To show all the Order/ sell details................................
    protected function listOrder(){

     $product_order_list = DB::table('users')
                                ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                ->join('products', 'order_lists.item_id', '=', 'products.id')
                                ->select('users.name', 'order_lists.type', 'products.title', 'order_lists.quentity','order_details.id as order_details_id',  'order_lists.total_price','order_lists.item_id', 'payment_details.received_amount','users.location','users.PhoneNum', 'payment_details.created_at')       
                                ->where('order_lists.type', '=',  'product')
                                ->latest();

    $pet_order_list  = DB::table('users')
                            ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                            ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                            ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                            ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                            ->select('users.name', 'order_lists.type', 'pets.title', 'order_lists.quentity','order_details.id as order_details_id',  'order_lists.total_price','order_lists.item_id', 'payment_details.received_amount', 'users.location','users.PhoneNum', 'payment_details.created_at')                       
                            ->where('order_lists.type', '=',  'pet')
                            ->union($product_order_list)
                            ->latest()
                            ->get();


    return view('admin/order_details/order_list')->with('items_order_list',        $pet_order_list )
                                                ->with('pet',                    Pet::all())
                                                ->with('link',                   DynamicLinks::all())
                                                ->with('order_detail',           OrderDetail::all())
                                                ->with('panding_order',          $this->total_user_order()->count())
                                                ->with('total_panding_pet',      $this->total_pet_order())
                                                ->with('total_panding_product',  $this->total_product_order())
                                                ->with('authUser',               Auth::user()); 


    }




}
