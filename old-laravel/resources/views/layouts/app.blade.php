<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Portfolio'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    @include('components.navbar')
    
    @if(request()->routeIs('home'))
        @yield('content')
        @include('components.footer')
    @else
        <div class="min-h-screen bg-white dark:bg-gray-900">
            <main>
                @yield('content')
            </main>
            
            @include('components.footer')
        </div>
    @endif
</body>
</html>

