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
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::get('/google-auth/redirect', function () {
    // Forzar nueva selección de cuenta y limpiar caché
    $googleUrl = Socialite::driver('google')->redirect()->getTargetUrl();
    $googleUrl .= '&prompt=select_account&access_type=offline';

    return redirect($googleUrl);
});

Route::get('/google-auth/callback', function () {
    try {
        $user_google = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $user_google->id
        ], [
            'name' => $user_google->name,
            'email' => $user_google->email,
            'avatar' => $user_google->avatar,
        ]);

        Auth::login($user);

        session()->flash('success', '¡Has iniciado sesión exitosamente con Google!');
        return redirect()->route('login');
    } catch (\Exception $e) {
        // Si hay error, redirigir al login con mensaje
        return redirect()->route('login')->with('error', 'Error al iniciar sesión con Google. Inténtalo de nuevo.');
    }
});
