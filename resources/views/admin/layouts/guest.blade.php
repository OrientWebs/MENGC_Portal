<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEngC Portal') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="h-screen w-screen">
    <div class="flex h-screen">
        <!-- Left side (Image / Video) -->
        <div class="hidden lg:flex w-1/2 items-center justify-center bg-gray-100">
            {{-- If you want an image --}}
            <x-auth.authentication-card-logo />

            {{-- If you want a video instead --}}
            {{--
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="{{ asset('videos/company-demo.mp4') }}" type="video/mp4">
            </video>
            --}}
        </div>

        <!-- Right side (Auth Forms) -->
        <div class="flex w-full lg:w-1/2 items-center justify-center p-6 bg-white">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
