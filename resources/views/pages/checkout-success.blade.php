@extends('layouts.checkout-success')
@section('title')
    Success! - GoodTour
@endsection
@push('addon-styles')
    <link rel="stylesheet" href="{{ url('frontend/styles/details.css')}}">
    <link rel="stylesheet" href="{{ url('frontend/styles/checkout.css')}}">
@endpush
@section('navbar')
        <!-- Navbar -->
        <div class="container">
            <nav class="row navbar navbar-expand-lg navbar-light bg-white">
                <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                    <a href="index.html" class="navbar-brand">
                        <img src="{{ url('frontend/images/GoodTOur.png')}}" alt="">
                    </a>
                </div>
                <div class="ul navbar-nav mr-auto d-none d-lg-block">
                    <li>
                        <span class="text-muted">
                            | &nbsp; Let's Go to beautiful world
                        </span>
                    </li>
                </div>
            </nav>
        </div>
@endsection
@section('content')
    <main>
        <section class="checkout-success text-center">
            <img src="{{ url('frontend/images/new/mini_profile/checkout/sent_ic.jpg')}}" alt="">
            <h1>Horaayyy! Success</h1>
            <p>We've sent you email for trip instruction
                please read it as well</p>
            <a href="{{ route('home')}}" class="btn btn-primary button-homepage">Home Page</a>
        </section>
    </main>
@endsection