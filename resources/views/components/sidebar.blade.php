@props(['profile', 'ui', 'locale'])

@php
$navGroups = [
    [
        'label' => $ui['nav_groups']['main'],
        'items' => [
            ['route' => 'home', 'match' => 'home', 'label' => $ui['nav']['home'], 'icon' => 'home'],
            ['route' => 'about', 'match' => 'about', 'label' => $ui['nav']['about'], 'icon' => 'user'],
            ['route' => 'contact', 'match' => 'contact*', 'label' => $ui['nav']['contact'], 'icon' => 'mail'],
        ],
    ],
    [
        'label' => $ui['nav_groups']['portfolio'],
        'items' => [
            ['route' => 'projects', 'match' => 'projects*', 'label' => $ui['nav']['projects'], 'icon' => 'folder'],
            ['route' => 'blog', 'match' => 'blog*', 'label' => $ui['nav']['blog'], 'icon' => 'book'],
        ],
    ],
    [
        'label' => $ui['nav_groups']['professional'],
        'items' => [
            ['route' => 'experience', 'match' => 'experience', 'label' => $ui['nav']['experience'], 'icon' => 'briefcase'],
            ['route' => 'education', 'match' => 'education', 'label' => $ui['nav']['education'], 'icon' => 'graduation'],
            ['route' => 'skills', 'match' => 'skills', 'label' => $ui['nav']['skills'], 'icon' => 'wrench'],
            ['route' => 'links', 'match' => 'links', 'label' => $ui['nav']['links'], 'icon' => 'link'],
        ],
    ],
];
@endphp

