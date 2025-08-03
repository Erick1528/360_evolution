<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Global Editorial EA es una editorial especializada en impresión de libros, comprometida con la excelencia, la educación y el desarrollo cultural en América Latina.">

    {{-- Montserrat font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Pplayfair font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap"
        rel="stylesheet">

    <title>Evolución 360° - @yield('title')</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('build/assets/logo.svg') }}">

    {{-- Preload menu icons --}}
    <link rel="preload" href="{{ asset('build/assets/closemenu.svg') }}" as="image">
    <link rel="preload" href="{{ asset('build/assets/menu.svg') }}" as="image">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen grid grid-rows-[auto_1fr_auto]">

    <header class=" w-full font-[montserrat]">
        <livewire:nav-bar />
        @yield('banner')
    </header>
    <main>
        @yield('content')
    </main>

    <livewire:footer />

    {{-- Scripts --}}

    @livewireScripts

    <script type="text/javascript">
        (function(d, t) {
            var v = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
            v.onload = function() {
                window.voiceflow.chat.load({
                    verify: {
                        projectID: '688c68156f8aaecc976bfb12'
                    },
                    url: 'https://general-runtime.voiceflow.com',
                    versionID: 'production',
                    voice: {
                        url: "https://runtime-api.voiceflow.com"
                    }
                });
            }
            v.src = "https://cdn.voiceflow.com/widget-next/bundle.mjs";
            v.type = "text/javascript";
            s.parentNode.insertBefore(v, s);
        })(document, 'script');
    </script>
</body>

</html>
