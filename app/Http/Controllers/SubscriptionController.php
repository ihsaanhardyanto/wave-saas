<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        // Set your Midtrans server key
        Config::$serverKey = config('services.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public function showPayment(Request $request)
    {
        return view('subscription.payment', [
            'user_id' => Auth::id(),
            'subscription_plan' => $request->subscription_plan
        ]);
    }

    public function createPayment(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $amount = $request->subscription_plan === 'premium' ? 250000 : 100000;

        $transaction_details = [
            'order_id' => 'SUBS-' . uniqid(),
            'gross_amount' => $amount
        ];

        $item_details = [
            [
                'id' => $request->subscription_plan,
                'price' => $amount,
                'quantity' => 1,
                'name' => ucfirst($request->subscription_plan) . ' Subscription'
            ]
        ];

        $customer_details = [
            'first_name' => $user->name,
            'email' => $user->email,
        ];

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction_data);

            return response()->json([
                'status' => 'success',
                'snap_token' => $snapToken
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        $json = json_decode($request->getContent());

        $signatureKey = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . config('services.midtrans.server_key'));

        if ($signatureKey !== $json->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $orderId = $json->order_id;
        $transactionStatus = $json->transaction_status;
        $fraudStatus = $json->fraud_status;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                // TODO: handle challenge payment
            } else if ($fraudStatus == 'accept') {
                // TODO: handle successful payment
                // Activate user subscription
            }
        } else if ($transactionStatus == 'settlement') {
            // TODO: handle successful payment
            // Activate user subscription
        } else if (
            $transactionStatus == 'cancel' ||
            $transactionStatus == 'deny' ||
            $transactionStatus == 'expire'
        ) {
            // TODO: handle failed payment
        } else if ($transactionStatus == 'pending') {
            // TODO: handle pending payment
        }

        return response()->json(['message' => 'Payment callback handled successfully']);
    }
}