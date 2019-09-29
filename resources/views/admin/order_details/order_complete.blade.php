@extends("layouts.admin_master")

@section("title","Order Completeed | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
                    

<!-- Start Slider Show Form -->
   <div class="container">
               <!-- /.row -->
        <div class="row">
                <div class="col-12">
                  <div class="card card-warning">
                    <div class="card-header ">
                      <h2 class="card-title text-uppercase"> Order Completeed</h2>

                      <div class="card-tools">
                        
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{ url('admin/order/list') }}" style="color:White;">Refresh</a></div>                  
                      </div>

                    </div>
                    <br>

                      @if (Session('success'))
                        <div class="alert alert-success">
                            <strong>{{ Session('success') }}</strong>
                        </div>
                        @elseif (Session('error'))
                            <div class="alert alert-danger">
                                <strong>{{ Session('error') }}</strong>
                            </div>
                      @endif

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height:500px;" id="result">
                      <table class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>Serial No</th>
                            <th>Customer Name</th>
                            <th>Item Type</th>
                            <th>Title</th>
                            <th>quentity</th>
                            <th>Total Price</th>
                            <th>Location</th>
                            <th>Phone Number</th>
                            <th>Order Time</th>
                            <th>Delivery</th>

                          </tr>
                        </thead>
                        <tbody>
                  
                    @if(isset($items_order_list))
                          <?php  $i=1; ?>
                          @forelse ($items_order_list as $order_list)
                                  <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $order_list->name }}</td>
                                      <td>{{ $order_list->type }}</td>
                                      <td>{{ $order_list->title }} 
                                                                    @if( $order_list->type == 'pet') 
                                                                                /<strong> 
                                                                                    @php
                                                                                    if(isset($pet))
                                                                                        $gender =  $pet->find( $order_list->item_id);
                                                                                    
                                                                                    @endphp
                                                                                    {{$gender->gender}}
                                                                                </strong>
                                                                    @endif
                                    </td>
                                      <td>{{ $order_list->quentity }}</td>
                                      <td> {{ $order_list->total_price }} </td>
                                      <td> {{ $order_list->location }}  </td>
                                      <td> {{ $order_list->PhoneNum }}  </td>
                                      <td> <time class="published" datetime="2016-04-17 12:00:00">
                                            {{ $order_list->created_at }} </time> 
                                     </td>

                                      
                                
                                <td>   
                                      <button  class="btn btn-success btn-sm"> Completed </button>
                                                              
                                </td>
                              

                                  </tr>
                          @empty
                              <div class="alert alert-danger">No Order Create  Yet!! </div>
                          @endforelse
                      
                          
                     @endif
                    
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
        </div>
        <!-- /.row -->
                
    </div>
<!-- END Slider Show Form -->





</div>
@endsection