
@extends("layouts.admin_master")

@section("title","User Management | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
                    
<!-- Start Slider Show Form -->
<div class="container">

        <!-- Form Element sizes -->
        <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"> Register A Doctor </h3>
              <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/slider/show')}}" style="color:White;">Refresh</a></div>
            </div>
            @if (Session::has('message'))
                  <div class="alert alert-success">
                      <strong>{{ Session::get('message') }}</strong>
                  </div>
              @elseif (Session::has('error'))
                  <div class="alert alert-danger">
                      <strong>{{ Session::get('error') }}</strong>
                  </div>
               @endif
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
                              <input type="file" class="form-control"  name="slider_image"  value="@if(isset($eslider)){{$eslider->slider_image}}@endif">

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

@endsection