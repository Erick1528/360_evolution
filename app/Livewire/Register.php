<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $showPassword = false;
    public $showPasswordConfirmation = false;
    public $showSuccess = true;
    public $showError = true;

    public $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];

    public $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser texto válido.',
        'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Debe ser un correo electrónico válido.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'password_confirmation.required' => 'La confirmación de contraseña es obligatoria.',
    ];

    public function submit()
    {
        // Resetear la visibilidad de las alertas
        $this->showSuccess = true;
        $this->showError = true;

        // PRIMERO: Verificar si el correo ya existe y si está vinculado a Google
        if ($user = User::where('email', $this->email)->first()) {
            if ($user->google_id) {
                session()->flash('error', 'Esta cuenta ya existe y está vinculada a Google. Por favor, inicia sesión con Google.');
                return;
            } else {
                // Si existe pero no tiene google_id, es una cuenta normal duplicada
                $this->addError('email', 'Este correo electrónico ya está registrado.');
                return;
            }
        }

        // SEGUNDO: Si el email no existe, proceder con las demás validaciones
        $this->validate();

        // Crear el usuario
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Limpiar los campos del formulario
        $this->reset(['name', 'email', 'password', 'password_confirmation']);

        session()->flash('success', '¡Tu cuenta ha sido creada exitosamente!');
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function togglePasswordConfirmationVisibility()
    {
        $this->showPasswordConfirmation = !$this->showPasswordConfirmation;
    }

    public function render()
    {
        return view('livewire.register');
    }
}
