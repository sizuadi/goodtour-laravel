@extends('layouts.app')
@section('title')
    GoodTour - Testimonials
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
                            <a href="{{route('rating')}}" class="nav-link">Testimonials</a>
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
                                <li class="breadcrumb-item active"><a href="{{ route('rating')}}">Testimonials</a></li>
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
                            
                                        <form action="{{ route('rating.store')}}" method="POST">
                                            @csrf
                                        <input type="hidden" name="users_id" value="{{ Auth::user()->id}}">
                                            <div class="form-group col mt-4">
                                                <textarea class="form-control"
                                                name="description" placeholder="description"></textarea>
                                            </div>
                                            <div class="form-group col">
                                                <select name="star" class="form-control" >
                                                    <option value="">Star</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
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
                    <div class="row">
                        <section class="section-main-content col-lg">
                            <section class="section-tour-destination-content" id="tourDestinationContent">
                                <div class="container">
                                    <div class="row">
                                        @foreach ($items as $item) 
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                                <div class="card card-tour-destination">
                                                    <div class="card-body">
                                                        <div class="rounded-circle mb-5" style="background-image: url('{{ Storage::url($item->user->image)}}'); width: 100px;height: 100px; background-size: cover;display: block; background-position : center; background-size: cover; margin: auto;"></div>
                                                      <h4 class="card-title text-center style="margin-top : -20px;">{{ $item->user->name}}</h4>
                                                      <p class="card-text text-center mt-2" style="margin-top: -15px;">"{{ $item->description}}"</p>
                                                    <div class="text-center">
                                                        <?php if($item->star == 1){ ?>
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <?php }elseif ($item->star == 2) {?>
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <?php }elseif ($item->star == 3) {?>
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <?php }elseif ($item->star == 4) {?>
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <?php }elseif ($item->star == 5) {?>
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <img src="{{ url('frontend/images/star_ic.png')}}" width="40px" alt="">
                                                        <?php }else{ ?>
                                                        <h3>No Stars</h3>
                                                        <?php } ?>
                                                    </div>
                                                    </div>
                                                  </div>
                                        </div>
                                        @endforeach
                                </div>
                            </section>
                        </section>
                    </div>
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
