@extends('layouts.app')
@section('title')
    GoodTour - TravelPacks
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
                <a href="#" class="navbar-brand">
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
                        <!-- Mobile Action -->
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
                                <li class="breadcrumb-item active"><a href="{{ route('travel')}}">Travel Pack</a></li>
                            </ol>
                        </nav>
                        <nav style="float : right;">
                            <form class="form-inline" action="{{ route('travel')}}" method="GET">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                              </form>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <section class="section-main-content col-lg">
                        <section class="section-tour-destination-content" id="tourDestinationContent">
                            <div class="container">
                                <div class="row">
                                    @foreach ($items as $item) 
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <a href="{{ route('detail', $item->slug) }}">
                                            <div class="card card-tour-destination">
                                                <img src="{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}" class="card-img-top" alt="">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="btn btn-primary btn-price">${{ $item->price }}/person</div>
                                                    </div>
                                                  <h4 class="card-title">{{ $item->title}}</h4>
                                                  <p class="card-text" style="margin-top: -15px;">{{ $item->countries->country}}</p>
                                                </div>
                                              </div>
                                        </a>
                                    </div>
                                    @endforeach
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection