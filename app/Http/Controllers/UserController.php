<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $remainingGas = $user->gas_limit - $user->gas_used;
        return view('user.dashboard', compact('user', 'remainingGas'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        $data = $request->only(['name', 'email']);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        $user->update($data);
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}
