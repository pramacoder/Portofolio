<header class="sticky top-0 z-50 bg-black/95 backdrop-blur border-b border-white/10">
    <nav 
        class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8" 
        x-data="{ open: false }"
    >
        <div class="flex items-center justify-between h-16 lg:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-lg sm:text-xl font-semibold tracking-tight text-white">
                    Monk
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('projects') }}" 
                   class="text-sm font-medium text-white/80 hover:text-white transition-colors {{ request()->routeIs('projects') ? 'text-white' : '' }}">
                    Portfolio
                </a>
                <a href="{{ route('home') }}#services" 
                   class="text-sm font-medium text-white/80 hover:text-white transition-colors">
                    Work
                </a>
                <a href="{{ route('about') }}" 
                   class="text-sm font-medium text-white/80 hover:text-white transition-colors {{ request()->routeIs('about') ? 'text-white' : '' }}">
                    About
                </a>

                <!-- More dropdown -->
                <div class="relative" x-data="{ openMore: false }" @click.away="openMore = false">
                    <button 
                        type="button"
                        class="inline-flex items-center gap-1 text-sm font-medium text-white/80 hover:text-white transition-colors"
                        @click="openMore = !openMore"
                    >
                        More
                        <!-- Dropdown icon SVG -->
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div 
                        x-show="openMore"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute right-0 mt-3 w-40 rounded-md bg-[#111111] border border-white/10 shadow-lg py-2"
                    >
                        <a href="{{ route('contact') }}" 
                           class="block px-4 py-2 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                            Contact
                        </a>
                        <a href="{{ route('contact') }}#message" 
                           class="block px-4 py-2 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                            Message
                        </a>
                    </div>
                </div>

                <!-- Hire me button -->
                <a href="{{ route('contact') }}" 
                   class="ml-4 inline-flex items-center justify-center rounded-full bg-[#7FFFD4] px-4 py-2 text-sm font-semibold text-black shadow-[0_0_0_1px_rgba(0,0,0,0.2)] hover:brightness-105 transition">
                    Hire me!
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button 
                    @click="open = !open" 
                    class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-white"
                >
                    <!-- Hamburger / close icon with SVG -->
                    <svg x-show="!open" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" x-cloak class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden pb-4"
        >
            <div class="space-y-1 pt-2 border-t border-white/10">
                <a href="{{ route('projects') }}" 
                   class="block rounded-md px-3 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                    Portfolio
                </a>
                <a href="{{ route('home') }}#services" 
                   class="block rounded-md px-3 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                    Work
                </a>
                <a href="{{ route('about') }}" 
                   class="block rounded-md px-3 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                    About
                </a>

                <!-- Mobile More section -->
                <div class="pt-1">
                    <div class="px-3 py-2 text-sm font-semibold text-white/60">
                        More
                    </div>
                    <a href="{{ route('contact') }}" 
                       class="block rounded-md px-5 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                        Contact
                    </a>
                    <a href="{{ route('contact') }}#message" 
                       class="block rounded-md px-5 py-2 text-base font-medium text-white/80 hover:bg-white/10 hover:text-white">
                        Message
                    </a>
                </div>

                <!-- Mobile Hire me button -->
                <div class="pt-3 px-3">
                    <a href="{{ route('contact') }}" 
                       class="block w-full text-center rounded-full bg-[#7FFFD4] px-4 py-2 text-sm font-semibold text-black hover:brightness-105 transition">
                        Hire me!
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
