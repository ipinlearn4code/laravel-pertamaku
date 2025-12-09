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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800 relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-20 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>
                <div class="absolute top-40 right-20 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse delay-1000"></div>
                <div class="absolute bottom-20 left-40 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse delay-2000"></div>
            </div>
            
            <div class="relative z-10">
                <a href="/" class="block mb-8 transform hover:scale-110 transition-transform duration-300">
                    <div class="flex items-center justify-center w-24 h-24 bg-white bg-opacity-20 backdrop-blur-lg rounded-full shadow-xl border border-white border-opacity-30">
                        <x-application-logo class="w-12 h-12 fill-current text-white" />
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white bg-opacity-10 backdrop-blur-lg shadow-2xl overflow-hidden sm:rounded-3xl border border-white border-opacity-20 relative z-10">
                <div class="absolute inset-0 bg-gradient-to-b from-white/10 to-transparent rounded-3xl"></div>
                <div class="relative z-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
