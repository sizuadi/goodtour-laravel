@extends('layouts.admin')
@section('title')
    Admin - Transaction - Edit
@endsection
@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update Transaction {{ $item->user->name}}</h1>
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
                <a href="{{ route('transactions.index')}}" class="btn btn-primary mb-4">
                <i class="fas fa-sign-out-alt"></i> Back
            </a>     
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-8 card ml-3">
                <div class="card-body">
                    <form action="{{ route('transactions.update', $item->transactions_id)}}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <select name="transaction_status" class="form-control">
                                <option value="{{ $item->transaction_status}}"> JANGAN DIUBAH ({{ $item->transaction_status}})</option>
                                <option value="IN_CART">IN CART</option>
                                <option value="PENDING">PENDING</option>
                                <option value="SUCCESS">SUCCESS</option>
                                <option value="CANCEL">CANCEL</option>
                                <option value="FAILED">FAILED</option>
                            </select>
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