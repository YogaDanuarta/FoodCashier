@extends('template.masterdashboard')
@section('titleWeb','Master User')

@section('content')
<h1 class="mt-4">Master User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{route('masteruser.create')}}" class="btn btn-primary">Add User</a>
    </li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All User
    </div>

    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($ListUser as $user)

                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td style=" display: flex; align-items: center;">
                        {{-- <a href="#" data-bs-toggle="modal" class="btn btn-info btn-sm" data-bs-target=""><i
                                class="fas fa-pencil-ruler"></i></a> --}}

                        <form method="post" action="{{route('masteruser.destroy',$user->id)}}"> {{-- <form method="post"
                                action="{{route('masteruser.destroy',$user->id)}}"> --}}
                                <input type="hidden" name="deleteid" value="{{$user->id}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            </form>

                            {{-- <form method="post" action="{{route('masteruser.destroy',$user->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            </form> --}}
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>



{{-- @include('component.masteruser.modaluser') --}}

@endsection