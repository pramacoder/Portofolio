<!DOCTYPE html>
<html lang="{{ $locale ?? app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Pramajaya — Web Developer & AI/ML Portfolio')</title>
    <meta name="description" content="@yield('meta_description', $profile['intro'] ?? 'Personal developer portfolio of Pramajaya — Informatics Student at Universitas Udayana, Web Developer, and AI/ML Enthusiast.')">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Pramajaya — Web Developer & AI/ML Portfolio')">
    <meta property="og:description" content="@yield('meta_description', $profile['intro'] ?? '')">
    <meta property="og:image" content="{{ asset($profile['avatar'] ?? 'images/portfolio/hero/Homepage.jpeg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" href="{{ asset('images/brand/logo-pramajaya.png') }}">

    {{-- Geist & Geist Mono Typography (Distinct from reference Inter) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Zero-flash Theme Initialization (Defaults to Light like reference; persists Dark choice) --}}
    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            if (saved === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data class="antialiased min-h-svh bg-background text-foreground selection:bg-primary/20 selection:text-foreground">
    <a href="#main-content"
       class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:rounded-md focus:bg-primary focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-primary-foreground">
        {{ ($locale ?? 'id') === 'id' ? 'Lewati ke konten utama' : 'Skip to main content' }}
    </a>

    <div class="flex flex-col md:flex-row min-h-screen w-full max-w-full overflow-x-hidden">
        <x-mobile-header :profile="$profile" :locale="$locale" />
        <x-sidebar :profile="$profile" :ui="$ui" :locale="$locale" />

        <main id="main-content" class="flex-1 min-w-0 max-w-full w-full overflow-x-hidden">
            <div class="container mx-auto max-w-5xl py-8 px-4 md:px-8">
                @yield('content')
                <x-footer :profile="$profile" :locale="$locale" />
            </div>
        </main>
    </div>
</body>
</html>
