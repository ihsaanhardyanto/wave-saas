<!doctype html>
@php
  use Illuminate\Support\Facades\Route;
  use Illuminate\Support\Facades\Auth;
@endphp

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <!-- CSRF Token -->
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>{{ config('app.name', 'Eco Fuelink') }}</title>

  <!-- Fonts -->
  <link href="//fonts.bunny.net" rel="dns-prefetch">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img alt="" src="{{ asset('img/logo_ecofuel.png') }}" style="width:50px;height:auto;">
          <span class="fw-bold fs-3 px-3">{{ config('Eco Fuelink', 'Eco Fuelink') }}</span>
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"
          class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ">
                        <li><a href="#" class="nav-link px-5 link-dark fw-bold">Navbar 1</a></li>
                        <li><a href="#" class="nav-link px-5 link-dark fw-bold">Navbar 2</a></li>
                        <li><a href="#" class="nav-link px-5 link-dark fw-bold">Navbar 3</a></li>
                        <li><a href="#" class="nav-link px-5 link-dark fw-bold">Navbar 4</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest 
                            
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                  <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>

    <!-- Footer -->
    <div class="container-fluid">
      <footer class="my-4 py-3">
        <p class="text-body-secondary border-top mt-3 pt-3 text-center">© 2024 Eco-Fuelink, Inc</p>
      </footer>
    </div>
  </div>
</body>

</html>
