@extends('layouts.app')

@section('content')

<div class="container">
@if(session()->has('msg'))
    <div class="alert alert-success">
        {{ session()->get('msg') }}
    </div>
@endif
<button type="button" class="btn btn-primary submit-login float-right mb-3" data-toggle="modal" data-target="#createuser" data-whatever="@mdo"><i class="fas fa-plus"></i> Add User</button>
<table class="table mt-5 text">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Registration Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $users->links() !!}
</div>
</div>

<div class="modal fade" id="createuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header register-head text-center">
        <h5 class="modal-title text-head text-center" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body register-body">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group mb-3">
            <div class="col-md-12">
                <label for="name" class="col-form-label text-md-end text">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">

            <div class="col-md-12">
                <label for="email" class="col-form-label text-md-end text">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
            <div class="col-md-12">
                <label for="password" class="col-form-label text-md-end text">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
            <div class="col-md-12">
                <label for="password-confirm" class="col-form-label text-md-end text">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-12 text mt-4">
                <button type="submit" class="btn btn-primary btn-block submit-login">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
        </form>
      </div>
  </div>
</div>


@endsection