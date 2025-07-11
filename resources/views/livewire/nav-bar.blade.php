<nav class=" h-[100px] bg-[#0F355E] px-[40px] sm:px-[80px] flex justify-between items-center">
    {{-- colocar dentro de una anchor --}}
    <a href="/">
        <img src="{{ asset('build/assets/logo.svg') }}" alt="logo evolución 360°"
            class=" xl:w-[171px] xl:h-[116px] w-[129px] h-[88px]">
    </a>

    <img src="{{ asset('build/assets/menu.svg') }}" alt="" class=" md:hidden w-[50px] h-[50px]">

    <div
        class="hidden
    md:flex justify-between items-center max-w-[443px] w-full font-bold text-base text-white uppercase">
        <a href="">INICIO</a>
        <a href="{{ route('aboutus') }}">SOBRE NOSOTROS</a>
        <a href="">LIBROS</a>
        <a href="">CONTACTO</a>
    </div>
</nav>
