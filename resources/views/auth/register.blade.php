@extends('layouts.login')
@section('title')
    GoodTour - Login
@endsection
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="login100-more" style="background-image: url({{url('frontend/images/login.jpeg')}})"></div>

        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title p-b-59">
                    Sign Up
                </span>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <span class="label-input100">Full Name</span>
                    <input class="input100 @error('name') is-invalid @enderror" id="name" type="text"
                        name="name" value="{{ old('name') }}" required autocomplete="name"
                        autofocus placeholder="Full Name...">
                    <span class="focus-input100"></span>
                </div>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

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

                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100 @error('username') is-invalid @enderror" id="username" type="text"
                        name="username" value="{{ old('username') }}" required autocomplete="username"
                        autofocus placeholder="Username...">
                    <span class="focus-input100"></span>
                </div>

                @error('username')
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

                <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
                    <span class="label-input100">Repeat Password</span>
                    <input class="input100" id="password-confirm" type="password" name="password_confirmation"
                        required autocomplete="new-password" placeholder="*************">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-m w-full p-b-33">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            <span class="txt1">
                                I agree to the
                                <a href="#" class="txt2 hov1">
                                    Terms of User
                                </a>
                            </span>
                        </label>
                    </div>


                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>

                    <a href="{{ route('login')}}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                        Sign in
                        <i class="fa fa-long-arrow-right m-l-5"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
