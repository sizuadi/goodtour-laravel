@extends('layouts.admin')
@section('title')
    Admin - Users - Create
@endsection
@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Insert Users</h1>
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
                    <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col">
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control" name="profession" placeholder="Proffesion">
                        </div>
                        <div class="form-group col">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col">
                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group col">
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Email">Email Verified At</label>
                            <input type="date" class="form-control" name="email_verified_at" placeholder="Email Verified">
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
                            <input type="file" class="form-control" name="image" placeholder="Image">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      <!-- /.container-fluid -->




    <!-- /.container-fluid -->


@endsection