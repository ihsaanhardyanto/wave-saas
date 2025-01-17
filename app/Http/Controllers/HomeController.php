<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    /**
     * Generate a QR code for gas refill.
     */
    public function generateQRCode(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|integer|min:1|max:' . ($user->gas_limit - $user->gas_used),
        ]);

        $amount = $request->input('amount');

        $qrData = [
            'user_id' => $user->id,
            'amount' => $amount,
        ];

        $qrCode = base64_encode(QrCode::size(200)->generate(json_encode($qrData)));

        return back()->with('qr_code', $qrCode);
    }

    /**
     * Process the QR code scan.
     */
    public function processQRCode(Request $request)
    {
        $qrData = json_decode($request->input('qr_data'), true);

        $user = User::find($qrData['user_id']);
        $amount = $qrData['amount'];

        if (!$user || ($user->gas_used + $amount > $user->gas_limit)) {
            return response()->json(['message' => 'Invalid request or gas limit exceeded'], 400);
        }

        $user->gas_used += $amount;
        $user->save();

        return response()->json(['message' => 'Gas usage updated successfully'], 200);
    }
}
