
@extends("layouts.admin_master")

@section("title","Create a Blog | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")
   
<!-- Start Post Blog Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Post a Blog </h3>
                  <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/blogPost/create')}}" style="color:White;">Refresh</a></div>
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
                    <form action="{{url('/admin/blogPost')}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('blog_title') ? 'has-error' : '' }}">
                          <label for="wname">Blog Title:</label>
                          <input type="text" class="form-control" id="blog_title" placeholder="Blog Title " name="blog_title" value="{{ old('blog_title') }}">
  
                              @if ($errors->has('blog_title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('blog_title') }}</strong>
                                  </span>
                              @endif
  
                      </div>

                         <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category">Select a Category</label>
                                <select name="category_id"  class="form-control">
                                       @foreach ($categories as $category)
                                           
                                             <option value="{{  $category->id }}">{{ $category->name }}</option>

                                       @endforeach
                                                
                                      
                                </select>

                                      @if ($errors->has('category_id'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('category_id') }}</strong>
                                          </span>
                                      @endif
  
                          </div>
                          <div class="form-group {{ $errors->has('blog_image') ? ' has-error' : '' }}">
                                  <label for="img">select Image for Blog:</label>
                                  <input type="file" class="form-control"  name="blog_image"  value="{{ old('blog_image') }}">
  
                                          @if ($errors->has('blog_image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('blog_image') }}</strong>
                                              </span>
                                          @endif
                              </div>

                              <div class="form-group {{ $errors->has('blog_content') ? ' has-error' : '' }}">
                                <label for="bcontent">Write Blog Content:</label>
                               <textarea name="blog_content" class="form-control"  cols="30" rows="10" value="{{ old('blog_content') }}"></textarea> 
                               
      
                                        @if ($errors->has('blog_content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('blog_content') }}</strong>
                                            </span>
                                        @endif
        
                            </div>
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