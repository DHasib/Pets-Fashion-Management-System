@extends("layouts.app")

@section("title","Cart  List | Pet Fashion Management System" )

@section("content")

    <!-- OUR products OFFER [ SLIDE-BAR ] -->
    <section class="our_partners_area offerpage1">
            <div class="panel panel-primary offerpagebdr">
                <div class="panel-heading text-uppercase text-center pnlheading ">
                    <h3>HOT OFFERS</h3>
                </div>
                <div class="container">
                    <div class="panel-body">
                        <div class="partners offerpage">
                @if(isset($discountPet))
                    @foreach($discountPet as $dispet)
                        @if($dispet->discount != null) 
                            <div class="item">
                                <div class="row construction_iner offerpage2">
                                    <div class="col-md-6 col-sm-4 construction">
                                        <div class="cns-img">
                                                <img src="{{asset($dispet->image)}}" alt="{{$dispet->title}}" style="width:100%; height:252.5px;">
                                        </div>
                                        <div class="cns-content">
                                           <a href="{{url('about/pet/'.$dispet->slug)}}"> <i aria-hidden="true"><b>{{$dispet->discount}}%off</b></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                        </div>
                    </div>
                </div>
            </div>
    
        </section>
        <!-- End Our pets OFFER Area -->
                                     

<!--  Single Blog Start here -->
    
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
                        <th style="width:40%">Product Images and Title</th>
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
                                    <h4 class="nomargin">{{ $items->name }}</h4>
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
                                <h4 class="nomargin">{{ $items->name }}</h4>
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
                        <td><a href="{{url('user/dk')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
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