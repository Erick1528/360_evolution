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
                    Crear Cuenta</h2>
                <p class=" lg:text-base lg:leading-[19px] 
                text-[14px] leading-[17px]">Únete a la
                    comunidad de Evolución 360º</p>
            </div>

            <div class=" sm:max-w-[400px]
            max-w-[366px] w-full mx-auto flex flex-col gap-y-[15px]">

                <a href="/google-auth/redirect"
                    class=" border-[1px] border-[#D1D5DB] rounded-[10px] bg-white flex justify-center items-center py-[12px] px-[20px]  w-full gap-x-[8px] hover:cursor-pointer">
                    <img src="{{ asset('build/assets/google.svg') }}" alt="" class=" h-[16px] w-[16px]">
                    <p class=" lg:text-base lg:leading-[19px]
                    text-[14px] leading-[17px]">
                        Registrarse con Google</p>
                </a>

                {{-- <div
                    class=" border-[1px] border-[#D1D5DB] rounded-[10px] bg-white flex justify-center items-center py-[12px] px-[20px]  w-full gap-x-[8px] hover:cursor-pointer">
                    <img src="{{ asset('build/assets/facebook.svg') }}" alt="" class=" h-[16px] w-[16px]">
                    <p class=" lg:text-base lg:leading-[19px]
                    text-[14px] leading-[17px]">
                        Registrarse
                        con Facebook</p>
                </div> --}}

            </div>

            <div
                class=" sm:max-w-[400px]
            flex gap-x-[15px] max-w-[366px] w-full mx-auto items-center justify-center">

                <div class=" h-[1px] bg-[#D1D5DD] w-full"></div>

                <p class=" lg:text-[14px] lg:leading-[17px]
                text-[#6B7280] text-[12px] leading-[14px]">o
                </p>

                <div class=" h-[1px] bg-[#D1D5DD] w-full"></div>

            </div>

            {{-- Mensajes de estado dinámicos --}}
            @if (session()->has('success') && $showSuccess)
                <div
                    class=" max-w-[366px] mx-auto
                    sm:max-w-[400px] lg:w-full lg:mx-auto w-full bg-[#0F355E] text-white px-[20px] py-[15px] rounded-[10px] flex items-center justify-between gap-x-[12px]">
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
                    sm:max-w-[400px] lg:w-full lg:mx-auto w-full bg-[#EF4444] text-white px-[20px] py-[15px] rounded-[10px] flex items-center justify-between gap-x-[12px]">
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

            <form action=""
                class=" sm:max-w-[400px]
                mx-auto w-full max-w-[366px] lg:w-full lg:mx-auto
            sm:gap-y-[20px]
            flex flex-col gap-y-[40px]">

                <div class=" flex flex-col gap-y-[20px]">
                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/person.svg') }}" alt="" class=" w-[16px] h-[16px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Nombre Completo</p>
                        </label>
                        <input wire:model="name" type="text" placeholder="Tu nombre completo"
                            class=" lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] h-[40px] rounded-[10px] border-[1px] 
                            {{ $errors->has('name') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}">
                        @error('name')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p
                                    class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">
                                    {{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/mail3.svg') }}" alt="" class=" w-[16px] h-[16px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Correo Electrónico</p>
                        </label>
                        <input wire:model="email" type="email" placeholder="tu@email.com"
                            class=" lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] h-[40px] rounded-[10px] border-[1px] 
                            {{ $errors->has('email') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}">
                        @error('email')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p
                                    class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">
                                    {{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/password.svg') }}" alt=""
                                class=" w-[16px] h-[16px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Contraseña</p>
                        </label>
                        <div class="relative">
                            <input wire:model="password" type="{{ $showPassword ? 'text' : 'password' }}" placeholder="Minimo 6 caracteres"
                                class=" lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] pr-[45px] h-[40px] rounded-[10px] border-[1px] w-full
                                {{ $errors->has('password') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}">
                            <button type="button" wire:click="togglePasswordVisibility"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                @if ($showPassword)
                                    <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                                    </svg>
                                @else
                                    <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                @endif
                            </button>
                        </div>
                        @error('password')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p
                                    class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">
                                    {{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/password.svg') }}" alt=""
                                class=" w-[16px] h-[16px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Confirmar Contraseña</p>
                        </label>
                        <div class="relative">
                            <input wire:model="password_confirmation" type="{{ $showPasswordConfirmation ? 'text' : 'password' }}" placeholder="Minimo 6 caracteres"
                                class=" lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] pr-[45px] h-[40px] rounded-[10px] border-[1px] w-full
                                {{ $errors->has('password_confirmation') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}">
                            <button type="button" wire:click="togglePasswordConfirmationVisibility"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                @if ($showPasswordConfirmation)
                                    <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                                    </svg>
                                @else
                                    <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                @endif
                            </button>
                        </div>
                        @error('password_confirmation')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p
                                    class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">
                                    {{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>

                <button wire:click.prevent="submit" type="submit"
                    class="group sm:max-w-[400px]
                    max-w-[366px] w-full bg-[#0F355E] hover:cursor-pointer lg:px-[45px] lg:py-[9px] lg:text-[18px] lg:leading-[22px]
                    hover:bg-white text-white font-bold rounded-[25px] mx-auto px-[30px] py-[12px] text-base leading-[19px]
                    border-2 border-[#0F355E] relative overflow-hidden transition-colors duration-500 ease-in-out
                    before:absolute before:top-0 before:left-0 before:w-[60%] before:h-full before:bg-[#0F355E] 
                    before:transition-transform before:duration-500 before:ease-in-out hover:before:-translate-x-full before:z-10
                    before:transform before:-skew-x-12
                    after:absolute after:top-0 after:right-0 after:w-[60%] after:h-full after:bg-[#0F355E]
                    after:transition-transform after:duration-500 after:ease-in-out hover:after:translate-x-full after:z-10
                    after:transform after:-skew-x-12
                    hover:text-[#0F355E] flex justify-center items-center gap-x-[8px]">
                    <img src="{{ asset('build/assets/person2.svg') }}" alt=""
                        class="group-hover:hidden relative transition-none z-20 w-[16px] h-[16px]">
                    <img src="{{ asset('build/assets/person2blue.svg') }}" alt=""
                        class="hidden group-hover:block relative transition-none z-20 w-[16px] h-[16px]">
                    <span class="
                    relative z-20 transition-none">Crear Cuenta</span>
                </button>

            </form>

            <div class=" flex flex-col gap-y-[20px]">
                <div class=" h-[1px] w-full bg-[#D1D5DD]"></div>

                <div
                    class=" sm:text-[14px] sm:leading-[17px]
                text-[12px] leading-[14px] flex gap-x-[8px] justify-center items-center text-[#374151]">
                    <p>¿Ya tienes cuenta?</p>
                    <a href="{{ route('login') }}"
                        class=" text-[#0F355E] font-bold hover:cursor-pointer">Inicia sesión
                        aquí</a>
                </div>
            </div>

        </div>

    </div>

</div>
