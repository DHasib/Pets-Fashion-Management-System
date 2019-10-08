@extends("layouts.admin_master")

@section("title","Total sales Repost | Pet Fashion Administration" )


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
                      <h2 class="card-title text-uppercase">Total sales Repost </h2>

                      <div class="card-tools">
                          <div class="btn btn-primary float-right"><a href="{{ url('admin/salse/report' ) }}" style="color:White;">Refresh</a></div>                  
                          <div class="btn btn-danger float-right" style="margin-left:20px; margin-right:20px;"><a href="{{ url('admin/sales/pdf/convert') }}" style="color:White;">PDF Download</a></div>                  
                     
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
                            <th>Item Type</th>
                            <th>Title</th>
                            <th>quentity</th>
                            <th>Sub-total </th>
                            <th>Sale Time</th>

                          </tr>
                        </thead>
                        <tbody>
                  
                    @if(isset($sales))
                          <?php  $i=1; ?>
                          @forelse ($sales as $sale)
                                  <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $sale->type }}</td> 
                                      <td>{{ $sale->title }}</td> 
                                      <td>{{ $sale->quentity }}</td>
                                      <td> {{ $sale->total_price }} </td>
                                      <td> <time class="published" datetime="2016-04-17 12:00:00">
                                            {{ $sale->created_at }} </time> 
                                     </td>
                                  </tr>
                          @empty
                              <div class="alert alert-danger">No Order PAnding Yet!! </div>
                          @endforelse
                      
                          
                     @endif
                    
                        </tbody>
                        <tfoot>
                            <tr>
                                          <td colspan="3" class="hidden-xs"></td>
                                          <td colspan="1" > <strong>Total Amount-</strong></td>
                                    @foreach ($total_price as $total)
                                           <td colspan="1" >   <strong style="color:black; font-size:20px;">  {{ $total->taka }}</strong>/= </td>
                                    @endforeach
                            </tr>
                           </tfoot>
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