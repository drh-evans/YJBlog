<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-white antialiased">
    <div class="bg-no-repeat bg-cover bg-center bg-fixed flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col"
        style="background-image: url('/images/welcomebg.png')">
        <div>
            <a href="/" class="p-0 m-0">
                <img src="{{ asset('images/menuLogo.png') }}" class="w-[177px] h-[177px]">
            </a>
        </div>

        <div
            class="w-full sm:max-w-md px-6 py-4 bg-white/10 backdrop-filter backdrop-blur-md shadow-md overflow-hidden sm:rounded-lg border border-white/20">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
