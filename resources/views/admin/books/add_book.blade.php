
@extends("layouts.admin_master")

@section("title","Add Books| Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")
   
<!-- Start Post Blog Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Add Book </h3>
                  <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/add/book')}}" style="color:White;">Refresh</a></div>
                </div>
                @if (Session::has('success'))
                      <div class="alert alert-success">
                          <strong>{{ Session::get('success') }}</strong>
                      </div>
                  @elseif (Session::has('error'))
                      <div class="alert alert-danger">
                          <strong>{{ Session::get('error') }}</strong>
                      </div>
                   @endif
                <div class="card-body">
                    <form action="{{url('/admin/store/book')}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                          <label for="wname">Book Title:</label>
                          <input type="text" class="form-control" id="title" placeholder="Book Title " name="title" value="{{ old('title') }}">
  
                              @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
  
                      </div>

                          <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                  <label for="img">select Image for Book:</label>
                                  <input type="file" class="form-control"  name="image"  value="{{ old('image') }}">
  
                                          @if ($errors->has('image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image') }}</strong>
                                              </span>
                                          @endif
                              </div>

                              <div class="form-group {{ $errors->has('books') ? ' has-error' : '' }}">
                                <label for="img">select Books PDF File:</label>
                                <input type="file" class="form-control"  name="books"  value="{{ old('books') }}">

                                        @if ($errors->has('books'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('books') }}</strong>
                                            </span>
                                        @endif
                            </div>

                             <div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg">Add Book</button>
                             </div>
                      
                  </form>   
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
                
        </div>
<!-- END Slider Show Form -->





</div>
@endsection