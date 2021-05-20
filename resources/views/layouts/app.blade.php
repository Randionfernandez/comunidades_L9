<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

       

        <!-- Scripts  @livewireStyles -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    
    <body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif
        
        <div class="py-2 px-2">
            {{ $slot }}
        </div>
    </div>

    <footer class="fixed-bottom col-12 col-sm-12 col-lg-12 mt-auto p-2 bg-white text-center text-black-50 py-3 shadow">
        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
    </footer>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
