@extends('layouts.app')

@section("title","Reset Password | Pet Fashion Management System" )

@section('content')

  <!-- Start Sing-up page layout Area -->
        <div class="panel panel-primary ourPro"><br>
                    <div class="panel-heading text-uppercase  pnlheading">
                        <h3>Reset Your Password </h3>
                    </div><br>

            <div class="container">
                <div class="row centered">
                    <div class="col-md-8">
                        <div class="panel">

                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 float-right">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary ">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
