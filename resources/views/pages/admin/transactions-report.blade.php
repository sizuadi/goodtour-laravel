@extends('layouts.admin')
@section('title')
    Transaction
@endsection
@section('content')




    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
        
      </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                <!-- Content Row -->
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transactionsReport.generatePDF', $item->transactions_id)}}" method="POST">
                            @csrf
                            <div class="form-group col">
                                <label for="">Report Date</label>
                                <input class="form-control" name="updated_at" type="date"></input>
                            </div>
                            <div class="form-group col">
                                <button type="submit" style="float: right;" class="btn btn-primary">Report</button>
                            </div>
                        </form>
                    </div>
                  </div>
    </div>
    <!-- /.container-fluid -->


@endsection