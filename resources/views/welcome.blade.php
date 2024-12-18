@extends('layouts.master')

@section('content')
  <!-- What is Eco-Fuelink ? -->
  <section class="d-flex justify-content-end align-items-center green-box mb-5" id="eco-fuelink">
    <div class="flex-grow-1">
      <p class="title px-5 text-end">What is Eco-Fuelink ?</p>
      <p class="fs-4 px-5 text-end">Sebuah platform berbasis langganan yang mendukung transisi menuju transportasi
        berkelanjutan dengan memadukan konsumsi bahan bakar gas dan pengembangan infrastruktur EV.</p>
    </div>
    <div class="flex-shrink-1">
      <img alt="evlandingpage.jpg" class="" src="{{ asset('img/ev_landingpage.jpg') }}">
    </div>
  </section>

  <!-- Benefits -->
  <section class="mb-5 mt-5" id="benefits">
    <div class="justify-content-center my-5 mb-5">
      <p class="title px-5 pt-5 text-center">Benefits</p>
    </div>
    <div class="d-flex justify-content-center mt-5">
      <div class="border-3 rounded-3 benefit mx-5 rounded border px-5 py-5 text-center">
        <img alt="env_icon" src="{{ asset('img/environtment_icon.png') }}" style="width:150px;height:auto;">
        <p class="title-benefit py-5">Environment</p>
        <p class="content-benefit py-5">Mengurangi emisi karbon dengan mendanai pembangunan stasiun pengisian EV.</p>
      </div>
      <div class="border-3 rounded-3 benefit mx-5 rounded border px-5 py-5 text-center">
        <img alt="eco_icon" src="{{ asset('img/economic_icon.png') }}" style="width:150px;height:auto;">
        <p class="title-benefit py-5">Economic</p>
        <p class="content-benefit py-5">Meningkatkan aksesibilitas infrastruktur EV di wilayah-wilayah yang membutuhkan.
        </p>
      </div>
    </div>
  </section>

  <!-- Reviews -->
  <section class="review-container mb-5 mt-5" id="reviews">
    <div class="justify-content-center my-5">
      <p class="title-two px-5 pt-5 text-center">Reviews</p>
    </div>
    <div class="d-flex justify-content-center mt-5 py-5">
      <div class="border-3 rounded-3 review mx-5 rounded border px-5 py-5 text-center">
        <img alt="env_icon" src="{{ asset('img/user_icon.png') }}" style="width:100px;height:auto;">
        <p class="title-benefit py-5">Asep Surecep</p>
        <p class="content-benefit">Aplikasi inovatif untuk mendukung infrastruktur kendaraan listrik yang berkelanjutan!
        </p>
        <div class="rating align-items-end mt-5">
          <span class="py-5"><img alt="star_icon" src="{{ asset('img/star_icon.png') }}"
              style="width:50px;height:auto;"></span>
          <span class="mx-3">4.5</span>
        </div>

      </div>
      <div class="border-3 rounded-3 review mx-5 rounded border px-5 py-5 text-center">
        <img alt="eco_icon" src="{{ asset('img/user_icon.png') }}" style="width:100px;height:auto;">
        <p class="title-benefit py-5">Ade Surade</p>
        <p class="content-benefit">Mudah digunakan, transparan, dan mendorong masa depan hijau.</p>
        <div class="rating align-items-end mt-5">
          <span class="py-5"><img alt="star_icon" src="{{ asset('img/star_icon.png') }}"
              style="width:50px;height:auto;"></span>
          <span class="mx-3">5.0</span>
        </div>
      </div>
      <div class="border-3 rounded-3 review mx-5 rounded border px-5 py-5 text-center">
        <img alt="eco_icon" src="{{ asset('img/user_icon.png') }}" style="width:100px;height:auto;">
        <p class="title-benefit py-5">Otong Surotong</p>
        <p class="content-benefit">Cara cerdas membantu pembangunan stasiun pengisian kendaraan listrik bersama.</p>
        <div class="rating align-items-end mt-5">
          <span class="py-5"><img alt="star_icon" src="{{ asset('img/star_icon.png') }}"
              style="width:50px;height:auto;"></span>
          <span class="mx-3">4.7</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricings -->
  <section class="container my-5" id="pricings">
    <div class="row mb-5 text-center">
      <div class="col-12">
        <h2 class="title">Subscriptions</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Basic Plan -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 p-4 text-center">
          <div class="card-body d-flex flex-column">

            <div class="mb-4">
              <img alt="Basic Plan" class="img-fluid" src="{{ asset('img/fuel_tank_icon.png') }}" style="width: 150px">
            </div>


            <h3 class="card-title mb-4">Basic</h3>


            <ul class="mb-4 text-start">
              <li class="mb-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                Fuel refill limit 15 L/month
              </li>
              <li class="mb-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                Diskon 10% pengisian tambahan
              </li>
            </ul>


            <div class="mt-auto">
              <button class="btn btn-primary btn-lg w-100">Rp.100k / month</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Premium Plan -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 p-4 text-center">
          <div class="card-body d-flex flex-column">
            <div class="mb-4">
              <img alt="Premium Plan" class="img-fluid" src="{{ asset('img/oil_rig_icon.png') }}"
                style="width: 150px">
            </div>
            <h3 class="card-title mb-4">Premium</h3>
            <ul class="mb-4 text-start">
              <li class="mb-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                Fuel refill limit 50 L/month
              </li>
              <li class="mb-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                Diskon 20% pengisian tambahan
              </li>
              <!-- <li class="mb-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                Akses waiting lounge
              </li> -->
              <li class="mb-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                Poin loyalitas
              </li>
            </ul>
            <div class="mt-auto">
              <button class="btn btn-primary btn-lg w-100">Rp.250k / month</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
