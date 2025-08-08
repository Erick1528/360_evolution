<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{

    public $name;
    public $email;
    public $subject;
    public $message;
    
    // Variables para controlar la visibilidad de las alertas
    public $showSuccess = true;
    public $showError = true;

    public $rules = [
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|min:3|max:255',
        'message' => 'required|string|min:10|max:1000',
    ];

    protected $messages = [
        // Mensajes para el campo 'name'
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser un texto válido.',
        'name.min' => 'El nombre debe tener al menos 2 caracteres.',
        'name.max' => 'El nombre no puede tener más de 255 caracteres.',

        // Mensajes para el campo 'email'
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Ingresa un correo electrónico válido.',
        'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',

        // Mensajes para el campo 'subject'
        'subject.required' => 'El asunto es obligatorio.',
        'subject.string' => 'El asunto debe ser un texto válido.',
        'subject.min' => 'El asunto debe tener al menos 3 caracteres.',
        'subject.max' => 'El asunto no puede tener más de 255 caracteres.',

        // Mensajes para el campo 'message'
        'message.required' => 'El mensaje es obligatorio.',
        'message.string' => 'El mensaje debe ser un texto válido.',
        'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
        'message.max' => 'El mensaje no puede tener más de 1000 caracteres.',
    ];

    public function mount() {}

    public function submit()
    {
        $this->validate();

        // Resetear la visibilidad de las alertas
        $this->showSuccess = true;
        $this->showError = true;

        // Enviar correo electrónico simple
        try {
            Mail::raw("
                Nuevo mensaje de contacto:
                
                Nombre: {$this->name}
                Email: {$this->email}
                Asunto: {$this->subject}
                
                Mensaje:
                {$this->message}
            ", function ($message) {
                $message->to('ejosuemenjivar@gmail.com') // Cambia por tu email
                        ->subject('Nuevo mensaje de contacto: ' . $this->subject)
                        ->from($this->email, $this->name);
            });

            // Limpiar el formulario después del envío
            $this->reset(['name', 'email', 'subject', 'message']);
            
            session()->flash('success', '¡Mensaje enviado correctamente!');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al enviar el mensaje. Inténtalo de nuevo.');
        }
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
