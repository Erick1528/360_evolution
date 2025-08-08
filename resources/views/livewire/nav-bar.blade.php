<nav class=" h-[100px] bg-[#0F355E] px-[40px] sm:px-[80px] flex justify-between items-center">
    {{-- colocar dentro de una anchor --}}
    <a href="/">
        <img src="{{ asset('build/assets/logo.svg') }}" alt="logo evolución 360°"
            class=" xl:w-[171px] xl:h-[116px] w-[129px] h-[88px]">
    </a>

    <img src="{{ asset('build/assets/menu.svg') }}" alt="" class=" md:hidden w-[50px] h-[50px] z-70" id="menu">

    <!-- Overlay opaco -->
    <div class="fixed inset-0 bg-black/50 z-40 md:hidden opacity-0 pointer-events-none transition-opacity duration-300"
        id="menu-overlay"></div>

    {{-- Menu móvil --}}
    <div class="fixed w-[70%] h-[100%] z-50 bg-[#0F355E] md:hidden top-0 right-0 transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl"
        id="menu-mobile">

        <div class="flex flex-col justify-center items-center h-full font-bold text-base text-white uppercase gap-y-8">
            <a href="/" class="hover:text-gray-300 transition-colors">INICIO</a>
            <a href="{{ route('discover') }}" class="hover:text-gray-300 transition-colors">DESCUBRIR</a>
            <a href="{{ route('aboutus') }}" class="hover:text-gray-300 transition-colors">SOBRE NOSOTROS</a>
            <a href="{{ route('contact') }}" class="hover:text-gray-300 transition-colors">CONTACTO</a>
        </div>
    </div>

    <div
        class="hidden
    md:flex justify-between items-center max-w-[443px] w-full font-bold text-base text-white uppercase">
        <a href="/">INICIO</a>
        <a href="{{ route('discover') }}">DESCUBRIR</a>
        <a href="{{ route('aboutus') }}">SOBRE NOSOTROS</a>
        <a href="{{ route('contact') }}">CONTACTO</a>
    </div>
</nav>

<script>
    // Precargar URLs de los iconos
    const menuIcon = `{{ asset('build/assets/menu.svg') }}`;
    const closeMenuIcon = `{{ asset('build/assets/closemenu.svg') }}`;
    
    // Precargar la imagen del menú de cierre
    const preloadCloseMenu = new Image();
    preloadCloseMenu.src = closeMenuIcon;

    const menuButton = document.querySelector('#menu');
    const menuMobile = document.querySelector('#menu-mobile');
    const menuOverlay = document.querySelector('#menu-overlay');

    menuButton.addEventListener('click', () => {
        if (menuMobile.classList.contains('translate-x-full')) {
            // Abrir menú - deslizar desde la derecha
            menuMobile.classList.remove('translate-x-full');
            menuMobile.classList.add('translate-x-0');
            // Mostrar overlay opaco
            menuOverlay.classList.remove('opacity-0', 'pointer-events-none');
            menuOverlay.classList.add('opacity-100');
            // Desactivar scroll
            document.body.classList.add('overflow-hidden');
            menuButton.src = closeMenuIcon;
        } else {
            // Cerrar menú - deslizar hacia la derecha
            menuMobile.classList.remove('translate-x-0');
            menuMobile.classList.add('translate-x-full');
            // Ocultar overlay
            menuOverlay.classList.remove('opacity-100');
            menuOverlay.classList.add('opacity-0', 'pointer-events-none');
            // Reactivar scroll
            document.body.classList.remove('overflow-hidden');
            menuButton.src = menuIcon;
        }
    });

    // Cerrar menú al hacer clic en el overlay
    menuOverlay.addEventListener('click', () => {
        menuMobile.classList.remove('translate-x-0');
        menuMobile.classList.add('translate-x-full');
        menuOverlay.classList.remove('opacity-100');
        menuOverlay.classList.add('opacity-0', 'pointer-events-none');
        // Reactivar scroll
        document.body.classList.remove('overflow-hidden');
        menuButton.src = menuIcon;
    });
</script>
