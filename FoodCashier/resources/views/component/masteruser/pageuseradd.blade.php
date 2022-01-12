@extends('template.masterdashboard')

@section('titleWeb','Create User')

@section('content')



<h1 class="mt-4">Create User</h1>
<ol class="breadcrumb mb-4">
    {{-- <li class="breadcrumb-item active">
        <a href="{{route('masteruser.create')}}" class="btn btn-primary">Add User</a>
    </li> --}}
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Create User
    </div>

    @include('template.flash')
    <div class="card-body">
        <form method="POST" action="{{route('masteruser.store')}}" enctype=”multipart/form-data”>
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name')
                    }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                    Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{
                    __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                    __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">


                    {{-- <input type="file" name="image" class="form form-control"> --}}
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>

                    <a href="{{route('masteruser.index')}}" class="btn btn-primary"> {{ __('Cancel') }}</a>

                </div>
            </div>
        </form>
    </div>
</div>





@endsection