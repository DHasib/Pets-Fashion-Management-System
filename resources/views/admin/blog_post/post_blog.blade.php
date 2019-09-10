
@extends("layouts.admin_master")

@section("title","Post a Blog | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")
   
<!-- Start Post Blog Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Post a Blog </h3>
                  <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/blogPost')}}" style="color:White;">Refresh</a></div>
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
                    <form action="{{url('/admin/blogPost')}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('blog_writter_name') ? 'has-error' : '' }}">
                          <label for="wname">Blog Writter Name:</label>
                          <input type="text" class="form-control" id="blog_writter_name" placeholder="Blog Writter Name" name="blog_writter_name" value="@if(isset($eslider)){{$eslider->slider_title}}@endif">
  
                              @if ($errors->has('blog_writter_name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('blog_writter_name') }}</strong>
                                  </span>
                              @endif
  
                      </div>

                      <div class="form-group {{ $errors->has('blog_content') ? ' has-error' : '' }}">
                          <label for="bcontent">Write Blog Content:</label>
                          <input type="text" class="form-control" id="blog_content" placeholder="Blog Content" name="blog_content" value="@if(isset($eslider)){{$eslider->blog_content}}@endif">
  
                                  @if ($errors->has('blog_content'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('blog_content') }}</strong>
                                      </span>
                                  @endif
  
                      </div>
                         <div class="form-group  {{ $errors->has('blog_content') ? ' has-error' : '' }}">
                            <label for="category">Select a Category</label>
                                <select name="category"  class="form-control">
                                       
                                                <option value="disable"></option>
                                      
                                </select>

                                      @if ($errors->has('category'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('category') }}</strong>
                                          </span>
                                      @endif
  
                          </div>
                          <div class="form-group {{ $errors->has('blog_image') ? ' has-error' : '' }}">
                                  <label for="img">select Image for Blog:</label>
                                  <input type="file" class="form-control"  name="blog_image"  value="@if(isset($eslider)){{$eslider->slider_image}}@endif">
  
                                          @if ($errors->has('blog_image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('blog_image') }}</strong>
                                              </span>
                                          @endif
                              </div>
  
                              @if(isset($eslider))
                              <input type="hidden" name="id" value="{{$eslider->id}}">
                             @endif
                             <div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg">Post Blog</button>
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