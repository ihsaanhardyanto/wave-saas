<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'subscription_plan' => ['required', 'in:basic,premium'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gas_limit' => 255,
            'subscription_status' => 'pending',
            'subscription_plan' => $request->subscription_plan,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect to payment page instead of dashboard
        return redirect()->route('subscription.payment', [
            'user_id' => $user->id,
            'subscription_plan' => $request->subscription_plan
        ]);
    }
}