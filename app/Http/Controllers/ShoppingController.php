<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
use App\Pet;
use App\Product;
use App\DynamicLinks;


class ShoppingController extends Controller
{
//Add to cart selected Pets...............................................................
    public function petAddToCart($pet_id)
    {
          $pet = Pet::find($pet_id);

        if($pet->stock != 0){

          $cartItem = Cart::instance('pet')->add([ 
            'id'          => $pet->id,
            'name'        => $pet->title,
            'price'       => $pet->price,
            'qty'         => 1,
            'weight'      => 0,
            'options'     => ['status' => 'pet']
             
          ]);

          Cart::associate($cartItem->rowId, 'App\Pet');
          Session::flash('success', 'Pet added to cart.');
  
          return redirect()->back();
        }else{
            Session::flash('error', 'Pet Are Out of Stock.');
  
            return redirect()->back();
        }

    }
    //Add to cart selected Product...............................................................
            public function productAddToCart($product_id)
            {
                //DD(request()->all());

                $product = Product::find($product_id);
                if($product->stock != 0){

                $cartItem = Cart::instance('product')->add([ 
                    'id'          => $product->id,
                    'name'        => $product->title,
                    'price'       => $product->price,
                    'qty'         => 1,
                    'weight'      => 0,
                    'options'     => ['status' => 'product']
                    
                ]);

                Cart::associate($cartItem->rowId, 'App\Product');
                Session::flash('success', 'Product added to cart.');
        
                return redirect()->back();
                }else{
                    Session::flash('error', 'Product Are Out of Stock.');
        
                    return redirect()->back();
                }

            }

 //Add to cart Show all items...............................................................
        public function cart()
        {
            return view('public/shop/shopping_cart/cart')->with('link',             DynamicLinks::all())
                                                         ->with('discountPet',      Pet::all())
                                                         ->with('discountProduct',  Product::all());
        }

 //Add to cart selected items Delete...............................................................
        public function cart_delete($id, $status)
        {
            if($status == 'pet'){
                Cart::instance('pet')->remove($id);

                Session::flash('success', 'Item Removed from Cart.');
                return redirect()->back()->with('link',             DynamicLinks::all())
                                         ->with('discountPet',      Pet::all())
                                         ->with('discountProduct',  Product::all());
                }else{
                   
                    Cart::instance('product')->remove($id);

                    Session::flash('success', 'Item Removed from Cart.');
                    return redirect()->back()->with('link',             DynamicLinks::all())
                                             ->with('discountPet',      Pet::all())
                                             ->with('discountProduct',  Product::all());
                }
   
            
        }

 //Add to cart selected items Quentity Increse...............................................................
        public function incr($rowId, $id, $qty, $status)
        {
            if($status == 'pet'){
                $pet = Pet::find($id);

                if($pet->stock > $qty ){
                    Cart::instance('pet')->update($rowId, $qty + 1);

                    Session::flash('success', 'Pet qunatity updated.');
        
                    return redirect()->back()->with('link',            DynamicLinks::all())
                                            ->with('discountPet',      Pet::all())
                                            ->with('discountProduct',  Product::all());
                }else{
                    
                    Session::flash('error', 'Out of Stock!! Quentity are not Increse ');
        
                    return redirect()->back()->with('link',             DynamicLinks::all())
                                             ->with('discountPet',      Pet::all())
                                             ->with('discountProduct',  Product::all());
                }

            }
            elseif($status == 'product'){
                $product = Product::find($id);

                if($product->stock > $qty ){
                    Cart::instance('product')->update($rowId, $qty + 1);

                    Session::flash('success', 'Product qunatity updated.');
        
                    return redirect()->back()->with('link',              DynamicLinks::all())
                                              ->with('discountPet',      Pet::all())
                                              ->with('discountProduct',  Product::all());
                }else{
                    
                    Session::flash('error', 'Out of Stock!! Quentity are not Increse.');
        
                    return redirect()->back()->with('link',             DynamicLinks::all())
                                             ->with('discountPet',      Pet::all())
                                             ->with('discountProduct',  Product::all());
                }
            }
        }

//Add to cart selected items Quentity Decrese...............................................................     
        public function decr($rowId, $qty, $status)
        {

            if($status == 'pet'){

                if($qty != 1){

                    Cart::instance('pet')->update($rowId, $qty - 1);

                    Session::flash('success', 'Pet qunatity updated.');
        
                    return redirect()->back()->with('link',             DynamicLinks::all())
                                             ->with('discountPet',      Pet::all())
                                             ->with('discountProduct',  Product::all());
                }
                else{
                    Session::flash('error', 'Pet qunatity Must be greater then 0.');
        
                    return redirect()->back()->with('link',             DynamicLinks::all())
                                             ->with('discountPet',      Pet::all())
                                             ->with('discountProduct',  Product::all());
                }

            }
            elseif($status == 'product'){
               
                if($qty != 1){

                    Cart::instance('product')->update($rowId, $qty - 1);

                    Session::flash('success', 'Product qunatity updated.');
        
                    return redirect()->back()->with('link',               DynamicLinks::all())
                                             ->with('discountPet',        Pet::all())
                                             ->with('discountProduct',    Product::all());
                }
                else{
                    Session::flash('error', 'Product qunatity Must be greater then 0.');
        
                    return redirect()->back()->with('link',             DynamicLinks::all())
                                             ->with('discountPet',      Pet::all())
                                             ->with('discountProduct',  Product::all());
                }
            }
               
            
           
        }
    


}
