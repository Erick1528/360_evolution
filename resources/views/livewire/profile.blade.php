<div class=" 
lg:px-[120px] lg:py-[100px]
sm:px-[40px] sm:py-[50px]
px-[20px] py-[40px] font-[playfair]">

    {{-- Card --}}
    <div class="shadow-[2px_2px_4px_rgba(0,0,0,0.1)] rounded-[10px] flex">

        <div class=" min-w-[10px] rounded-l-[20px] bg-[#0F355E]"></div>

        <div class="  p-8 text-center flex flex-col gap-y-[36px] bg-[#F8F8F8] rounded-r-[10px] w-full">

            <div class=" lg:text-[36px] lg:leading-[43px]
            flex flex-col gap-y-[15px] text-[#0F355E]">
                <h2
                    class=" lg:text-[36px] lg:leading-[43px]
                sm:text-[32px] sm:leading-[38px]
                text-[28px] font-bold leading-[34px] ">
                    Mi Perfil</h2>
                <p class=" lg:text-base lg:leading-[19px] 
                text-[14px] leading-[17px]">
                    @if ($editing)
                        Editando información de tu cuenta
                    @else
                        Información de tu cuenta en Evolución 360º
                    @endif
                </p>
            </div>

            {{-- Mensajes de estado dinámicos --}}
            @if (session()->has('success') && $showSuccess)
                <div
                    class=" max-w-[366px] mx-auto
                    sm:max-w-[500px] lg:w-full lg:mx-auto w-full bg-[#0F355E] text-white px-[20px] py-[15px] rounded-[10px] flex items-center justify-between gap-x-[12px]">
                    <div class="flex items-center justify-start gap-x-[12px]">
                        <img src="{{ asset('build/assets/succes.svg') }}" alt=""
                            class="w-[20px] h-[20px] flex-shrink-0">
                        <p class="lg:text-[14px] lg:leading-[17px] text-[12px] leading-[14px] font-medium">
                            {{ session('success') }}
                        </p>
                    </div>
                    <button wire:click="$set('showSuccess', false)"
                        class="text-white hover:text-[#0F355E] hover:bg-white hover:bg-opacity-90 rounded-full p-1 transition-all duration-200 cursor-pointer">
                        <svg class="w-[16px] h-[16px]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            @if (session()->has('error') && $showError)
                <div
                    class=" max-w-[366px] mx-auto
                    sm:max-w-[500px] lg:w-full lg:mx-auto w-full bg-[#EF4444] text-white px-[20px] py-[15px] rounded-[10px] flex items-center justify-between gap-x-[12px]">
                    <div class="flex items-center justify-start gap-x-[12px]">
                        <img src="{{ asset('build/assets/errorwhite.svg') }}" alt=""
                            class="w-[20px] h-[20px] flex-shrink-0">
                        <p class="lg:text-[14px] lg:leading-[17px] text-[12px] leading-[14px] font-medium">
                            {{ session('error') }}
                        </p>
                    </div>
                    <button wire:click="$set('showError', false)"
                        class="text-white hover:text-[#EF4444] hover:bg-white hover:bg-opacity-90 rounded-full p-1 transition-all duration-200 cursor-pointer">
                        <svg class="w-[16px] h-[16px]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            @auth
                <div class=" sm:max-w-[500px]
                max-w-[366px] w-full mx-auto flex flex-col gap-y-[30px]">

                    {{-- Avatar --}}
                    <div class="flex flex-col items-center gap-y-[20px]">
                        <div class="relative">
                            <div
                                class="w-[120px] h-[120px] rounded-full overflow-hidden bg-[#E5E7EB] flex items-center justify-center">
                                @if ($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="Avatar de {{ $user->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    {{-- Avatar predeterminado --}}
                                    <svg class="w-[60px] h-[60px] text-[#9CA3AF]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>

                            {{-- Botón de cambio de avatar solo para cuentas de correo y en modo vista --}}
                            @if (!$user->google_id && !$editing)
                                <button wire:click="toggleEdit"
                                    class="absolute bottom-0 right-0 w-[35px] h-[35px] bg-[#0F355E] rounded-full flex items-center justify-center hover:bg-[#1a4b73] transition-colors duration-200 shadow-lg">
                                    <svg class="w-[18px] h-[18px] text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                            @endif
                        </div>

                        {{-- Estado de conexión con Google --}}
                        @if ($user->google_id)
                            <div
                                class="flex items-center gap-x-[8px] bg-[#0F355E] text-white px-[15px] py-[8px] rounded-[20px]">
                                <img src="{{ asset('build/assets/google.svg') }}" alt="Google" class="w-[16px] h-[16px]">
                                <p class="text-[12px] leading-[14px] font-medium">Conectado con Google</p>
                            </div>
                        @else
                            <div
                                class="flex items-center gap-x-[8px] bg-[#6B7280] text-white px-[15px] py-[8px] rounded-[20px]">
                                <img src="{{ asset('build/assets/mail3.svg') }}" alt="Email"
                                    class="w-[16px] h-[16px] filter brightness-0 invert">
                                <p class="text-[12px] leading-[14px] font-medium">Cuenta de correo</p>
                            </div>
                        @endif
                    </div>

                    {{-- Información del Usuario (Vista Visual) --}}
                    @if (!$editing)
                        <div class="flex flex-col gap-y-[25px]">

                            {{-- Nombre --}}
                            <div class="text-center">
                                <h3
                                    class="lg:text-[28px] lg:leading-[34px] text-[24px] leading-[29px] font-bold text-[#0F355E]">
                                    {{ $user->name }}
                                </h3>
                            </div>

                            {{-- Cards de información --}}
                            <div class="flex flex-col gap-y-[15px]">

                                {{-- Email Card --}}
                                <div
                                    class="border-l-4 border-[#0F355E] bg-white shadow-[2px_2px_8px_rgba(0,0,0,0.1)] rounded-r-[10px] px-[20px] py-[18px]">
                                    <div class="flex items-center gap-x-[12px]">
                                        <div
                                            class="w-[40px] h-[40px] bg-[#0F355E] rounded-full flex items-center justify-center">
                                            <img src="{{ asset('build/assets/mail3.svg') }}" alt=""
                                                class="w-[20px] h-[20px] filter brightness-0 invert">
                                        </div>
                                        <div class="flex-1">
                                            <p
                                                class="text-[12px] leading-[14px] text-[#6B7280] font-medium uppercase tracking-wide">
                                                Correo Electrónico
                                            </p>
                                            <p
                                                class="lg:text-[16px] lg:leading-[19px] text-[14px] leading-[17px] text-[#374151] font-semibold">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fecha Card --}}
                                <div
                                    class="border-l-4 border-[#0369A1] bg-white shadow-[2px_2px_8px_rgba(0,0,0,0.1)] rounded-r-[10px] px-[20px] py-[18px]">
                                    <div class="flex items-center gap-x-[12px]">
                                        <div
                                            class="w-[40px] h-[40px] bg-[#0369A1] rounded-full flex items-center justify-center">
                                            <svg class="w-[20px] h-[20px] text-white" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p
                                                class="text-[12px] leading-[14px] text-[#6B7280] font-medium uppercase tracking-wide">
                                                Miembro desde
                                            </p>
                                            <p
                                                class="lg:text-[16px] lg:leading-[19px] text-[14px] leading-[17px] text-[#374151] font-semibold">
                                                {{ $user->created_at->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endif

                    {{-- Formulario de Edición (Modal Style) --}}
                    @if ($editing)
                        <div
                            class="bg-white border-2 border-[#0F355E] rounded-[20px] p-[25px] shadow-[4px_4px_12px_rgba(0,0,0,0.15)]">
                            <div class="flex flex-col gap-y-[20px]">

                                {{-- Título del formulario --}}
                                <div class="text-center border-b border-[#E5E7EB] pb-[15px]">
                                    <h4
                                        class="lg:text-[20px] lg:leading-[24px] text-[18px] leading-[22px] font-bold text-[#0F355E]">
                                        Editar Información
                                    </h4>
                                    <p class="text-[12px] leading-[14px] text-[#6B7280] mt-[5px]">
                                        @if (!$user->google_id)
                                            Modifica tu nombre y foto de perfil
                                        @else
                                            Modifica tu nombre aquí
                                        @endif
                                    </p>
                                </div>

                                {{-- Campo Avatar (solo para cuentas de correo) --}}
                                @if (!$user->google_id)
                                    <div class="flex flex-col gap-y-[8px]">
                                        <label class="flex items-center justify-start gap-x-[8px]">
                                            <svg class="w-[16px] h-[16px] text-[#0F355E]" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p
                                                class="lg:text-base lg:leading-[19px] text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                                Foto de Perfil
                                            </p>
                                        </label>

                                        {{-- Preview de la imagen (cuando hay imagen seleccionada) --}}
                                        @if ($newAvatar)
                                            <div
                                                class="flex items-center gap-x-[15px] p-[15px] bg-[#F0F9FF] rounded-[10px] border border-[#0369A1] border-opacity-30">
                                                <div class="w-[60px] h-[60px] rounded-full overflow-hidden bg-[#E5E7EB]">
                                                    <img src="{{ $newAvatar->temporaryUrl() }}" alt="Preview"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-[14px] leading-[17px] text-[#0369A1] font-semibold">
                                                        Nueva imagen seleccionada</p>
                                                    <p class="text-[12px] leading-[14px] text-[#6B7280] mt-[2px]">
                                                        {{ $newAvatar->getClientOriginalName() }}</p>
                                                </div>
                                                <button type="button" wire:click="$set('newAvatar', null)"
                                                    class="text-[#EF4444] hover:text-white hover:bg-[#EF4444] hover:bg-opacity-90 rounded-full p-2 transition-all duration-200 cursor-pointer">
                                                    <svg class="w-[16px] h-[16px]" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @else
                                            {{-- Botón de seleccionar imagen (solo cuando no hay imagen) --}}
                                            <div class="relative">
                                                <input wire:model="newAvatar" type="file" accept="image/*"
                                                    id="avatar-upload"
                                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                                <div
                                                    class="flex items-center justify-center px-[15px] py-[12px] h-[50px] rounded-[10px] border-[2px] border-dashed border-[#0F355E] hover:bg-[#F8FAFC] transition-colors duration-200 cursor-pointer">
                                                    <div class="flex items-center gap-x-[8px]">
                                                        <svg class="w-[20px] h-[20px] text-[#0F355E]" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                        </svg>
                                                        <p class="text-[14px] leading-[17px] text-[#0F355E] font-medium">
                                                            Seleccionar imagen
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-[11px] leading-[13px] text-[#6B7280] italic">
                                                Formatos: JPG, PNG, GIF, WebP. Tamaño máximo: 2MB
                                            </p>
                                        @endif

                                        @error('newAvatar')
                                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                                <img src="{{ asset('build/assets/error.svg') }}" alt=""
                                                    class="w-[14px] h-[14px]">
                                                <p class="lg:text-[12px] lg:leading-[14px] text-[11px] leading-[13px]">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                        @enderror
                                    </div>
                                @endif

                                {{-- Campo Nombre --}}
                                <div class="flex flex-col gap-y-[8px]">
                                    <label class="flex items-center justify-start gap-x-[8px]">
                                        <img src="{{ asset('build/assets/person.svg') }}" alt=""
                                            class="w-[16px] h-[16px]">
                                        <p
                                            class="lg:text-base lg:leading-[19px] text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                            Nombre Completo
                                        </p>
                                    </label>
                                    <input wire:model="name" type="text" placeholder="Tu nombre completo"
                                        class="lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] h-[45px] rounded-[10px] border-[2px] 
                                        {{ $errors->has('name') ? 'border-[#EF4444] focus:border-[#EF4444]' : 'border-[#0F355E] focus:border-[#0F355E]' }} 
                                        focus:outline-none transition-colors duration-200">
                                    @error('name')
                                        <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                            <img src="{{ asset('build/assets/error.svg') }}" alt=""
                                                class="w-[14px] h-[14px]">
                                            <p class="lg:text-[12px] lg:leading-[14px] text-[11px] leading-[13px]">
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>

                                {{-- Botones del formulario --}}
                                <div class="flex flex-col gap-y-[10px] sm:flex-row sm:gap-x-[15px] sm:gap-y-0 pt-[10px]">
                                    {{-- Botón Guardar --}}
                                    <button wire:click="updateProfile" type="button"
                                        class="group sm:flex-1 bg-[#0F355E] hover:cursor-pointer lg:px-[25px] lg:py-[10px] lg:text-[16px] lg:leading-[19px]
                                        hover:bg-white text-white font-bold rounded-[25px] px-[20px] py-[10px] text-[14px] leading-[17px]
                                        border-2 border-[#0F355E] relative overflow-hidden transition-colors duration-500 ease-in-out
                                        before:absolute before:top-0 before:left-0 before:w-[60%] before:h-full before:bg-[#0F355E] 
                                        before:transition-transform before:duration-500 before:ease-in-out hover:before:-translate-x-full before:z-10
                                        before:transform before:-skew-x-12
                                        after:absolute after:top-0 after:right-0 after:w-[60%] after:h-full after:bg-[#0F355E]
                                        after:transition-transform after:duration-500 after:ease-in-out hover:after:translate-x-full after:z-10
                                        after:transform after:-skew-x-12
                                        hover:text-[#0F355E] flex justify-center items-center gap-x-[8px]">
                                        <svg class="group-hover:hidden relative transition-none z-20 w-[16px] h-[16px] text-white"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <svg class="hidden group-hover:block relative transition-none z-20 w-[16px] h-[16px] text-[#0F355E]"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="relative z-20 transition-none">Guardar</span>
                                    </button>

                                    {{-- Botón Cancelar --}}
                                    <button wire:click="toggleEdit" type="button"
                                        class="sm:flex-1 bg-transparent hover:cursor-pointer lg:px-[25px] lg:py-[10px] lg:text-[16px] lg:leading-[19px]
                                        hover:bg-[#6B7280] text-[#6B7280] font-bold rounded-[25px] px-[20px] py-[10px] text-[14px] leading-[17px]
                                        border-2 border-[#6B7280] transition-all duration-300 ease-in-out hover:text-white flex justify-center items-center gap-x-[8px]">
                                        <svg class="w-[16px] h-[16px]" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Cancelar</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    @endif

                    {{-- Botones de acción (solo en modo vista) --}}
                    @if (!$editing)
                        <div class="flex flex-col gap-y-[15px] pt-[20px]">

                            {{-- Botón Editar Perfil (solo para cuentas de correo) --}}
                            @if (!$user->google_id)
                                <button wire:click="toggleEdit" type="button"
                                    class="group sm:max-w-[400px] max-w-[366px] w-full bg-[#0F355E] hover:cursor-pointer lg:px-[45px] lg:py-[9px] lg:text-[18px] lg:leading-[22px]
                                    hover:bg-white text-white font-bold rounded-[25px] mx-auto px-[30px] py-[12px] text-base leading-[19px]
                                    border-2 border-[#0F355E] relative overflow-hidden transition-colors duration-500 ease-in-out
                                    before:absolute before:top-0 before:left-0 before:w-[60%] before:h-full before:bg-[#0F355E] 
                                    before:transition-transform before:duration-500 before:ease-in-out hover:before:-translate-x-full before:z-10
                                    before:transform before:-skew-x-12
                                    after:absolute after:top-0 after:right-0 after:w-[60%] after:h-full after:bg-[#0F355E]
                                    after:transition-transform after:duration-500 after:ease-in-out hover:after:translate-x-full after:z-10
                                    after:transform after:-skew-x-12
                                    hover:text-[#0F355E] flex justify-center items-center gap-x-[8px]">
                                    <svg class="group-hover:hidden relative transition-none z-20 w-[16px] h-[16px] text-white"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                    <svg class="hidden group-hover:block relative transition-none z-20 w-[16px] h-[16px] text-[#0F355E]"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                    <span class="relative z-20 transition-none">Editar Perfil</span>
                                </button>
                            @endif

                            {{-- Botón Cerrar Sesión --}}
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="sm:max-w-[400px] max-w-[366px] w-full bg-transparent hover:cursor-pointer lg:px-[45px] lg:py-[9px] lg:text-[18px] lg:leading-[22px]
                                hover:bg-[#EF4444] text-[#EF4444] font-bold rounded-[25px] mx-auto px-[30px] py-[12px] text-base leading-[19px]
                                border-2 border-[#EF4444] transition-all duration-300 ease-in-out hover:text-white flex justify-center items-center gap-x-[8px]">
                                    <svg class="w-[16px] h-[16px]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 01-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Cerrar Sesión</span>
                                </button>
                            </form>

                        </div>
                    @endif

                </div>
            @else
                <div class="text-center">
                    <p class="text-[#6B7280] text-base leading-[19px]">Debes iniciar sesión para ver tu perfil.</p>
                    <a href="{{ route('login') }}" class="text-[#0F355E] font-bold hover:cursor-pointer">Iniciar sesión
                        aquí</a>
                </div>
            @endauth

        </div>

    </div>

</div>
