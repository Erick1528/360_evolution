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
                    Contáctanos</h2>
                <p class=" lg:text-base lg:leading-[19px] 
                text-[14px] leading-[17px]">
                    ¿Tienes alguna pregunta sobre Evolución 360º? Escríbenos y te responderemos pronto.</p>
            </div>



            {{-- Mensajes de estado dinámicos --}}
            @if (session()->has('success') && $showSuccess)
                <div class="lg:max-w-[600px] lg:w-full lg:mx-auto w-full bg-[#0F355E] text-white px-[20px] py-[15px] rounded-[10px] flex items-center justify-between gap-x-[12px]">
                    <div class="flex items-center justify-start gap-x-[12px]">
                        <img src="{{ asset('build/assets/succes.svg') }}" alt="" class="w-[20px] h-[20px] flex-shrink-0">
                        <p class="lg:text-[14px] lg:leading-[17px] text-[12px] leading-[14px] font-medium">
                            {{ session('success') }}
                        </p>
                    </div>
                    <button wire:click="$set('showSuccess', false)" class="text-white hover:text-[#0F355E] hover:bg-white hover:bg-opacity-90 rounded-full p-1 transition-all duration-200 cursor-pointer">
                        <svg class="w-[16px] h-[16px]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            @if (session()->has('error') && $showError)
                <div class="lg:max-w-[600px] lg:w-full lg:mx-auto w-full bg-[#EF4444] text-white px-[20px] py-[15px] rounded-[10px] flex items-center justify-between gap-x-[12px]">
                    <div class="flex items-center justify-start gap-x-[12px]">
                        <img src="{{ asset('build/assets/errorwhite.svg') }}" alt="" class="w-[20px] h-[20px] flex-shrink-0">
                        <p class="lg:text-[14px] lg:leading-[17px] text-[12px] leading-[14px] font-medium">
                            {{ session('error') }}
                        </p>
                    </div>
                    <button wire:click="$set('showError', false)" class="text-white hover:text-[#EF4444] hover:bg-white hover:bg-opacity-90 rounded-full p-1 transition-all duration-200 cursor-pointer">
                        <svg class="w-[16px] h-[16px]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif            <form action=""
                class=" lg:max-w-[600px] lg:w-full lg:mx-auto
            sm:gap-y-[20px]
            flex flex-col gap-y-[40px]">

                <div class=" flex flex-col gap-y-[20px]">

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/person.svg') }}" alt=""
                                class=" lg:w-[24px] lg:h-[24px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Nombre Completo</p>
                        </label>
                        <input wire:model="name" type="text" placeholder="Escribe tu nombre completo"
                            class=" lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] h-[40px] rounded-[10px] border-[1px] 
                            {{ $errors->has('name') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}">
                        @error('name')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/mail3.svg') }}" alt=""
                                class=" lg:w-[24px] lg:h-[24px]">
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
                                <p class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/message.svg') }}" alt=""
                                class=" lg:w-[24px] lg:h-[24px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Asunto</p>
                        </label>
                        <input wire:model="subject" type="text" placeholder="¿De qué quieres hablarnos?"
                            class=" lg:text-[14px] lg:leading-[17px] text-[12px] px-[15px] py-[12px] h-[40px] rounded-[10px] border-[1px] 
                            {{ $errors->has('subject') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}">
                        @error('subject')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class=" flex flex-col gap-y-[4px]">
                        <label for="" class=" flex items-center justify-start gap-x-[8px]">
                            <img src="{{ asset('build/assets/message.svg') }}" alt=""
                                class=" lg:w-[24px] lg:h-[24px]">
                            <p
                                class=" lg:text-base lg:leading-[19px]
                            text-[14px] leading-[17px] font-bold text-[#0F355E]">
                                Mensaje</p>
                        </label>
                        <textarea name="" wire:model="message" placeholder="Escribe tu mensaje aquí"
                            class=" lg:text-[14px] lg:leading-[17px] lg:h-[128px] resize-none text-[12px] px-[15px] py-[12px] h-[108px] rounded-[10px] border-[1px] 
                            {{ $errors->has('message') ? 'border-[#EF4444]' : 'border-[rgba(0,0,0,.20)]' }}"></textarea>
                        @error('message')
                            <div class="text-[#EF4444] flex items-center justify-start gap-x-[6px] mt-[8px]">
                                <img src="{{ asset('build/assets/error.svg') }}" alt="" class="w-[14px] h-[14px]">
                                <p class=" lg:text-[12px] lg:leading-[14px]
                                text-[11px] leading-[13px]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                </div>

                <button wire:click.prevent="submit" type="submit"
                    class=" bg-[#0F355E] hover:cursor-pointer lg:px-[45px] lg:py-[9px] lg:text-[18px] lg:leading-[22px]
                    hover:bg-white text-white font-bold w-auto rounded-[25px] mx-auto px-[30px] py-[12px] text-base leading-[19px]
                    border-2 border-[#0F355E] relative overflow-hidden transition-colors duration-500 ease-in-out
                    before:absolute before:top-0 before:left-0 before:w-[60%] before:h-full before:bg-[#0F355E] 
                    before:transition-transform before:duration-500 before:ease-in-out hover:before:-translate-x-full before:z-10
                    before:transform before:-skew-x-12
                    after:absolute after:top-0 after:right-0 after:w-[60%] after:h-full after:bg-[#0F355E]
                    after:transition-transform after:duration-500 after:ease-in-out hover:after:translate-x-full after:z-10
                    after:transform after:-skew-x-12
                    hover:text-[#0F355E]">
                    <span class="relative z-20 transition-none">Enviar Mensaje</span>
                </button>

            </form>

        </div>

    </div>

</div>
