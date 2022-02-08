@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card card-login">
                <div class="card-header text-head text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <label for="email" class="col-form-label text-md-end text text-center">{{ __('Email Address') }}</label>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-6 col-offset-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <label for="password" class="col-form-label text-md-end text">{{ __('Password') }}</label>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                        <div class="col-md-6 col-md-offset-3 text-center">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                        </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-md-6 col-md-offset-3 text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block submit-login">
                                    Login Account
                                </button>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text mt-3" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
