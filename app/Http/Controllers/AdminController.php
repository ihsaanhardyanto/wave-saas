<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.dashboard', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $subscriptions = Subscription::all();
        return view('admin.edit-user', compact('user', 'subscriptions'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'subscription_id' => 'nullable|exists:subscriptions,id',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'subscription_id']));
        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
