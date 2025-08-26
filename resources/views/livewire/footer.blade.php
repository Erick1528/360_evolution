<div class=" lg:px-[120px] 
md:px-[50px] 
bg-[#0F355E] px-[20px] py-[40px] font-[playfair] flex flex-col gap-y-[40px]">

    <div class=" md:flex-row md:items-end md:justify-between
    flex flex-col gap-y-[40px]">
        <div class=" md:items-start md:justify-start
        flex flex-col items-center justify-center">
            <img src="{{ asset('build/assets/logo.svg') }}" alt="Logo de Evolución 360°" class=" h-[116px]">
            <p class=" sm:text-left text-center
            text-[rgba(255,255,255,0.7)] italic text-[12px]">Semillas de
                conocimiento, cosechas de esperanza.
            </p>
        </div>

        <div
            class="
        md:flex-row md:items-start md:justify-between md:max-w-[380px] lg:max-w-[482px] md:w-full
        flex flex-col gap-y-[20px]">

            <div
                class=" md:justify-start md:items-start
            flex flex-col gap-y-[10px] items-center justify-center">
                <h3 class=" md:text-left
                text-white font-bold text-base text-center">Navegación</h3>

                <nav
                    class=" md:text-left
                flex flex-col text-center text-[14px] text-[rgba(255,255,255,0.7)]">
                    <a href="/"
                        class=" hover:text-white hover:scale-105 transition-all duration-300 ease-in-out">Inicio</a>
                    <a href="{{ route('discover') }}"
                        class=" hover:text-white hover:scale-105 transition-all duration-300 ease-in-out">Descubre</a>
                    <a href="{{ route('aboutus') }}"
                        class=" hover:text-white hover:scale-105 transition-all duration-300 ease-in-out">Sobre
                        Nosotros</a>
                    <a href="{{ route('contact') }}"
                        class=" hover:text-white hover:scale-105 transition-all duration-300 ease-in-out">Contacto</a>
                </nav>
            </div>

            <div
                class=" md:justify-start md:items-start
            flex flex-col gap-y-[10px] items-center justify-center">
                <h3 class=" md:text-left
                text-white font-bold text-base text-center">Contacto</h3>

                <nav
                    class=" md:text-left
                flex flex-col gap-y-[4px] text-center text-[14px] text-[rgba(255,255,255,0.7)]">
                    <a href="mailto:info@globaleditorialea.com"
                        class=" hover:text-white hover:scale-105 transition-all duration-300 ease-in-out
                        md:justify-start 
                    flex gap-x-[6px] items-center justify-center">
                        <img src="{{ asset('build/assets/mail2.svg') }}" alt="">
                        <p class=" lg:w-auto md:w-[110px] md:break-words md:leading-3 lg:leading-0">
                            info@globaleditorialea.com</p>
                    </a>
                    <div class=" md:justify-start
                    flex gap-x-[6px] items-center justify-center">
                        <img src="{{ asset('build/assets/phone.svg') }}" alt="">
                        <p>+34 650 65 65 65</p>
                    </div>
                </nav>
            </div>

            <div
                class=" md:justify-start md:items-start
            flex flex-col gap-y-[10px] items-center justify-center">
                <h3 class=" md:text-left
                text-white font-bold text-base text-center">Siguenos</h3>

                <div
                    class=" md:justify-start md:items-start
                flex gap-x-[8px] items-center justify-center">

                    <a href=""
                        class=" hover:bg-[rgba(255,255,255,.4)] hover:scale-105 transition-all duration-300 ease-in-out
                        p-[7px] rounded-full bg-[rgba(255,255,255,.2)] w-[34px] h-[34px] flex items-center justify-center">
                        <img src="{{ asset('build/assets/facebook.svg') }}" alt=""
                            class=" w-[20px] h-[20px] object-cover aspect-[1/1]">
                    </a>

                    <a href=""
                        class=" hover:bg-[rgba(255,255,255,.4)] hover:scale-105 transition-all duration-300 ease-in-out
                        p-[7px] rounded-full bg-[rgba(255,255,255,.2)] w-[34px] h-[34px] flex items-center justify-center">
                        <img src="{{ asset('build/assets/instagram.svg') }}" alt=""
                            class=" w-[20px] h-[20px] object-cover aspect-[1/1]">
                    </a>

                </div>
            </div>

        </div>
    </div>

    <div class=" h-[1px] min-w-full w-full bg-[rgba(255,255,255,.2)]"></div>

    <div class=" text-[12px] font-bold text-[rgba(255,255,255,.7)] flex flex-col items-center justify-center">
        <p>&copy; 2025 Global Editorial EA. Derechos reservados.</p>

        <div class=" flex gap-x-[20px]">
            <a href="{{ route('privacy') }}"
                class="hover:text-white hover:scale-105 transition-all duration-300 ease-in-out">Privacidad</a>
            <a href="{{ route('terms') }}"
                class="hover:text-white hover:scale-105 transition-all duration-300 ease-in-out">Términos</a>
        </div>
    </div>

</div>