{{-- Desktop Persistent Sidebar (Reference: 16rem expanded, 4.25rem icon rail collapsed) --}}
<div class="hidden md:block shrink-0 w-64 transition-[width] duration-200 ease-linear"
     :class="$store.ui.sidebarCollapsed ? '!w-[68px]' : 'w-64'">
    <aside aria-label="Sidebar Navigation"
           class="fixed inset-y-0 left-0 z-30 flex h-svh w-64 flex-col border-r border-border bg-sidebar text-foreground transition-[width] duration-200 ease-linear"
           :class="$store.ui.sidebarCollapsed ? '!w-[68px]' : 'w-64'">

        {{-- Header: Profile Avatar + Identity + Collapse Button --}}
        <div class="relative flex flex-col gap-2 border-b border-border p-3 pb-4">
            <button type="button"
                    @click="$store.ui.toggleSidebar()"
                    :title="$store.ui.sidebarCollapsed ? '{{ $ui['actions']['expand_sidebar'] }}' : '{{ $ui['actions']['collapse_sidebar'] }}'"
                    :aria-label="$store.ui.sidebarCollapsed ? '{{ $ui['actions']['expand_sidebar'] }}' : '{{ $ui['actions']['collapse_sidebar'] }}'"
                    class="absolute right-2.5 top-2.5 inline-flex h-7 w-7 items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <x-icon name="panel-left" class="w-4 h-4" />
            </button>

            <a href="{{ route('home') }}" class="flex flex-col items-center space-y-2.5 pt-3 focus-visible:rounded-lg"
               :class="$store.ui.sidebarCollapsed ? 'pt-7 space-y-0' : ''">
                <div class="relative shrink-0">
                    <div class="h-20 w-20 overflow-hidden rounded-full border-2 border-primary/20 bg-muted transition-all duration-200"
                         :class="$store.ui.sidebarCollapsed ? '!h-9 !w-9' : 'h-20 w-20'">
                        <img src="{{ asset($profile['avatar']) }}"
                             alt="{{ $profile['name'] }}"
                             class="h-full w-full object-cover object-top">
                    </div>
                    <img x-show="!$store.ui.sidebarCollapsed"
                         src="{{ asset($profile['logo']) }}"
                         alt="{{ $profile['name'] }} Logo"
                         class="absolute -bottom-1 -right-1 h-7 w-7 rounded-full border-2 border-sidebar bg-white p-0.5 object-contain shadow-xs">
                </div>
                <div x-show="!$store.ui.sidebarCollapsed" x-transition.opacity class="text-center px-1">
                    <p class="text-lg font-bold tracking-tight text-foreground leading-tight">{{ $profile['name'] }}</p>
                    <p class="text-xs text-muted-foreground mt-1 leading-snug">{{ $profile['role_short'] }}</p>
                    <p class="text-xs text-muted-foreground leading-snug">{{ $profile['role_secondary'] }}</p>
                </div>
            </a>
        </div>

        {{-- Navigation Groups --}}
        <nav class="flex-1 overflow-y-auto p-2 space-y-2" aria-label="Main Navigation">
            @foreach($navGroups as $group)
                <div class="flex flex-col">
                    <div x-show="!$store.ui.sidebarCollapsed"
                         class="flex h-7 items-center px-2 text-xs font-medium text-muted-foreground/80">
                        {{ $group['label'] }}
                    </div>
                    <ul class="flex flex-col gap-1">
                        @foreach($group['items'] as $item)
                            @php $active = request()->routeIs($item['match']); @endphp
                            <li>
                                <a href="{{ route($item['route']) }}"
                                   title="{{ $item['label'] }}"
                                   @if($active) aria-current="page" @endif
                                   class="flex items-center gap-2.5 rounded-md px-2.5 h-8.5 text-sm transition-colors {{ $active ? 'bg-accent font-medium text-accent-foreground' : 'text-foreground/80 hover:bg-accent/70 hover:text-accent-foreground' }}"
                                   :class="$store.ui.sidebarCollapsed ? 'justify-center px-0' : ''">
                                    <x-icon :name="$item['icon']" class="w-4 h-4 shrink-0" />
                                    <span x-show="!$store.ui.sidebarCollapsed" class="truncate">{{ $item['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>

        {{-- Footer Controls: Language, Socials, Download CV, Theme Toggle --}}
        <div class="border-t border-border p-3 space-y-3">
            {{-- Expanded Footer --}}
            <div x-show="!$store.ui.sidebarCollapsed" class="space-y-3">
                {{-- Language Switcher --}}
                <div class="flex justify-center">
                    <div class="inline-flex items-center gap-1 rounded-md border border-border bg-card p-1" role="group" aria-label="Language switcher">
                        <a href="{{ route('locale.switch', 'id') }}"
                           class="rounded px-2.5 py-1 text-xs font-medium transition-colors {{ $locale === 'id' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground' }}">
                            ID
                        </a>
                        <a href="{{ route('locale.switch', 'en') }}"
                           class="rounded px-2.5 py-1 text-xs font-medium transition-colors {{ $locale === 'en' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground' }}">
                            EN
                        </a>
                    </div>
                </div>

                {{-- Social Quick Buttons --}}
                <div class="flex justify-center gap-2">
                    <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer"
                       aria-label="GitHub"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                        <x-icon name="github" class="w-4 h-4" />
                    </a>
                    <a href="mailto:{{ $profile['email'] }}"
                       aria-label="Email"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                        <x-icon name="mail" class="w-4 h-4" />
                    </a>
                    <a href="{{ route('links') }}"
                       aria-label="Links"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                        <x-icon name="link" class="w-4 h-4" />
                    </a>
                </div>

                {{-- Download CV --}}
                <a href="{{ asset($profile['cv_url']) }}" download="CV-Pramajaya.pdf"
                   class="inline-flex h-9.5 w-full items-center justify-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                    <x-icon name="download" class="w-4 h-4" />
                    <span>{{ $ui['actions']['download_cv'] }}</span>
                </a>

                {{-- Theme Toggle --}}
                <button type="button" @click="$store.ui.toggleTheme()"
                        class="inline-flex h-9 w-full items-center justify-center gap-2 rounded-md border border-border bg-card px-3 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                    <span x-show="!$store.ui.dark" class="inline-flex items-center gap-2">
                        <x-icon name="moon" class="w-4 h-4" />
                        <span>{{ $ui['actions']['dark_mode'] }}</span>
                    </span>
                    <span x-show="$store.ui.dark" x-cloak class="inline-flex items-center gap-2">
                        <x-icon name="sun" class="w-4 h-4" />
                        <span>{{ $ui['actions']['light_mode'] }}</span>
                    </span>
                </button>
            </div>

            {{-- Collapsed Icon-Only Footer --}}
            <div x-show="$store.ui.sidebarCollapsed" x-cloak class="flex flex-col items-center gap-2">
                <a href="{{ asset($profile['cv_url']) }}" download="CV-Pramajaya.pdf"
                   title="{{ $ui['actions']['download_cv'] }}"
                   aria-label="{{ $ui['actions']['download_cv'] }}"
                   class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-primary text-primary-foreground hover:bg-primary-hover transition-colors">
                    <x-icon name="download" class="w-4 h-4" />
                </a>
                <button type="button" @click="$store.ui.toggleTheme()"
                        aria-label="Toggle theme"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent transition-colors">
                    <span x-show="!$store.ui.dark"><x-icon name="moon" class="w-4 h-4" /></span>
                    <span x-show="$store.ui.dark" x-cloak><x-icon name="sun" class="w-4 h-4" /></span>
                </button>
            </div>
        </div>
    </aside>
</div>

{{-- Mobile Offcanvas Drawer --}}
<div x-show="$store.ui.mobileMenuOpen"
     x-cloak
     @keydown.escape.window="$store.ui.closeMobileMenu()"
     class="fixed inset-0 z-50 md:hidden"
     role="dialog"
     aria-modal="true"
     aria-label="Mobile Navigation">
    {{-- Backdrop --}}
    <div x-show="$store.ui.mobileMenuOpen"
         x-transition.opacity
         @click="$store.ui.closeMobileMenu()"
         class="fixed inset-0 bg-black/50 backdrop-blur-xs"></div>

    {{-- Drawer Panel --}}
    <aside x-show="$store.ui.mobileMenuOpen"
           x-transition:enter="transition ease-out duration-200"
           x-transition:enter-start="-translate-x-full"
           x-transition:enter-end="translate-x-0"
           x-transition:leave="transition ease-in duration-150"
           x-transition:leave-start="translate-x-0"
           x-transition:leave-end="-translate-x-full"
           class="fixed inset-y-0 left-0 z-50 flex w-72 max-w-[85vw] flex-col border-r border-border bg-sidebar text-foreground shadow-xl">

        <div class="relative flex flex-col items-center gap-2 border-b border-border p-4 pt-6">
            <button type="button"
                    @click="$store.ui.closeMobileMenu()"
                    aria-label="Close navigation"
                    class="absolute right-3 top-3 inline-flex h-8 w-8 items-center justify-center rounded-md border border-border bg-card text-muted-foreground hover:text-foreground">
                <x-icon name="x" class="w-4 h-4" />
            </button>

            <div class="relative">
                <div class="h-16 w-16 overflow-hidden rounded-full border-2 border-primary/20 bg-muted">
                    <img src="{{ asset($profile['avatar']) }}" alt="{{ $profile['name'] }}" class="h-full w-full object-cover object-top">
                </div>
                <img src="{{ asset($profile['logo']) }}" alt="{{ $profile['name'] }} Logo"
                     class="absolute -bottom-1 -right-1 h-6 w-6 rounded-full border-2 border-sidebar bg-white p-0.5 object-contain">
            </div>
            <div class="text-center">
                <p class="text-base font-bold">{{ $profile['name'] }}</p>
                <p class="text-xs text-muted-foreground">{{ $profile['role_short'] }}</p>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto p-3 space-y-3">
            @foreach($navGroups as $group)
                <div>
                    <div class="px-2 pb-1 text-xs font-medium text-muted-foreground">{{ $group['label'] }}</div>
                    <ul class="space-y-1">
                        @foreach($group['items'] as $item)
                            @php $active = request()->routeIs($item['match']); @endphp
                            <li>
                                <a href="{{ route($item['route']) }}"
                                   @click="$store.ui.closeMobileMenu()"
                                   class="flex items-center gap-2.5 rounded-md px-2.5 py-2 text-sm transition-colors {{ $active ? 'bg-accent font-medium text-accent-foreground' : 'text-foreground/85 hover:bg-accent/70' }}">
                                    <x-icon :name="$item['icon']" class="w-4 h-4 shrink-0" />
                                    <span>{{ $item['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>

        <div class="border-t border-border p-3 space-y-2.5">
            <a href="{{ asset($profile['cv_url']) }}" download="CV-Pramajaya.pdf"
               class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                <x-icon name="download" class="w-4 h-4" />
                <span>{{ $ui['actions']['download_cv'] }}</span>
            </a>
            <div class="flex items-center justify-center gap-2">
                <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-md border border-border bg-card text-xs font-medium hover:bg-accent">
                    <x-icon name="github" class="w-4 h-4" />
                    <span>GitHub</span>
                </a>
                <a href="mailto:{{ $profile['email'] }}"
                   class="inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-md border border-border bg-card text-xs font-medium hover:bg-accent">
                    <x-icon name="mail" class="w-4 h-4" />
                    <span>Email</span>
                </a>
            </div>
        </div>
    </aside>
</div>
