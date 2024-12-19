@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Profile') }}</div>

          <div class="card-body">
            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
              <div class="col-md-6">
                <p class="form-control-static">{{ $user->name }}</p>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
              <div class="col-md-6">
                <p class="form-control-static">{{ $user->email }}</p>
              </div>
            </div>

            @if (Auth::id() === $user->id)
              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <a class="btn btn-primary" href="{{ route('profile.edit', $user) }}">
                    {{ __('Edit Profile') }}
                  </a>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
