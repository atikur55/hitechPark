
@extends('layout.master2')
@section('title')
Login
@endsection

@section('content')

<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ asset('assets/images/123.png') }})">
              
            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="{{ route('login') }}" class="noble-ui-logo d-block mb-2">
                <img src="{{asset('assets/images/logo_btl.png')}}" style="width: 100%;" alt="">
         
               <img src="" width="80px;">
              </a>
              <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
              <!-- <form class="forms-sample" action="{{ route('login') }}" method="POST"> -->
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div>
                <div class="mt-3">
                  <!-- <a href="{{ url('/') }}" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</a> -->
                  <!-- <a href="{{url('/dashboard')}}" class="btn btn-primary mr-2 mb-2 mb-md-0">{{ __('Login') }}</a> -->
                  <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                  <!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0"> -->
                    <!-- <i class="btn-icon-prepend" data-feather="twitter"></i> -->
                    <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('Create Account') }}</a> -->
                    <!-- Create Account -->
                  <!-- </button> -->
                  <a href="{{ route('register') }}" type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <!-- <i class="btn-icon-prepend" data-feather="twitter"></i> -->
                    {{ __('Create Account') }}
                    
                  </a>
                </div>
                <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection