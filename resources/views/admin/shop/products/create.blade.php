@extends("layouts.admin_master")

@section("title","Add Product for Sell | Pet Fashion Administration" )


<!-- Bootstrap CSS -->

@section("content")

<!-- Start Post Blog Show Form -->
<div class="container">

    <!-- Form Element sizes -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"> Add Product </h3>
            <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a
                    href="{{url('admin/product/create')}}" style="color:White;">Refresh</a></div>
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
            <form action="{{url('/admin/product')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="wname">Product Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Pet Title " name="title"
                        value="{{ old('title') }}">

                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif

                </div>
                @if(isset($categories))
                <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label for="category">Select a Category</label>
                    <select name="category_id" class="form-control">
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
                @endif

                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image">Select Products Image:</label>
                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">

                    @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="bcontent">Product Describtion:</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                        value="{{ old('description') }}">{{ old('description') }}</textarea>


                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">Product Price:</label>
                    <input type="text" class="form-control" id="price" placeholder="Pet Price " name="price"
                        value="{{ old('price') }}">

                    @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                    <label for="stock">Product Stock:</label>
                    <input type="text" class="form-control" id="stock" placeholder="Pet Stock " name="stock"
                        value="{{ old('stock') }}">

                    @if ($errors->has('stock'))
                    <span class="help-block">
                        <strong>{{ $errors->first('stock') }}</strong>
                    </span>
                    @endif

                </div>
                <a class="btn btn-warning btn-sm tablinks" onclick="discountShow()"> Want to Set
                    Discount click here<br></a>
                <div class="form-group tabcontent {{ $errors->has('discount') ? 'has-error' : '' }}" >
                    <label for="discount">Product Discount:</label>
                    <input type="text" class="form-control" id="discount" placeholder="Pet Discount " name="discount" value="{{ old('discount') }}"  {{ $errors->has('discount') ? ' ' : 'disabled' }}  >

                    @if ($errors->has('discount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount') }}</strong>
                    </span>
                    @endif

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-lg">Add Product</button>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
<!-- END Slider Show Form -->

</div><br><br><br><br>

@endsection