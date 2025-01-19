@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Complete Payment') }}</div>
          <div class="card-body">
            <div class="mb-4 text-center">
              <h4>{{ ucfirst($subscription_plan) }} Plan</h4>
              <p class="lead">
                @if ($subscription_plan === 'basic')
                  Rp 100.000/month
                @else
                  Rp 250.000/month
                @endif
              </p>
              <div class="alert alert-info">
                Please complete your payment to activate your subscription.
              </div>
            </div>

            <!-- Payment loading indicator -->
            <div class="mb-3 text-center" id="payment-loading">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading payment...</span>
              </div>
              <p class="mt-2">Initializing payment gateway...</p>
            </div>

            <!-- Snap container for Midtrans -->
            <div class="text-center" id="snap-container"></div>

            <!-- Error message container -->
            <div class="alert alert-danger mt-3" id="error-message" style="display: none;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Midtrans Snap JS -->
  <script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Create payment token
      fetch('/subscription/create-payment', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            user_id: '{{ $user_id }}',
            subscription_plan: '{{ $subscription_plan }}'
          })
        })
        .then(response => response.json())
        .then(data => {
          // Hide loading indicator
          document.getElementById('payment-loading').style.display = 'none';

          if (data.status === 'success' && data.snap_token) {
            // Initialize snap payment
            snap.pay(data.snap_token, {
              onSuccess: function(result) {
                handlePaymentSuccess(result);
              },
              onPending: function(result) {
                handlePaymentPending(result);
              },
              onError: function(result) {
                handlePaymentError(result);
              },
              onClose: function() {
                handlePaymentClosed();
              }
            });
          } else {
            throw new Error(data.message || 'Failed to initialize payment');
          }
        })
        .catch(error => {
          document.getElementById('payment-loading').style.display = 'none';
          document.getElementById('error-message').textContent = 'Error initializing payment: ' + error.message;
          document.getElementById('error-message').style.display = 'block';
        });
    });

    function handlePaymentSuccess(result) {
      // Redirect to dashboard or success page
      window.location.href = '{{ route('dashboard') }}?payment=success';
    }

    function handlePaymentPending(result) {
      // Show pending payment instructions
      window.location.href = '{{ route('dashboard') }}?payment=pending';
    }

    function handlePaymentError(result) {
      document.getElementById('error-message').textContent = 'Payment failed: ' + result.status_message;
      document.getElementById('error-message').style.display = 'block';
    }

    function handlePaymentClosed() {
      // Optional: Handle when user closes the payment popup without completing
      console.log('Payment popup closed');
    }
  </script>

  <style>
    .card {
      border: none;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #fff;
      border-bottom: 2px solid #f8f9fa;
      padding: 1.5rem;
      font-weight: 600;
      font-size: 1.2rem;
    }

    .spinner-border {
      width: 3rem;
      height: 3rem;
    }

    .alert {
      border-radius: 8px;
    }

    .btn-primary {
      padding: 0.8rem 2rem;
      font-weight: 600;
    }
  </style>
@endsection
