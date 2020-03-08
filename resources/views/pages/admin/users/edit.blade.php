@extends('layouts.admin')
@section('title')
    Admin - Users - Edit
@endsection
@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update Users</h1>
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
                <a href="{{ route('users.index')}}" class="btn btn-primary mb-4">
                <i class="fas fa-sign-out-alt"></i> Back
            </a>     
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-8 card ml-3">
                <div class="card-body">
                    <form action="{{ route('users.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-group col">
                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $item->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $item->username}}">
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control" name="profession" placeholder="Proffesion" value="{{ $item->profession}}">
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $item->email}}">
                        </div>
                        <div class="form-group col">
                            <textarea class="form-control" name="address" placeholder="Address">{{ $item->address}}</textarea>
                        </div>
                        <div class="form-group col">
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col mt-4">
                            <input class="form-control" type="password"
                            name="password" placeholder="Password">
                        </div>
                        <div class="form-group col mt-4">
                            <input class="form-control" type="password"
                            name="password_confirmation" placeholder="Password Confirmation">
                        </div>
                        <div class="form-group col">
                            <input type="file" class="form-control" name="image" placeholder="Image" value="{{ $item->image}}">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
      <!-- /.container-fluid -->




    <!-- /.container-fluid -->


@endsection