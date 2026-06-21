<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Price Wise') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts / Fallback Tailwind & Alpine -->
        @if (file_exists(public_path('build/manifest.json')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @endif

        <script>
            tailwind.config = {
                darkMode: 'class',
            }
        </script>

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans text-slate-100 antialiased bg-slate-950 relative overflow-hidden min-h-screen">
        <!-- Glowing Ambient Background Effects -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-teal-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 relative z-10">
            <div class="mb-6">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-12 h-12 bg-teal-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-teal-600/20 group-hover:scale-105 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <span class="font-extrabold text-3xl tracking-tight bg-gradient-to-r from-teal-400 to-emerald-400 bg-clip-text text-transparent">Price Wise</span>
                </a>
            </div>

            <!-- Glassmorphic Card Container -->
            <div class="w-full sm:max-w-md mt-4 p-8 bg-slate-900/60 backdrop-blur-xl border border-slate-800 rounded-3xl shadow-2xl relative overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
