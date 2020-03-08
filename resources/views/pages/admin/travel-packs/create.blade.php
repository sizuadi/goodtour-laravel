@extends('layouts.admin')
@section('title')
    Admin - TravelPacks - Create
@endsection
@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Insert Travel Packs</h1>
            </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="{{ route('travel-packs.index')}}" class="btn btn-primary mb-4">
                <i class="fas fa-sign-out-alt"></i> Back
            </a>     
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-8 card ml-3">
                <div class="card-body">
                    <form action="{{ route('travel-packs.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title')}}">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="countries_id" class="form-control" required>
                                    <option value="">Choose Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->countries_id}}">{{ $country->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea class="form-control" name="about" value="{{ old('about')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured_event">Featured Event</label>
                            <input type="text" class="form-control" name="featured_event" value="{{ old('featured_event')}}">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" name="language" value="{{ old('language')}}">
                        </div>
                        <div class="form-group">
                            <label for="foods">Foods</label>
                            <input type="text" class="form-control" name="foods" value="{{ old('foods')}}">
                        </div>
                        <div class="form-group">
                            <label for="departure_date">Departure Of Date</label>
                            <input type="date" class="form-control" name="departure_date" value="{{ old('departure_date')}}">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{ old('duration')}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" value="{{ old('type')}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price')}}">
                        </div>
                        <button type="submit" class="btn btn-success" style="float : right;">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <!-- /.container-fluid -->




    <!-- /.container-fluid -->


@endsection