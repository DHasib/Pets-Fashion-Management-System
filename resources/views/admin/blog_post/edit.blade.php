
@extends("layouts.admin_master")

@section("title","Edit Blog | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")
   
<!-- Start Post Blog Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Edit And Update a Blog </h3>
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
                   @if(isset($blog_post))
                <div class="card-body">
                    <form action="{{url('admin/blogPost/'.$blog_post->id)}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{method_field('patch')}}

                      <div class="form-group {{ $errors->has('blog_title') ? 'has-error' : '' }}">
                          <label for="wname">Blog Title:</label>
                          <input type="text" class="form-control" id="blog_title" placeholder="Blog Title " name="blog_title" value="@if (isset($blog_post)){{$blog_post->blog_title }}@else{{ old('blog_title') }} @endif">
  
                              @if ($errors->has('blog_title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('blog_title') }}</strong>
                                  </span>
                              @endif
  
                      </div>

                         <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category">Select a Category</label>
                                <select name="category_id"  class="form-control">
                                        @foreach($categories as $category)
                                             <option value="{{ $category->id }}" 

                                                    @if($blog_post->category->id == $category->id)
                                                        selected
                                                    @endif>
                                                
                                                {{ $category->name }}</option>
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
                                  <input type="file" class="form-control"  name="blog_image"  value="@if(isset($blog_post)){{$blog_post->blog_image}}@else{{ old('blog_image') }} @endif">
  
                                          @if ($errors->has('blog_image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('blog_image') }}</strong>
                                              </span>
                                          @endif
                              </div>

                              <div class="form-group {{ $errors->has('blog_content') ? ' has-error' : '' }}">
                                <label for="bcontent">Write Blog Content:</label>
                               <textarea name="blog_content" class="form-control"  cols="30" rows="10" value="{{ old('blog_content') }}"> @if(isset($blog_post)){{$blog_post->blog_content}}@endif</textarea> 
                               
      
                                        @if ($errors->has('blog_content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('blog_content') }}</strong>
                                            </span>
                                        @endif
        
                            </div>
                             <div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg">Update Blog</button>
                             </div>
                      
                  </form>   
                </div>
                @endif
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
                
        </div>
<!-- END Slider Show Form -->





</div>
@endsection