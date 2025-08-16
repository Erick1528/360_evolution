<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;

class Login extends Component
{

    public $email;
    public $password;
    public $showPassword = false;

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

        // Verificar que la cuenta no este vinculada a Google
        if ($user = User::where('email', $this->email)->first()) {
            if ($user->google_id) {
                session()->flash('error', 'Esta cuenta está vinculada a Google. Inicia sesión con Google.');
                $this->email = ''; // Limpiar el campo de email
                $this->password = ''; // Limpiar el campo de contraseña
                return;
            }
        }

        // Intentar autenticación
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate(); // Regenerar sesión para mayor seguridad
            RateLimiter::clear($rateLimiterKey); // Limpiar intentos fallidos
            $this->password = ''; // Limpiar contraseña
            session()->flash('success', '¡Has iniciado sesión correctamente!');
            return redirect()->route('/'); // Redirigir al home
        }

        // Incrementar contador de intentos fallidos
        RateLimiter::hit($rateLimiterKey);

        $this->password = ''; // Limpiar contraseña

        // Retornar error genérico
        session()->flash('error', 'El correo o la contraseña no son correctos.');
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.login');
    }
}
