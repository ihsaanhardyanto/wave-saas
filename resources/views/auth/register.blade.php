@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
<div class="container">
    <div class="d-flex mt-5 justify-content-center align-items-center register-form-container">
        <div class="login-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="row mb-1 justify-content-center">
                    <label for="name" class="col-md-4 col-form-label text-center">{{ __('Name') }}</label>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border border-3" size="80" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email Address -->
                <div class="row mb-1 justify-content-center">
                    <label for="email" class="col-md-4 col-form-label text-center">{{ __('Email Address') }}</label>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border border-3" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="row mb-1 justify-content-center">
                    <label for="password" class="col-md-4 col-form-label text-center">{{ __('Password') }}</la>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-3" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="row mb-1 justify-content-center">
                    <label for="password-confirm" class="col-md-4 col-form-label text-center">{{ __('Confirm Password') }}</label>
                </div>
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control border border-3" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0 mt-5 justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" style="font-family: 'Nunito', serif; font-weight: 700; padding-top: 0.6rem; padding-bottom: 0.6rem; background-color: #FF8C00;" class="btn btn-primary auth-btn">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="img-login align-items-start">
            <img src="{{ asset("img/electric_car_register.jpg")}}" style="width:700px;height:auto;" class="img-register" alt="electric_car_login">
        </div>
    </div>
</div>
@endsection
<!-- 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
