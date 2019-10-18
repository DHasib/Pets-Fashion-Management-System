@extends("layouts.app")

@section("title","Doctor Support | Pet Fashion Management System" )

@section("content")


<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->


<!-- Start Doctor Support Area  -->
<div class="panel panel-primary ourPro">
    <div class="panel-heading text-uppercase  pnlheading">
        <h3>Doctor</h3>
    </div><br>
    <div class="container">
        <!-- Content Row -->
        <div class="row">
            <!-- =====================  Content Column  ================ -->
            <div class="col-lg-12 md-8">
                <!-- For Doctor Apoinment Section  Two -->
                <section class="col-md-12">
                    <br>
                    <div class="panel-heading pnlheading">
                        <h4>Doctor Appoinment </h4>
                    </div>
                    <div class="calculate scroll"><br><br>

                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            <strong>{{ Session::get('success') }}</strong>
                        </div>
                        @elseif (Session::has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ Session::get('error') }}</strong>
                        </div>
                        @endif
                        <form action="user/store/appoinment" method="post">
                            {{csrf_field()}}
                            <div class="col-md-8 col-sm-12  col-md-offset-2">
                                <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label for="category">Select your Pet Category</label>
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
                                <div class="form-group {{ $errors->has('pet_problem') ? ' has-error' : '' }}">
                                    <label for="bcontent">Describe Your Pet Problems:</label>
                                    <textarea name="pet_problem" class="form-control" cols="1"
                                        rows="1">{{ old('pet_problem') }}</textarea>


                                    @if ($errors->has('pet_problem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pet_problem') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group {{ $errors->has('pet_p_n_date') ? ' has-error' : '' }}">
                                    <label for="comment">Select Pet problem Notice Date :</label>
                                    <input class="form-control" name="pet_p_n_date" type="date"
                                        value="{{ old('pet_p_n_date') }}">


                                    @if ($errors->has('pet_p_n_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pet_p_n_date') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group {{ $errors->has('pet_age') ? ' has-error' : '' }}">
                                    <label for="sel2">Select Pet Age </label>
                                    <select name="pet_age" class="form-control">
                                        <option class="disable">--Select--</option>
                                        <option value="1 to 6 Month">1 to 6 Month</option>
                                        <option value="6 to 12 Month">6 to 12 Month</option>
                                        <option value="1 to 2 Years">1 to 2 Years</option>
                                        <option value="3 to 5 Years">3 to 5 Years</option>
                                    </select>

                                    @if ($errors->has('pet_age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pet_age') }}</strong>
                                    </span>
                                    @endif

                                </div><br>
                                <div class="form-group {{ $errors->has('doctor_v_date') ? ' has-error' : '' }}">
                                    <label for="comment">Select Doctor Visite Date :</label>
                                    <input class="form-control" type="date" name="doctor_v_date" type="date"
                                        value="{{ old('doctor_v_date') }}">

                                    @if ($errors->has('doctor_v_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doctor_v_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                @if(auth::user() && Auth::user()->role == 0)
                                <button class="btn btn-warning btn-sm btn-middle" type="submit">Get Appoinment
                                </button><br><br><br><br>
                                @else
                                <div class="btn btn-danger"><a href="{{url('login')}}">Must Log in As a User to Get Doctor Appoinment</a></div>
                                @endif
                            </div>
                            <!-- for diveded section1 -->
                        </form>
                    </div>
                </section><br><br>

            </div><!-- For Row -->
        </div><!-- For container -->
    </div>
    <!-- End Doctor Support Area -->
</div>

@endsection