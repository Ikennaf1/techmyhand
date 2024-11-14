<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Scripts -->
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
        ])

        <!-- Styles -->
        @livewireStyles

        {{-- Soft UI Dashboard Assets --}}
        <link href="/soft-ui-dashboard-tailwind/assets/css/soft-ui-dashboard-tailwind.css" rel="stylesheet" />
        <link href="/soft-ui-dashboard-tailwind/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/soft-ui-dashboard-tailwind/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="/soft-ui-dashboard-tailwind/assets/css/perfect-scrollbar.css" rel="stylesheet" />

        <script src="/soft-ui-dashboard-tailwind/assets/js/plugins/perfect-scrollbar.min.js" crossorigin="anonymous"></script>
        <script src="/soft-ui-dashboard-tailwind/assets/js/soft-ui-dashboard-tailwind.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- Popper -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

        <livewire:portal.side-nav />

        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            
            <livewire:portal.nav-bar />
        
            <div class="w-full px-6 py-6 mx-auto">
                {{ $slot }}
            </div>

            <livewire:portal.footer />

            {{-- <livewire:portal.fixed-plugin /> --}}
        </main>

        @livewireScripts
    </body>
    
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
