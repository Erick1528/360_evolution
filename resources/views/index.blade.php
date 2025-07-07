<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Montserrat font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>Evolución 360°</title>
    
    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('build/assets/logo.svg') }}">
    
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class=" font-[montserrat]">
    <header class=" w-full ">
        <livewire:nav-bar />
        <livewire:banner />
    </header>
</body>

</html>
