@extends("layouts.admin_master")

@section("title","Panding Order | Pet Fashion Administration" )


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
            <h2 class="card-title text-uppercase">Panding Order List</h2>

            <div class="card-tools">

              <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a
                  href="{{ url('admin/order/panding') }}" style="color:White;">Refresh</a></div>
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

                @if(isset($panding_orders))
                <?php  $i=1; ?>
                @forelse ($panding_orders as $pnd_order)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $pnd_order->name }}</td>
                  <td>{{ $pnd_order->type }}</td>
                  <td>{{ $pnd_order->title }}
                    @if( $pnd_order->type == 'pet')
                    /<strong>
                      @php
                      if(isset($pet))
                      $gender = $pet->find( $pnd_order->item_id);

                      @endphp
                      {{$gender->gender}}
                    </strong>
                    @endif
                  </td>
                  <td>{{ $pnd_order->quentity }}</td>
                  <td> {{ $pnd_order->total_price }} </td>
                  <td> {{ $pnd_order->location }} </td>
                  <td> {{ $pnd_order->PhoneNum }} </td>
                  <td> <time class="published" datetime="2016-04-17 12:00:00">
                      {{ $pnd_order->created_at }} </time>
                  </td>



                  <td>
                    <section>
                      <!-- Panding Order -->
                      <form class="form-inline" action=" {{url('admin/order/complete')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                          <input type="hidden" name="id" value="{{$pnd_order->order_details_id}}">
                          <button type="submit" class="btn btn-warning btn-sm"> Panding </button>
                        </div>
                      </form>
                    </section>

                  </td>


                </tr>
                @empty
                <div class="alert alert-danger">No Order PAnding Yet!! </div>
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