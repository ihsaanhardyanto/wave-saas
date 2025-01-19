@extends('layouts.dashboardmaster')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-3">Dashboard</h2>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Gas Usage</h4>

            <!-- Gas Limit and Usage Bar -->
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <span>Gas Used: {{ $user->gas_used }} / {{ $user->gas_limit }}</span>
                    <span>
                        @if($user->gas_limit > 0)
                            {{ number_format(($user->gas_used / $user->gas_limit) * 100, 2) }}%
                        @else
                            N/A
                        @endif
                    </span>
                </div>
                <!-- style="width: {{ $user->gas_limit > 0 ? ($user->gas_used / $user->gas_limit) * 100 : 0 }}%;" -->
                <div class="progress">
                    <!-- <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $user->gas_used / $user->gas_limit * 100}}%;" aria-valuenow="{{ $user->gas_used }}" aria-valuemin="0" aria-valuemax="{{ $user->gas_limit }}">
                    </div> -->
                    <div class="progress-bar bg-primary" style="width: {{ $user->gas_limit > 0 ? ($user->gas_used / $user->gas_limit) * 100 : 0 }}%;"></div>
                </div>
            </div>

            <!-- QR Code Generator -->
            <div>
                <h4 class="card-title">Generate QR for Gas Refill</h4>
                <form id="qr-form" method="POST" action="/generate-qr">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Enter Gas Refill Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control"
                               placeholder="Enter amount (e.g., 1, 2)"
                               min="1"
                               max="{{ $user->gas_limit > $user->gas_used ? $user->gas_limit - $user->gas_used : 0 }}"
                               required>
                    </div>
                    <button type="submit" class="btn btn-primary"
                            @if($user->gas_limit <= $user->gas_used) disabled @endif>
                        Generate QR Code
                    </button>
                </form>

                @if(session('qr_code'))
                <div class="mt-4 text-center">
                    <h5>Scan QR Code:</h5>
                    <!-- <img src="data:image/png;base64,{{ session('qr_code') }}" alt="QR Code"> -->
                    {!! session('qr_code') !!}
                </div>
                <div class="mt-3 mb-5 text-center">
                    <form method="POST" action="{{ route('process-qr') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary px-3 py-1 fw-bold fs-3">Use QR</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
