@extends('layouts.app')
@section('title')
    GoodTour - Details
@endsection
@push('pretend-styles')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css')}}">
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
                                        <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->name)}}">
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
                                <li class="breadcrumb-item"><a href="{{ route('travel')}}">Travel Pack</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('detail', $item->slug)}}">Detail</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <section class="section-main-content col-lg">
                        <div class="row">
                            <div class="card card-details-1 col-lg">
                                <div class="row">
                                    <div class="left-content col-lg-8">
                                        <h1>{{ $item->title}}</h1>
                                        <p>{{ $item->location}}</p>
                                        <div class="gallery row justify-content-center">
                                            <div class="xzoom-container">
                                                <img src="{{ Storage::url($item->galleries->first()->image)}}"
                                                    class="xzoom" id="xzoom-default"
                                                    xoriginal="{{ Storage::url($item->galleries->first()->image)}}">
                                            </div>
                                            <div class="xzoom-thumbs">
                                                @foreach ($item->galleries as $gallery)
                                                <a href="{{ Storage::url($gallery->image )}}">
                                                    <img src="{{ Storage::url($gallery->image )}}"
                                                        class="xzoom-gallery" width="120px"
                                                        xpreview="{{ Storage::url($gallery->image )}}">
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <div class="right-content col-lg-4 pl-lg-0">
                                        <h2>About Tour</h2>
                                        <p class="info">{!! $item->about !!}</p>

                                        <div class="features row">
                                            <div class="col-md">
                                                <div class="description">
                                                    <img src="{{url('frontend/images/ticket_ic.png')}}" alt="" class="feature-img">
                                                    <div class="description">
                                                        <h2>Event</h2>
                                                        <p>{{ $item->featured_event}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="features row">
                                            <div class="col-md">
                                                <div class="description">
                                                    <img src="{{url('frontend/images/lang_ic.png')}}" alt="" class="feature-img">
                                                    <div class="description">
                                                        <h2>Language</h3>
                                                        <p>{{ $item->language}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="features row">
                                            <div class="col-md">
                                                <div class="description">
                                                    <img src="{{url('frontend/images/food_ic.png')}}" alt="" class="feature-img">
                                                    <div class="description">
                                                        <h2>Food</h2>
                                                        <p>{{ $item->foods}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card card-details-2 col-lg mt-3">
                                <div class="row">
                                    <div class="left-content col-lg-7 text-center py-5">
                                        <h1 class="my-4">Tourism are going</h1>
                                        <div class="tourism-picture my-2">
                                            <img src="{{ url('frontend/images/new/mini_profile/item_people_1@2x.png')}}" alt="">
                                            <img src="{{ url('frontend/images/new/mini_profile/item_people_2@2x.png')}}" alt="">
                                            <img src="{{ url('frontend/images/new/mini_profile/item_people_3@2x.png')}}" alt="">
                                            <img src="{{ url('frontend/images/new/mini_profile/item_people_4@2x.png')}}" alt="">
                                            <img src="{{ url('frontend/images/new/mini_profile/item_people_5@2x.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="right-content col-lg-5 pl-lg-0">
                                        <div class="card card-details-3">
                                            <h2>Tour Information</h2>
                                            <table class="table table-borderless table-details"
                                                style="margin-left: -10px;">
                                                <thead>
                                                    <tr>
                                                        <th>Date of Departure</th>
                                                        <td scope="col">{{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Duration</td>
                                                        <td scope="col">{{ $item->duration}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Type</td>
                                                        <td scope="col">{{ $item->type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Price</th>
                                                        <td scope="col">${{ $item->price}},00/person</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        @auth
                                            <div class="join-container">
                                                <form action="{{ route('checkout_process', $item->travel_packs_id)}}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-block btn-join mt-3 dy-2" type="submit">JOIN NOW</button>
                                                </form>
                                            </div>
                                        @endauth
                                        @guest
                                            <div class="join-container">
                                                <a href="{{ route('login')}}" class="btn btn-block btn-join mt-3 dy-2">Login or Register to JOIN</a>
                                            </div>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <form action="{{ url('logout')}}" method="post">
                @csrf
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Logout</button>
              </form>
            </div>
          </div>
        </div>
    </div>

@endsection
@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 400,
                zoomHeight: 400,
                title: false,
                tint: '#333',
                xoffset: 500
            });
        });
    </script>
@endpush