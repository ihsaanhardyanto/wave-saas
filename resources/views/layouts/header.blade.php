<div class="container-fluid sticky-top white-nav">
  <header
    class="d-flex align-items-center justify-content-center justify-content-md-between border-bottom mb-4 flex-wrap py-3">
    <a class="d-flex align-items-center col-md-3 mb-md-0 text-dark text-decoration-none mb-2" href="/">
      <img alt="logo.png" src="{{ asset('img/logo_ecofuel.png') }}" style="width:50px;height:auto;">
      <span class="fw-bold fs-3 px-3">Eco Fuelink</span>
    </a>

    <ul class="nav col-12 col-md-auto justify-content-center mb-md-0 mb-2">
      <li><a class="nav-link link-secondary fw-bold px-5" href="#eco-fuelink">What is Eco Fuel ?</a></li>
      <li><a class="nav-link link-dark fw-bold px-5" href="#benefits">Benefits</a></li>
      <li><a class="nav-link link-dark fw-bold px-5" href="#reviews">Reviews</a></li>
      <li><a class="nav-link link-dark fw-bold px-5" href="#pricings">Pricing</a></li>
    </ul>

    <div class="col-md-3 text-end">
      <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
      <a class="btn btn-primary" href="{{ route('register') }}">Sign-up</a>
    </div>
  </header>
</div>
