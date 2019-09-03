@extends("layouts.master")

@section("title","Sing-up | Pet Fashion Management System" )

@section("sing_up")

    <!-- Start Sing-up page layout Area -->
    <div class="panel panel-primary ourPro"><br>
        <div class="panel-heading text-uppercase  pnlheading">
            <h3>Get Register Here </h3>
        </div><br>


        <main class="my-form col-offset-6">
            <div class="cotainer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Pets Fashion Registration Form </h4>
                            </div>
                            <div class="panel-body">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 text-right">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email_address" class="col-md-4 text-right">{{ __('E-Mail Address') }}</label>
                                        <div class="col-md-6">
                                            <input type="email" id="email_address" class="form-control @error('email') is-invalid @enderror"
                                                name="email"  value="{{ old('email') }}">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('PhoneNun') ? ' has-error' : '' }}">
                                        <label for="phone_number" class="col-md-4 text-right">{{ __('Phone Number') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" id="PhoneNun" class="form-control @error('PhoneNun') is-invalid @enderror" name="PhoneNun" value="{{ old('PhoneNun') }}">

                                            <!-- For Error Messages Show  -->
                                            @error('PhoneNun')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                           @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('location') ? ' has-error' : '' }}">
                                        <label for="Location" class="col-md-4 text-right">{{ __('Location') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" id="Location" class="form-control  @error('Location') is-invalid @enderror" name="location" value="{{ old('location') }}">

                                            <!-- For Error Messages Show  -->
                                            @error('Location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 text-right">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                                                        <!-- For Error Messages Show  -->
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password_confirmation" class="col-md-4 text-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}">

                                                 <!-- For Error Messages Show  -->
                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                @endif 

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                            Register
                                        </button>
                                    </div><br>

                                </form> <br><br>

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block">
                                        <a href="sing-in.html" class="text-danger">Already Have an Account </a>
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- End Sing-up page layout Area -->


@endsection