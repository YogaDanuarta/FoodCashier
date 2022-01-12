@extends('template.masterdashboard')

@section('titleWeb','Dashboard Warung - Ku')

@section('content')

<div class="row">
    {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Stock In </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Stock item < 10</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Completed Order</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Cancelled Order</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
        {{--
    </div> --}}
    <h1 class="mt-4">Home</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Transaction
            </button> --}}

            {{-- <a href="{{route('transaction.create')}}" class="btn btn-primary">Add Transaction</a> --}}
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Master Nota</th>
                        <th>Cashier Name</th>
                        <th>Price Total</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($MasterTransaction as $listTransaction)
                    <tr>
                        <td>{{$listTransaction->id}}</td>
                        <td>{{$listTransaction->master_nota}}</td>
                        <td>{{$listTransaction->namecashier}}</td>
                        <td>{{$listTransaction->subtotal}}</td>

                        <td>{{$listTransaction->created_at}}</td>
                        <td>{{$listTransaction->updated_at}}</td>


                        {{-- <td style=" display: flex; align-items: center;">
                            <form method="post" action="{{route('updateTransaction')}}">
                                <input type="hidden" name="id_nota" value="{{$listTransaction->id_nota}}">
                                <input type="hidden" name="id_transaction" value="{{$listTransaction->id}}">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm "><i
                                        class='fas fa-pencil-ruler'></i></button>
                            </form>

                            <form method="post" action="{{route('transaction.destroy',$listTransaction->id)}}">

                                @csrf

                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            </form>
                        </td> --}}





                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection