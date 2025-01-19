@extends('layouts.app')

@php
  use Illuminate\Support\Facades\Route;
  use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
  <div class="container">
    <div class="d-flex justify-content-center align-items-center register-form-container mt-5">
      <div class="login-form">
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <!-- Name -->
          <div class="row justify-content-center mb-1">
            <label class="col-md-4 col-form-label text-center" for="name">{{ __('Name') }}</label>
          </div>
          <div class="row justify-content-center mb-3">
            <div class="col-md-8">
              <input autocomplete="name" autofocus
                class="form-control @error('name') is-invalid @enderror border-3 border" id="name" name="name"
                required size="80" type="text" value="{{ old('name') }}">

              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <!-- Email Address -->
          <div class="row justify-content-center mb-1">
            <label class="col-md-4 col-form-label text-center" for="email">{{ __('Email Address') }}</label>
          </div>
          <div class="row justify-content-center mb-3">
            <div class="col-md-8">
              <input autocomplete="email" class="form-control @error('email') is-invalid @enderror border-3 border"
                id="email" name="email" required type="email" value="{{ old('email') }}">

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <!-- Password -->
          <div class="row justify-content-center mb-1">
            <label class="col-md-4 col-form-label text-center" for="password">{{ __('Password') }}</label>
          </div>
          <div class="row justify-content-center mb-3">
            <div class="col-md-8">
              <input autocomplete="new-password"
                class="form-control @error('password') is-invalid @enderror border-3 border" id="password"
                name="password" required type="password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="row justify-content-center mb-1">
            <label class="col-md-4 col-form-label text-center" for="password-confirm">{{ __('Confirm Password') }}</label>
          </div>
          <div class="row justify-content-center mb-3">
            <div class="col-md-8">
              <input autocomplete="new-password" class="form-control border-3 border" id="password-confirm"
                name="password_confirmation" required type="password">
            </div>
          </div>

          <!-- Subscription Plans -->
          <div class="row justify-content-center mb-1">
            <label class="col-md-4 col-form-label text-center">{{ __('Choose Subscription') }}</label>
          </div>
          <div class="row justify-content-center mb-3">
            <div class="col-md-8">
              <div class="subscription-options">
                <div class="form-check mb-3">
                  <input {{ ($plan ?? old('subscription_plan')) == 'basic' ? 'checked' : '' }} class="form-check-input"
                    id="basic" name="subscription_plan" required type="radio" value="basic">
                  <label class="form-check-label" for="basic">
                    Basic - Rp 100.000/month
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input {{ ($plan ?? old('subscription_plan')) == 'premium' ? 'checked' : '' }} class="form-check-input"
                    id="premium" name="subscription_plan" type="radio" value="premium">
                  <label class="form-check-label" for="premium">
                    Premium - Rp 250.000/month
                  </label>
                </div>
              </div>
              @error('subscription_plan')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="row justify-content-center mb-0 mt-5">
            <div class="col-md-8">
              <button class="btn btn-primary auth-btn w-100"
                style="font-family: 'Nunito', serif; font-weight: 700; padding-top: 0.6rem; padding-bottom: 0.6rem; background-color: #FF8C00;"
                type="submit">
                {{ __('Continue to Payment') }}
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="img-login align-items-start">
        <img alt="electric_car_login" class="img-register" src="{{ asset('img/electric_car_register.jpg') }}"
          style="width:700px;height:auto;">
      </div>
    </div>
  </div>

  <style>
    .subscription-options {
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 8px;
    }

    .subscription-options .form-check {
      padding: 15px;
      border: 1px solid #eee;
      border-radius: 5px;
      margin-bottom: 10px;
      transition: all 0.3s ease;
    }

    .subscription-options .form-check:hover {
      background-color: #f8f9fa;
      border-color: #FF8C00;
    }

    .subscription-options .form-check-input:checked+.form-check-label {
      font-weight: bold;
    }

    .subscription-options .form-check-input:checked~.form-check {
      border-color: #FF8C00;
    }

    .plan-features {
      margin-top: 5px;
      margin-left: 20px;
    }

    .plan-features small {
      display: block;
      line-height: 1.4;
    }

    .subscription-options .form-check.selected {
      border-color: #FF8C00;
      background-color: #fff8f0;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const subscriptionInputs = document.querySelectorAll('input[name="subscription_plan"]');

      subscriptionInputs.forEach(input => {
        input.addEventListener('change', function() {
          // Remove selected class from all form-checks
          document.querySelectorAll('.subscription-options .form-check').forEach(el => {
            el.classList.remove('selected');
          });

          // Add selected class to the parent form-check of the checked input
          if (this.checked) {
            this.closest('.form-check').classList.add('selected');
          }
        });

        // Initialize selected state for the pre-selected plan
        if (input.checked) {
          input.closest('.form-check').classList.add('selected');
        }
      });
    });
  </script>
@endsection
