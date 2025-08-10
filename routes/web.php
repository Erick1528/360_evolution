<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscoverController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
})->name('home');

// Public pages
Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('discover', [DiscoverController::class, 'index'])->name('discover');
Route::get('contact', [ContactController::class, 'index'])->name('contact');

// Auth
Route::get('login', [AuthController::class, 'login'])->name('login');

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'google_id' => $user_google->id
    ],
        [
            'name' => $user_google->name,
            'email' => $user_google->email,
        ]);

    Auth::login($user);

    return redirect()->route('discover');
});
