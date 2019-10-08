@extends("layouts.app")

@section("title","Order Details | Pet Fashion Management System" )

@section("content")

<!-- User Profile area -->
<div class="panel panel-default ourPro">
    @include('includes.profile_navbar')
    <!-- Main content -->
    <section class="container">
        <div class="row">
            @include('includes.profile_card')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="well">
                        <h5>My Order Details</h5>
                    </div><!-- /.card-header -->
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                 @elseif (Session::has('error'))
                    <div class="alert alert-danger">
                        <strong>{{ Session::get('error') }}</strong>
                    </div>
                 @endif
                    <div class="panel-body">    <!-- panel body -->
                                
         <!-- Recent Order Details -->
         <div class="well well-sm" style="background-color:#f8b81d;" ><h5>Recent/Panding Order</h5></div>
          <div class="card-body table-responsive p-0" style="height:300px;" id="result">
    @if(isset($recent_order) && $recent_order->count() > 0 )

            <table class="table table-head-fixed">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Type</th>
                  <th>Title</th>
                  <th>Quentity</th>
                  <th>Sub Total</th>
                  <th>Location</th>
                  <th>Phone Number</th>
                  <th>Order Time</th>

                </tr>
              </thead>
              <tbody>

               
                <?php  $i=1; ?>
                @foreach ($recent_order as $my_order)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $my_order->type }}</td>
                  <td>{{ $my_order->title }}
                    @if( $my_order->type == 'pet')
                    /<strong>
                      @php
                      if(isset($pet)){
                      $gender = $pet->find( $my_order->item_id);
                      }
                      @endphp
                      {{$gender->gender}}
                    </strong>
                    @endif
                  </td>
                  <td>{{ $my_order->quentity }}</td>
                  <td> {{ $my_order->total_price }} </td>
                  <td> {{ $my_order->location }} </td>
                  <td> {{ $my_order->PhoneNum }} </td>
                  <td> <time class="published" datetime="2016-04-17 12:00:00">
                      {{ $my_order->created_at }} </time>
                  </td>


                </tr>
               
                @endforeach
            </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2" class="hidden-xs"></td>
                                <td colspan="2" > <strong>Total Amount-</strong></td>
                                @if(isset($total_price))
                                @foreach ($total_price as $price)
                                <td colspan="1" > <strong> {{ $price->total_Price }}</strong>/= </td>
                                @endforeach
                                @endif
                        </tr>
                             
                       </tfoot>
                 @else 
                 <div class="alert alert-danger">Recently You Did't Order Any thing.... </div>
                @endif

             
            </table>
          </div><br><hr><br>
   <!-- Past Order Details -->
   
   <div class="well well-sm" style="background-color:deepskyblue;"><h5>Previous/Received Order</h5></div>
          <div class="card-body table-responsive p-0" style="height:500px;" id="result">
    @if(isset($ordered) && $ordered->count() > 0)
            <table class="table table-head-fixed">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Type</th>
                  <th>Title</th>
                  <th>Quentity</th>
                  <th>Sub Total </th>
                  <th>Location</th>
                  <th>Phone Number</th>
                  <th>Order Time</th>

                </tr>
              </thead>
              <tbody>

               
                <?php  $i=1; ?>
                @foreach ($ordered as $my_order)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $my_order->type }}</td>
                  <td>{{ $my_order->title }}
                    @if( $my_order->type == 'pet')
                    /<strong>
                      @php
                      if(isset($pet)){
                      $gender = $pet->find( $my_order->item_id);
                      }
                      @endphp
                      {{$gender->gender}}
                    </strong>
                    @endif
                  </td>
                  <td>{{ $my_order->quentity }}</td>
                  <td> {{ $my_order->total_price }} </td>
                  <td> {{ $my_order->location }} </td>
                  <td> {{ $my_order->PhoneNum }} </td>
                  <td> <time class="published" datetime="2016-04-17 12:00:00">
                      {{ $my_order->created_at }} </time>
                  </td>
                </tr>
                
               
                @endforeach
             @else 
          
                <div class="alert alert-danger"> You Did't Order Any thing Yet.... </div>
             @endif

            </tbody>
            </table>
          </div>
          <!-- /.card-body -->

                    </div> <!-- panel body -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>







</div>
<!-- User Profile area -->
@endsection