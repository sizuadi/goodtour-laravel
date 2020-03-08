@extends('layouts.app')
@section('title')
    GoodTour - Profile
@endsection
@push('pretend-styles')
@endpush
@push('addon-styles')
    <link rel="stylesheet" href="{{ url('frontend/styles/details.css')}}">
@endpush
@include('includes.style')
@section('navbar')
        <!-- Navbar -->
        <div class="container">
            <nav class="row navbar navbar-expand-lg navbar-light bg-white">
                <a href="{{ route('home')}}" class="navbar-brand">
                    <img src="{{ url('frontend/images/GoodTOur@2x.png')}}" alt="goodtour">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav ml-auto mr-1">
                        <li class="nav-item mx-md-2">
                            <a href="{{ route('home')}}" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a href="{{ route('about')}}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a href="{{ route('travel')}}" class="nav-link">Travel Pack</a>
                        </li>
                        
                        <li class="nav-item mx-md-2">
                            <a href="{{ route('rating')}}" class="nav-link">Testimonials</a>
                        </li>
                        <li>
                            @guest
                            <!-- Mobile Action -->          
                                <form action="" class="form-inline d-sm-block d-md-none">
                                    <button class="btn btn-login my-2 my-sm-0" type="submit" onclick="event.preventDefault(); location.href='{{ url('login')}}';">Login</button>
                                </form>
                                <!-- Desktop Action -->
                                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit" onclick="event.preventDefault(); location.href='{{ url('login')}}';">Login</button>
                                </form>
                            @endguest
                            @auth
                            <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" style="height : 30px !important; width: 30px !important;" src="{{ Storage::url(Auth::user()->image)}}">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                    </div>
                                </li>
                            @endauth
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
@endsection
@section('content')
    <main>
        <section class="section-details-header" id="detailsHeader">
        </section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('profile.edit', Auth::user()->name)}}">Profile</a></li>
                            </ol>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <section class="section-main-content col-lg">
                        <div class="row">
                            <div class="card card-details-1 col-lg">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                    <div class="rounded-circle mb-5" style="background-image: url('{{ Storage::url(Auth::user()->image)}}'); width: 200px;height: 200px; background-size: cover;display: block; background-position : center; background-size: cover; margin: auto;"></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <form action="{{ route('profile.update', Auth::user()->name)}}" method="POST" enctype="multipart/form-data">
                                            @method('patch')
                                            @csrf
                                            <div class="form-group col">
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ Auth::user()->name}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ Auth::user()->username}}">
                                            </div>
                                            <div class="form-group col">
                                                <input type="text" class="form-control" name="profession" placeholder="Profesion" value="{{ Auth::user()->profession}}">
                                            </div>
                                            <div class="form-group col">
                                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email}}">
                                            </div>
                                            <div class="form-group col mt-4">
                                                <input class="form-control" type="password"
                                                name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group col mt-4">
                                                <input class="form-control" type="password"
                                                name="password_confirmation" placeholder="Password Confirmation">
                                            </div>
                                            <div class="form-group col mt-4">
                                                <textarea class="form-control"
                                            name="address" placeholder="Address">{{ Auth::user()->address}}</textarea>
                                            </div>
                                            <div class="form-group col">
                                                <select name="gender" class="form-control" >
                                                    <option value="">Gender</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <input type="file" class="form-control" name="image" placeholder="Image" value="{{ Auth::user()->image}}">
                                            </div>
                                            <div class="form-group col">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
