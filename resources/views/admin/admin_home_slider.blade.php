
@extends("layouts.admin_master")

@section("title","Edit Slider| Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
   


                <div class="col-12">
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Slider Details Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Serial No</th>
                            <th>Slider Title</th>
                            <th>Slider Heading</th>
                            <th>Slider Desc</th>
                            <th>Slider Images</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php $i=1; ?>
                            @foreach ($sdata as $slider)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $slider->slider_title }}</td>
                            <td>{{ $slider->slider_heading }}</td>
                            <td>{{ $slider->slider_desc }}</td>
                            <td><img src="{{ url('images',$slider->slider_image) }}" class="img-rounded" style="width:100px; height:50px;">{{ $slider->slider_image }}</td>
                            <td><a href="{{url('/admin/slider/edit',$slider->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              <!-- /.row -->




<!-- Start Slider Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> <h2>   Upload Slider Details </h2></h3>
                  <h2>
                      @if (Session::has('message'))
                      <span class="alert-info">
                          <strong>{{ Session::get('message') }}</strong>
                      </span>
                      @endif
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/slider/update')}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group {{ $errors->has('slider_title') ? 'has-error' : '' }}">
                          <label for="slider_title">Slider Title:</label>
                          <input type="text" class="form-control" id="slider_title" placeholder="Slider Title" name="slider_title" value="@if(isset($eslider)){{$eslider->slider_title}}@endif">
  
                              @if ($errors->has('slider_title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('slider_title') }}</strong>
                                  </span>
                              @endif
  
                      </div>
                      <div class="form-group {{ $errors->has('slider_heading') ? ' has-error' : '' }}">
                          <label for="sheading">Hlider Heading:</label>
                          <input type="text" class="form-control" id="heading" placeholder="Hlider Heading" name="slider_heading" value="@if(isset($eslider)){{$eslider->slider_heading}}@endif">
  
                                  @if ($errors->has('slider_heading'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('slider_heading') }}</strong>
                                      </span>
                                  @endif
  
                      </div>
                      <div class="form-group {{ $errors->has('slider_desc') ? ' has-error' : '' }}">
                              <label for="sdesc">Slider Desc:</label>
                              <input type="text" class="form-control" id="desc" placeholder="Slider Desc" name="slider_desc" value="@if(isset($eslider)){{$eslider->slider_desc}}@else{{ old('slider_desc') }}@endif">
  
                                      @if ($errors->has('slider_desc'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('slider_desc') }}</strong>
                                          </span>
                                      @endif
  
                          </div>
                          <div class="form-group {{ $errors->has('slider_image') ? ' has-error' : '' }}">
                                  <label for="sheading">Slider Image:</label>
                                  <input type="file" class="form-control"  name="slider_image"  aria-describedby="inputGroupFileAddon01"  placeholder="@if(isset($eslider)){{$eslider->slider_image}}@endif">
  
                                          @if ($errors->has('slider_image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('slider_image') }}</strong>
                                              </span>
                                          @endif
                              </div>
  
                              @if(isset($eslider))
                              <input type="hidden" name="id" value="{{$eslider->id}}">
                             @endif
                      <button type="submit" class="btn btn-info">Update</button>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
                
        </div>
<!-- END Slider Show Form -->





</div>
@endsection