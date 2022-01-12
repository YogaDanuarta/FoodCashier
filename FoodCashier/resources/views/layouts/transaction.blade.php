@extends('template.masterdashboard')

@section('content')
<h1 class="mt-4">Transaction</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Transaction
        </button> --}}

        <a href="{{route('transaction.create')}}" class="btn btn-primary">Add Transaction</a>
    </li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Stock Item
    </div>
    @include('sweetalert::alert')
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Nota</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($AllTransaction as $listTransaction)
                <tr>
                    <td>{{$listTransaction->id}}</td>
                    <td>{{$listTransaction->id_nota}}</td>
                    <td>{{$listTransaction->nameitem}}</td>
                    <td>{{$listTransaction->qty}}</td>



                    {{-- <td>{{$listTransaction->status}}</td> --}}
                    <td>{!! ($listTransaction->status == 0 ) ? '<span class="badge bg-warning text-dark">Pending</span>'
                        : '<span class="badge bg-success">Success</span>' !!}
                    </td>
                    <td>{{$listTransaction->created_at}}</td>
                    <td>{{$listTransaction->updated_at}}</td>


                    <td style=" display: flex; align-items: center;">
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
                    </td>





                </tr>
                @endforeach


            </tbody>
        </table>
    </div>

</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>


@endsection