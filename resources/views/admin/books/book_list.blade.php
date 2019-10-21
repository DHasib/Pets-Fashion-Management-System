@extends("layouts.admin_master")

@section("title","Book List | Pet Fashion Administration" )


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
                      <h2 class="card-title text-uppercase">All Book List</h2>

                      <div class="card-tools">
                        
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/book/list')}}" style="color:White;">Refresh</a></div>
                            <div class="input-group input-group-sm  {{ $errors->has('search') ? 'has-error' : '' }}" style="width: 150px;">
                               <form class="form-inline" action="{{url('admin/book/list')}}" method="POST">
                                {{ csrf_field() }}
                                      <div class="input-group-append">
                                          <input type="text" name="search" value="{{ old('search') }}" class="form-control" size="8" placeholder="Search" >
                                          <button type="submit" class="form-control btn btn-default"><i class="fas fa-search"></i></button>
                                      </div>
                                      
                                      @if ($errors->has('search'))
                                      <span class="help-block">
                                        <strong>  {{ $errors->first('search') }}</strong>
                                      </span>
                                    @endif
                              </form>
                            </div>
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
                    <div class="card-body table-responsive p-0" style="height:600px;" id="result">
                      <table class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Read Books</th>

                          </tr>
                        </thead>
                        <tbody>
                   
                    @if(isset($books))
                          <?php  $i=1; ?>
                          @forelse ($books as $book)
                                  <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $book->title }}</td>
                                      <td> 
                                             <img src="{{ asset($book->image) }}" class="img-rounded" style="width:80px; height:50px;">
                                      </td>
                                      <td><a class="book btn btn-warning btn-sm" href="http://docs.google.com/gview?{{$book->books}}&embedded=true"  target="_blank">Read Book</a></td>
                                      
                                  <!-- Admin Define     -->
                                  <td>
                                </td> 
                          @empty
                              <div class="alert alert-danger">No Books Found!! There is no Book Added </div>
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