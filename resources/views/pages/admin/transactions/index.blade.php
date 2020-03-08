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
                      <h6 class="m-0 font-weight-bold text-primary">DataTables TravelPacks</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-light table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th>ID</th>
                                    <th>Travel</th>
                                    <th>User</th>
                                    <th>Visa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @forelse ($items as $item)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $item->transactions_id }}</td>
                                    <td>{{ $item->travel_packs->title }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>${{ $item->additional_visa }}</td>
                                    <td>${{ $item->transaction_total }}</td>
                                    <td>{{ $item->transaction_status }}</td>
                                    <td>
                                        <!-- Update Data -->
                                        <a href="{{ route('transactions.show', $item->transactions_id)}}" class="btn btn-primary" data-toggle="update" data-target="#updateData{{ $item->transactions_id }}" on>
                                                <i class="fa fa-eye"></i>
                                        </a> 
                                        <a href="{{ route('transactions.edit', $item->transactions_id)}}" class="btn btn-primary" data-toggle="update" data-target="#updateData{{ $item->transactions_id }}" on>
                                                <i class="fa fa-pencil-alt"></i>
                                        </a> 
                                        <form action="{{ route('transactions.destroy', $item->transactions_id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Empty Data</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
    </div>
    <!-- /.container-fluid -->


@endsection