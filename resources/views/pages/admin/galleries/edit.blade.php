@extends('layouts.admin')
@section('title')
    Admin - Galleries - Edit
@endsection
@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update Galleries</h1>
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
                <a href="{{ route('galleries.index')}}" class="btn btn-primary mb-4">
                <i class="fas fa-sign-out-alt"></i> Back
            </a>     
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-8 card ml-3">
                <div class="card-body">
                    <form action="{{ route('galleries.update', $item->galleries_id)}}" method="POST" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <select name="travel_packs_id" class="form-control" >
                                <option value="{{ $item->travel_packs_id}}">Don't Change This</option>
                                @foreach ($travel_packs as $travel_pack)
                                    <option value="{{ $travel_pack->travel_packs_id}}">{{ $travel_pack->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image" placeholder="Image">
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