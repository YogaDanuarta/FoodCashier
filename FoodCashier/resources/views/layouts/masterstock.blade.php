@extends('template.masterdashboard')
@section('titleWeb','Master Stock Barang')

@section('content')
<h1 class="mt-4">Master Stock</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add item
        </button>
    </li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Stock Item
    </div>
    @include('template.flash')



    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Description Name</th>
                    <th>Image</th>
                    <th>Price </th>
                    <th>Stock</th>

                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ListItem as $item)
                <tr>
                    <td>{{$item->nameitem}}</td>
                    <td>{{$item->descriptionitem}}</td>
                    <td><img src="{{asset($item->path)}}" class="img img-thumbnail" alt="">
                    </td>
                    <td>{{$item->price}} </td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td style=" display: flex; align-items: center;">
                        <a href="#" data-bs-toggle="modal" class="btn btn-info btn-sm"
                            data-bs-target="#modalUpdate-{{$item->id}}"><i class="fas fa-pencil-ruler"></i></a>
                        <form method="post" action="{{route('masterstock.destroy',$item->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                @include('component.masterstock.modalstockupdate')

                @endforeach



            </tbody>
        </table>
    </div>
</div>



@include('component.masterstock.modalstock')



@endsection