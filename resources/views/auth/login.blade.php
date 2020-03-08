@extends('layouts.login')
@section('title')
    GoodTour - Login
@endsection
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="login100-more" style="background-image: url({{url('frontend/images/login.jpeg')}});"></div>

        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-59">
                    Login
                </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="label-input100">Email</span>
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Email addess...">
                    <span class="focus-input100"></span>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                <span class="label-input100">Password</span>
                <input class="input100 @error('password') is-invalid @enderror" id="password" type="password"
                    name="password" required autocomplete="new-password" placeholder="*************">
                <span class="focus-input100"></span>
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Remember Me?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" class="login100-form-btn">
                                    Login
                                </button>
                            </div>
        
                            <a href="{{ route('register')}}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                                Sign up
                                <i class="fa fa-long-arrow-right m-l-5"></i>
                            </a>
                        </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
