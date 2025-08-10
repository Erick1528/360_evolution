<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{

    public $email;
    public $password;

    // Variables para controlar la visibilidad de las alertas
    public $showSuccess = true;
    public $showError = true;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public $messages = [
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Debe ser un correo electrónico válido.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
    ];

    public function submit()
    {
        $this->validate();

        // Resetear la visibilidad de las alertas
        $this->showSuccess = true;
        $this->showError = true;

        // Protección contra fuerza bruta
        $rateLimiterKey = $this->email . '|' . request()->ip(); // Clave única para el RateLimiter
        if (RateLimiter::tooManyAttempts($rateLimiterKey, 5)) {
            session()->flash('error', 'Demasiados intentos fallidos. Inténtalo de nuevo más tarde.');
            return;
        }

        // Intentar autenticación
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate(); // Regenerar sesión para mayor seguridad
            RateLimiter::clear($rateLimiterKey); // Limpiar intentos fallidos
            $this->password = ''; // Limpiar contraseña
            session()->flash('success', '¡Has iniciado sesión correctamente!');
            return;
        }

        // Incrementar contador de intentos fallidos
        RateLimiter::hit($rateLimiterKey);

        $this->password = ''; // Limpiar contraseña

        // Retornar error genérico
        session()->flash('error', 'El correo o la contraseña no son correctos.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
