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
                    <form action="{{ route('travel-packs.update', $item->travel_packs_id)}}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $item->title }}">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ $item->location}}">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea class="form-control" name="about">{{ $item->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured_event">Featured Event</label>
                            <input type="text" class="form-control" name="featured_event" value="{{ $item->featured_event}}">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" name="language" value="{{ $item->language}}">
                        </div>
                        <div class="form-group">
                            <label for="foods">Foods</label>
                            <input type="text" class="form-control" name="foods" value="{{ $item->foods}}">
                        </div>
                        <div class="form-group">
                            <label for="departure_date">Departure Of Date</label>
                            <input type="date" class="form-control" name="departure_date" value="{{ $item->departure_date}}">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{ $item->duration}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" value="{{ $item->type}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $item->price}}">
                        </div>
                        <button type="submit" class="btn btn-success" style="float : right;">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <!-- /.container-fluid -->




    <!-- /.container-fluid -->


@endsection