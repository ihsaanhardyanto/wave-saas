<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Route::middleware(['auth', 'role:user'])->group(function () {
//     // // User routes
//     // Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
//     // Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
//     // Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

//     // Jika Anda masih membutuhkan ProfileController routes
//     Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
//     Route::get('/profile/', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
// });

Route::middleware(['auth', 'role:user'])->group(function () {
    // Profile routes
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});