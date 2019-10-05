@extends("layouts.app")

@section("title","Cart  List | Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->
    
    <!-- Our Products area  -->
    <div class="panel panel-primary ourPro">
        <div class="panel-heading text-center pnlheading">
            <h3><strong>{{ (Cart::instance('pet')->content()->count() + Cart::instance('product')->content()->count()) }} </strong>  -Items are Selected</h3>
        </div><br><br>
        <!-- Echo Any Message  -->
        @if (Session::has('success'))
        <div class="alert alert-success">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
        @if(Cart::instance('pet')->content()->count() > 0 || Cart::instance('product')->content()->count() > 0  )
        <div class="container cart" style="overflow-x:auto;">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:40%">Items Images and Title</th>
                        <th style="width:12%">Price</th>
                        <th style="width:14%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:12%">Action</th>
                    </tr>
                </thead>
                <tbody>
            @foreach(Cart::instance('pet')->content() as $items)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="{{ asset($items->model->image) }}" alt="Pet"
                                        class="img-responsive" /></div>
                                <div class="col-sm-10">
                                    <h6 class="nomargin">{{ $items->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $items->price }} </td>
                        <td class="product-quantity">
                                <div class="quantity">
                                        <a href="{{ url('cart/decr', ['rowId' => $items->rowId, 'qty' => $items->qty, 'status' =>$items->options->status]) }}" class="quantity-minus ">-</a>
                                        <input  class="email input-text qty text" name="qty" type="text"  value="{{ $items->qty }}" readonly>
                                        <a href="{{ url('cart/incr', ['rowId' => $items->rowId, 'id' => $items->id, 'qty' => $items->qty, 'status' =>$items->options->status ]) }}" class="quantity-plus">+</a>
                                    </div>
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $items->subtotal() }}</td>
                        <td class="actions" data-th="">
                            <a href="{{ url('shopping/cart') }}" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></a>
                            <a href="{{ url('cart/delete', $items->rowId. '/'.$items->options->status ) }}"   class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
        @endforeach
        @foreach(Cart::instance('product')->content() as $items)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="{{ asset($items->model->image) }}" alt="Pet"
                                    class="img-responsive" /></div>
                            <div class="col-sm-10">
                                <h6 class="nomargin">{{ $items->name }}</h6>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $items->price }} </td>
                    <td class="product-quantity">
                            <div class="quantity">
                                    <a href="{{ url('cart/decr', ['rowId' => $items->rowId, 'qty' => $items->qty, 'status' =>$items->options->status]) }}" class="quantity-minus ">-</a>
                                    <input  class="email input-text qty text" name="qty" type="text"  value="{{ $items->qty }}" readonly>
                                    <a href="{{ url('cart/incr', ['rowId' => $items->rowId, 'id' => $items->id, 'qty' => $items->qty, 'status' =>$items->options->status ]) }}" class="quantity-plus">+</a>
                                </div>
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $items->subtotal() }}</td>
                    <td class="actions" data-th="">
                        <a href="{{ url('shopping/cart') }}" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></a>
                        <a href="{{ url('cart/delete', $items->rowId. '/'.$items->options->status  ) }}"   class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
        @endforeach
        
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong> </strong></td>
                    </tr>
                    <tr>
                        <td><a href="{{url('pets')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        </td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td ><strong>Total Cost: {{ number_format(Cart::instance('pet')->Total() + Cart::instance('product')->Total() ) }} </strong></td>
                        @if(Auth::user())
                        <td>
                            <span style="float: right;">

                                    <form action="{{url('user/cart/checkout')}}" method="POST">
                                          {{ csrf_field() }}
                                          <script
                                          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                          data-key="pk_test_KaLnFOjBVXbX4zM4KKTqQHHc00HUjagj5Q"
                                          data-amount="{{(Cart::instance('pet')->Total() + Cart::instance('product')->Total()) * 100  }}"
                                          data-name="Items Sell"
                                          data-description="Pets Fashion Shop Sell Test"
                                          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                          data-locale="auto">
                                          </script>
                                    </form>
                              </span>
                        </td>
                       
                     @else
                        <td>
                            <a href="{{ route('login') }}" class="btn btn-danger">You Must Login To Purchase All This Cart Items</a>
                        </td> 
                     @endif
                    </tr>
                </tfoot>
            </table>
        </div>
        @else 
        <tr>
                <td><a href="{{url('pets')}}" class="btn btn-warning"> Cart is Empty Please Do some Shopping</a> </td>
            </tr>
        @endif
    </div>
    <!-- /.container -->

   

@endsection