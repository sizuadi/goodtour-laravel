@extends('layouts.home')
@section('title')
    GoodTour
@endsection
@push('addon-styles')
<link href="{{'backend/vendor/fontawesome-free/css/all.min.css'}}" rel="stylesheet" type="text/css">
@endpush
@section('navbar')
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{ route('home')}}" class="navbar-brand">
                <img src="frontend/images/new/logo_nav.png" alt="goodtour">
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
                    <a href="{{ route('about')}}" class="nav-link">About Us</a>
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
   
        <!-- Header -->
        <header class="text-center">
            <h1>
                Let's Tour Around<br>
                Beautiful World
            </h1>
            <p class="mt-3">
                Only one click<br>
                you can see you neven seen before
            </p>
            <a href="" class="btn btn-get-started">Get Started</a>
        </header>
        <main>
        <!-- Info -->
        <section class="section-info" id="info">
            <div class="container">
                <div class="row mx-md-n5">
                    <div class="col-lg px-md-5 text-justify">
                        <div class="row">
                            <div class="col-6">
                                <img src="frontend/images/new/icon/activities_ic.png" alt="">
                                <h3 class="mt-3">Activities</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                            <div class="col-6">
                                <img src="frontend/images/new/icon/cam_ic.png" alt="">
                                <h3 class="mt-3">Activities</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <img src="frontend/images/new/icon/gps_ic.png" alt="">
                                <h3 class="mt-3">Activities</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                            <div class="col-6">
                                <img src="frontend/images/new/icon/money_ic.png" alt="">
                                <h3 class="mt-3">Activities</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg px-md-5">
                        <div class="row">
                            <div class="col-lg">
                                <h2>It's time to start your adventure</h2>
                                <p class="mt-5 text-justify">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                <p class="mt-4 text-justify">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                            <a href="{{ route('travel')}}" class="btn btn-primary btn-start-destination mt-4">Start Destination</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Statistics -->
        <section class="section-statistics" id="statictics">
            <div class="container">
                <div class="row mx-md-n5">
                    <div class="col-md-6 px-md-5 text-center">
                        <img src="{{ url('frontend/images/new/cano-people.jpg')}}" alt="">
                    </div>
                    <div class="col-md-6 px-md-5">
                        <h2 class="mt-5">Make Your Tour<br> Memorable and Safe<br> With Us</h2>
                        <p class="mt-4  text-justify">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <div class="statistics text-center mt-5">
                            <div class="row">
                                <div class="col-4">
                                    <h3>{{$transaction_success}}</h3>
                                    <h4>Successful Tours</h4>
                                </div>
                                <div class="col-4">
                                    <h3>{{$users}}</h3>
                                    <h4>Happy Tourist</h4>
                                </div>
                                <div class="col-4">
                                <h3>{{$travel_packs}}</h3>
                                    <h4>Place Explored</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular -->
         <section class="section-popular" id="popular">
                <div class="container">
                    <div class="row">
                        <div class="col text-center section-popular-header">
                            <h2>Best Place Destination</h2>
                            <p>Only one click<br>you can see you neven seen before</p>
                        </div>
                    </div>
                </div>
            </section>
        <section class="section-popular-content mt-3" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($countries as $country)
                    <a href="{{ route('country', $country->countries_id)}}">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel d-flex flex-column"
                                    style="background-image: url('{{ Storage::url($country->image)}}');">
                                    <div class="travel-location">{{$country->country}}</div>
                                    <div class="travel-button mt-auto">
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonials -->
            <section class="section-testimonials-header" id="testimonialHeading">
                <div class="container" style="margin-top : 188px; background-color: #fff;">
                    <footer class="section-footer mt-5 border-top">
                        <div class="container pt-4 pb-4">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-9 text-center mt-4">
                                            <h5>Our Social Media</h5>
                                            <div class="tourism-picture my-2">
                                                <a href="https://www.facebook.com/profile.php?id=100012452953318" target="_blank" style="margin-right :5px;">
                                                    <img src="{{ url('frontend/images/facebook.png')}}" width="50px" alt="">
                                                </a>
                                                <a href="https://t.me/Sizuwano" target="_blank" target="_blank" style="margin-right :5px;">
                                                    <img src="{{ url('frontend/images/telegram.png')}}" width="50px" alt="">
                                                </a>
                                                <a href="https://www.instagram.com/sizuwanoadi/" target="_blank" style="margin-right :5px;">
                                                    <img src="{{ url('frontend/images/instagram.png')}}" width="50px" alt="">
                                                </a>
                                                <a href="https://api.whatsapp.com/send?phone=6287744764038&text=Halo%20Hai,%20GoodTour.%0ASaya%20ingin%20meminta%20bantuan%20dengan%20situs%20anda" target="_blank" style="margin-right :5px;">
                                                    <img src="{{ url('frontend/images/whatsapp.png')}}" width="50px" alt="">
                                                </a>
                                                <a href="https://www.youtube.com/channel/UC5nf1kwI_opFT_rD0Muwxew" target="_blank" style="margin-right :5px;">
                                                    <img src="{{ url('frontend/images/youtube.png')}}" width="50px" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 text-center mt-4">
                                            <h5>GET CONNECTED</h5>
                                            <ul class="list-unstyled">
                                                <li><a href="#">Bogor, West Java</a></li>
                                                <li><a href="#">Indonesia</a></li>
                                                <li><a href="#">0880 - 9090 - 1222</a></li>
                                                <li><a href="#">cd@goodtour.co.id</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top justify-content-center align-items-center pt-4">
                                <div class="col-auto font-weight-light text-center">
                                    2019 Copyright • All right reserved • Made in Parungpanjang
                                </div>
                            </div>
                        </div>
                    </footer>
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
