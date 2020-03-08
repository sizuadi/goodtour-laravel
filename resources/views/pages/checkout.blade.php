@extends('layouts.app')
@section('title')
    Checkout - GoodTour
@endsection
@push('pretend-styles')
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/combined/css/gijgo.min.css')}}">
@endpush
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
        <section class="section-details-header" id="detailsHeader">
        </section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Travel Pack</li>
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <section class="section-main-content col-lg">
                        <div class="row">
                            <div class="card card-details-1 col-lg">
                                <div class="row">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <div>{{ $error }}</div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    <div class="left-content col-lg-6">
                                        <h1>Anyone Who Wants To Go?</h1>
                                        <p>{{ $item->travel_packs->title }}, {{ $item->travel_packs->location}}</p>
                                        <table class="table table-borderless table-responsive text-center">
                                            <thead>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>Nationality</td>
                                                    <td>VISA</td>
                                                    <td>Passport</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($item->details as $detail)
                                                    <tr>
                                                        <td class="align-middle">{{ $detail->username}}</td>
                                                        <td class="align-middle">{{ $detail->nationality}}</td>
                                                        <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                                        <td class="align-middle">
                                                            {{ \Carbon\Carbon::createFromDate($detail->doe_passport) >
                                                            \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="{{ route('checkout-remove', $detail->transaction_detail_id)}}">
                                                                <img src="{{ url('frontend/images/new/mini_profile/checkout/close.png')}}"
                                                                    height="20px">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">No One Tour?</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="right-content col-lg-6 pl-lg-0">
                                        <h2 class="mb-4">Add Member</h2>
                                        <form action="{{ route('checkout-create', $item->transactions_id)}}" method="POST" class="form-group">
                                            @csrf
                                            <label for="username" class="sr-only">Username</label>
                                            <input type="text" class="form-control mb-3" id="inputUsername" name="username"
                                                placeholder="Username">
                                            <label for="inputNationality" class="sr-only">Nationality</label>
                                            <input type="text" width="50px" class="form-control mb-3" id="inputNationality" name="nationality"
                                                placeholder="Nationality">
                                            <label for="inputVisa" class="sr-only">VISA</label>
                                            <select class="custom-select mb-3" name="is_visa" id="">
                                                <option value="">VISA</option>
                                                <option value="1">30 Days</option>
                                                <option value="2">N/A</option>
                                            </select>
                                            <label for="doe_passport" class="sr-only">DOE Passport</label>
                                            <input type="text" class="form-control datepicker" name="doe_passport" id="doePassport"
                                                placeholder="DOE Passport">
                                            <button class="btn btn-add mt-3">Add</button>
                                        </form>
                                        <h3>Notes</h3>
                                        <p>You are only able to invite member that has registered in GoodTour.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card card-details-2 col-lg mt-3">
                                <div class="row">
                                    <div class="left-content col-lg-5">
                                        <div class="card card-details-3">
                                            <h2>Tour Information</h2>
                                            <table class="table table-borderless table-details"
                                                style="margin-left: -10px;">
                                                <thead>
                                                    <tr>
                                                        <th>Members</th>
                                                        <td scope="col">{{ $item->details->count()}} Person</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Additional VISA</td>
                                                        <td scope="col">$ {{ $item->additional_visa}},00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Trip Price</td>
                                                        <td scope="col">$ {{ $item->travel_packs->price}},00/person</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Total Price</th>
                                                        <td scope="col">$ {{ $item->transaction_total}},00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Total Pay (Unique Code)</th>
                                                        <td scope="col">
                                                            <span style="color: #1E55A9; font-weight: bold;">$ {{ $item->transaction_total}},</span>
                                                            <span style="color: #FFB500; font-weight: bold;">{{ mt_rand(0,99)}}</span>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="right-content col-lg-7 pl-lg-0">
                                        <div class="card card-details-3">
                                            <div class="text-center">
                                                <h2>Payment Instructions</h2>
                                                <p>You must to complete payment before you
                                                    continue the awesome tour</p>
                                            </div>
                                            <div class="row mx-auto">
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="credit-card row mb-4">
                                                        <div class="col-md">
                                                            <div class="description">
                                                                <img src="{{ url('frontend/images/new/mini_profile/checkout/card_ic.png')}}"
                                                                    alt="" class="feature-img">
                                                                <div class="description">
                                                                    <p>Additional VISA</p>
                                                                    <p>Bank Central Asia</p>
                                                                    <h2>0890 9099 1222</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <div class="credit-card row mb-4">
                                                        <div class="col-md">
                                                            <div class="description">
                                                                <img src="{{ url('frontend/images/new/mini_profile/checkout/card_ic.png')}}"
                                                                    alt="" class="feature-img">
                                                                <div class="description">
                                                                    <p>Additional VISA</p>
                                                                    <p>Bank Central Asia</p>
                                                                    <h2>0890 9099 1222</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="join-container">
                                            <a href="{{ route('checkout-success', $item->transactions_id)}}" class="btn btn-block btn-join mt-3 dy-2">JOIN NOW</a>
                                        </div>
                                        <div class="cancel-container">
                                            <a href="{{ route('checkout-cancel', $item->transactions_id)}}" class="btn btn-block btn-cancel mt-2  dy-2">Cancel Travel</a>
                                        </div>
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
@push('addon-script')
    <script src="{{ url('frontend/libraries/gijgo/combined/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/new/mini_profile/checkout/ic_calendar.png')}}">'
                }
            });

        });
        // Gijgo
    </script>
@endpush