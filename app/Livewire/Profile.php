<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $editing = false;
    public $name;
    public $avatar;
    public $newAvatar;
    
    // Mensajes de estado
    public $showSuccess = false;
    public $showError = false;

    protected $rules = [
        'name' => 'required|string|min:2|max:255',
        'newAvatar' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048|dimensions:min_width=50,min_height=50,max_width=5000,max_height=5000',
    ];

    protected $messages = [
        // Mensajes para el campo 'name'
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser texto válido.',
        'name.min' => 'El nombre debe tener al menos 2 caracteres.',
        'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        
        // Mensajes para el campo 'newAvatar'
        'newAvatar.image' => 'El archivo debe ser una imagen válida.',
        'newAvatar.mimes' => 'La imagen debe ser de tipo: JPEG, JPG, PNG, GIF o WebP.',
        'newAvatar.max' => 'La imagen no puede ser mayor a 2MB.',
        'newAvatar.uploaded' => 'Error al subir la imagen. Inténtalo de nuevo.',
        'newAvatar.file' => 'Debe seleccionar un archivo válido.',
        'newAvatar.dimensions' => 'La imagen debe tener entre 50x50 y 5000x5000 píxeles.',
        'newAvatar.distinct' => 'La imagen ya ha sido seleccionada.',
        'newAvatar.between' => 'El tamaño de la imagen debe estar entre 1KB y 2MB.',
        'newAvatar.required_if' => 'Debe seleccionar una imagen.',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->avatar = $this->user->avatar;
    }

    public function toggleEdit()
    {
        $this->editing = !$this->editing;
        
        // Resetear valores cuando cancela la edición
        if (!$this->editing) {
            $this->name = $this->user->name;
            $this->newAvatar = null;
            $this->resetValidation();
        }
    }

    public function updateProfile()
    {
        $this->validate();

        try {
            $updateData = [
                'name' => $this->name,
            ];

            // Solo procesar avatar si es cuenta de correo (no Google) y hay nueva imagen
            if (!$this->user->google_id && $this->newAvatar) {
                // Eliminar avatar anterior si existe y no es de Google
                if ($this->user->avatar && !str_contains($this->user->avatar, 'googleusercontent.com')) {
                    $oldAvatarPath = str_replace('/storage/', '', $this->user->avatar);
                    if (Storage::disk('public')->exists($oldAvatarPath)) {
                        Storage::disk('public')->delete($oldAvatarPath);
                    }
                }

                // Optimizar y convertir imagen a WebP
                $optimizedImagePath = $this->optimizeAndConvertImage($this->newAvatar);
                $updateData['avatar'] = '/storage/' . $optimizedImagePath;
            }

            $this->user->update($updateData);

            // Actualizar la variable user con los nuevos datos
            $this->user = $this->user->fresh();
            $this->avatar = $this->user->avatar;

            $this->editing = false;
            $this->newAvatar = null;
            
            session()->flash('success', '¡Perfil actualizado exitosamente!');
            $this->showSuccess = true;
            $this->showError = false;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al actualizar el perfil. Inténtalo de nuevo.');
            $this->showError = true;
            $this->showSuccess = false;
        }
    }

    private function optimizeAndConvertImage($uploadedFile)
    {
        // Generar nombre único y seguro
        $userId = $this->user->id;
        $timestamp = time();
        $randomString = bin2hex(random_bytes(8)); // 16 caracteres aleatorios
        $fileName = "avatar_{$userId}_{$timestamp}_{$randomString}.webp";
        
        // Crear el directorio si no existe
        $avatarsPath = storage_path('app/public/avatars');
        if (!file_exists($avatarsPath)) {
            mkdir($avatarsPath, 0755, true);
        }
        
        $filePath = $avatarsPath . '/' . $fileName;
        
        // Obtener el tipo MIME del archivo
        $mimeType = $uploadedFile->getMimeType();
        
        // Crear imagen desde el archivo subido
        switch ($mimeType) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($uploadedFile->getPathname());
                break;
            case 'image/png':
                $image = imagecreatefrompng($uploadedFile->getPathname());
                break;
            case 'image/gif':
                $image = imagecreatefromgif($uploadedFile->getPathname());
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($uploadedFile->getPathname());
                break;
            default:
                throw new \Exception('Formato de imagen no soportado');
        }
        
        if (!$image) {
            throw new \Exception('No se pudo procesar la imagen');
        }
        
        // Obtener dimensiones originales
        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);
        
        // Calcular nuevas dimensiones (máximo 300px manteniendo aspecto)
        $maxSize = 300;
        if ($originalWidth > $originalHeight) {
            $newWidth = $maxSize;
            $newHeight = intval(($originalHeight * $maxSize) / $originalWidth);
        } else {
            $newHeight = $maxSize;
            $newWidth = intval(($originalWidth * $maxSize) / $originalHeight);
        }
        
        // Crear imagen redimensionada
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // Mantener transparencia para PNG
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        
        // Redimensionar imagen
        imagecopyresampled(
            $resizedImage, $image,
            0, 0, 0, 0,
            $newWidth, $newHeight,
            $originalWidth, $originalHeight
        );
        
        // Guardar como WebP con calidad 85
        imagewebp($resizedImage, $filePath, 85);
        
        // Liberar memoria
        imagedestroy($image);
        imagedestroy($resizedImage);
        
        return 'avatars/' . $fileName;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
