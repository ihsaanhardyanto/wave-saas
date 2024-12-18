@extends('layouts.master')

@section('content')

<!-- What is Eco-Fuelink ? -->
<section id="eco-fuelink" class="d-flex justify-content-end align-items-center green-box mb-5">
    <div class="flex-grow-1">
        <p class="text-end px-5 title">What is Eco-Fuelink ?</p>
        <p class="fs-4 text-end px-5 ">Sebuah platform berbasis langganan yang mendukung transisi menuju transportasi berkelanjutan dengan memadukan konsumsi bahan bakar gas dan pengembangan infrastruktur EV.</p>
    </div>
    <div class="flex-shrink-1 ">
        <img src="{{ asset("img/ev_landingpage.jpg")}}" class="" alt="evlandingpage.jpg">
    </div>    
</section>

<!-- Benefits -->
<section id="benefits" class="mb-5 mt-5">
    <div class="mb-5 my-5 justify-content-center">
        <p class="text-center px-5 pt-5 title">Benefits</p>        
    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 benefit text-center">
            <img src="{{ asset("img/environtment_icon.png") }}" style="width:150px;height:auto;" alt="env_icon">
            <p class="title-benefit py-5">Environment</p>
            <p class="content-benefit py-5">Mengurangi emisi karbon dengan mendanai pembangunan stasiun pengisian EV.</p>
        </div>
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 benefit text-center">
            <img src="{{ asset("img/economic_icon.png") }}" style="width:150px;height:auto;" alt="eco_icon">
            <p class="title-benefit py-5">Economic</p>
            <p class="content-benefit py-5">Meningkatkan aksesibilitas infrastruktur EV di wilayah-wilayah yang membutuhkan.</p>
        </div>
    </div>
</section>

<!-- Reviews -->
<section id="reviews" class="review-container mb-5 mt-5">
    <div class="my-5 justify-content-center">
        <p class="text-center px-5 pt-5 title-two">Reviews</p>        
    </div>
    <div class="d-flex justify-content-center mt-5 py-5">
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 review text-center">
            <img src="{{ asset("img/user_icon.png") }}" style="width:100px;height:auto;" alt="env_icon">
            <p class="title-benefit py-5">Asep Surecep</p>
            <p class="content-benefit">Aplikasi inovatif untuk mendukung infrastruktur kendaraan listrik yang berkelanjutan!</p>
            <div class="rating mt-5 align-items-end">
                <span class="py-5"><img src="{{ asset("img/star_icon.png") }}" style="width:50px;height:auto;" alt="star_icon"></span>
                <span class="mx-3">4.5</span>
            </div>

        </div>
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 review text-center">
            <img src="{{ asset("img/user_icon.png") }}" style="width:100px;height:auto;" alt="eco_icon">
            <p class="title-benefit py-5">Ade Surade</p>
            <p class="content-benefit">Mudah digunakan, transparan, dan mendorong masa depan hijau.</p>
            <div class="rating mt-5 align-items-end">
                <span class="py-5"><img src="{{ asset("img/star_icon.png") }}" style="width:50px;height:auto;" alt="star_icon"></span>
                <span class="mx-3">5.0</span>
            </div>
        </div>
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 review text-center">
            <img src="{{ asset("img/user_icon.png") }}" style="width:100px;height:auto;" alt="eco_icon">
            <p class="title-benefit py-5">Otong Surotong</p>
            <p class="content-benefit">Cara cerdas membantu pembangunan stasiun pengisian kendaraan listrik bersama.</p>
            <div class="rating mt-5 align-items-end">
                <span class="py-5"><img src="{{ asset("img/star_icon.png") }}" style="width:50px;height:auto;" alt="star_icon"></span>
                <span class="mx-3">4.7</span>
            </div>
        </div>
    </div>
</section>

<!-- Pricings -->
<section id="pricings" class="mb-5 mt-5">
    <div class="mb-5 my-5 justify-content-center">
        <p class="text-center px-5 pt-5 title">Subscriptions</p>        
    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 benefit text-center">
            <div class="logo-subs">
                <img src="{{ asset("img/charging_icon.png") }}" style="width:150px;height:auto;" alt="env_icon">
            </div>
            <div class="subs-title">
                <p class="title-benefit py-5">Basic</p>
            </div>
            <div class="subs-list">
                <ul class="subscription-list text-start">
                    <li>Limit charging 100 kWh</li>
                    <li>Diskon 10% pengisian tambahan</li>
                </ul>
            </div>
            <div class="subs-btn">
                <button role="button" class="btn btn-primary btn-subs" href="">Subscribe</button>
            </div>
        </div>
        <div class="mx-5 py-5 px-5 border border-3 rounded rounded-3 benefit text-center">
            <div class="logo-subs">
                <img src="{{ asset("img/fast_charging_icon.png") }}" style="width:150px;height:auto;" alt="eco_icon">
            </div>
            <div class="subs-title">
                <p class="title-benefit py-5">Premium</p>
            </div>
            <div class="subs-list">
                <ul class="subscription-list text-start">
                    <li>Limit charging 300 kWh</li>
                    <li>Diskon 20% pengisian tambahan</li>
                    <li>Akses waiting lounge</li>
                    <li>Poin loyalitas</li>
                </ul>
            </div>
            <div class="subs-btn">
                <button role="button" class="btn btn-primary btn-subs" href="">Subscribe</button>
            </div>
        </div>
    </div>
</section>

@endsection