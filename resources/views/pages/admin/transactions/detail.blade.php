@extends('layouts.admin')
@section('title')
    Admin - Transactions - Create
@endsection
@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Transaction {{ $item->user->name}}</h1>
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
            <div class="col-lg-12">
                    <div class="table-hovered">
                        <table class="table table-bordered table-light table-hover">
                            <tr>
                                <th class="bg-primary text-light">ID</th>
                                <td class="border border-black">{{ $item->transactions_id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-light">Travel Pack</th>
                                <td class="border border-black">{{ $item->travel_packs->title }}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-light">Buyer</th>
                                <td class="border border-black">{{ $item->user->name}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-light">Additional Visa</th>
                                <td class="border border-black">${{ $item->additional_visa}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-light">Transaction Total</th>
                                <td class="border border-black">${{ $item->transaction_total}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-light">Transaction Status</th>
                                <td class="border border-black">{{ $item->transaction_status}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-light">Purchase</th>
                                <td class="border border-black">
                                    <table class="table-bordered table-light table-hover">
                                            <tr class="bg-primary text-light">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Nationality</th>
                                                <th>Visa</th>
                                                <th>DOE Passport</th>
                                            </tr>
                                            @foreach ($item->details as $detail)
                                            <tr>
                                                <td>{{$detail->transaction_detail_id}}</td>
                                                <td>{{$detail->username}}</td>
                                                <td>{{$detail->nationality}}</td>
                                                <td>{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                                <td>{{$detail->doe_passport}}</td>
                                            </tr>
                                            @endforeach
                                        <tr></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.container-fluid -->




    <!-- /.container-fluid -->


@endsection