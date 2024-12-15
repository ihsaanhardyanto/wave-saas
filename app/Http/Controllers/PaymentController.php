<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function createSubscription(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);


        $payment = Payment::create([
            'user_id' => Auth::id(),
            'subscription_id' => $subscription->id,
            'payment_status' => 'pending',
        ]);


        return redirect()->route('payment.success')->with('success', 'Payment completed successfully.');
    }

    public function success()
    {
        return view('payment.success');
    }
}
