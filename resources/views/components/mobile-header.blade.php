@props(['profile', 'locale'])

<header class="sticky top-0 z-40 flex h-14 w-full shrink-0 items-center justify-between border-b border-border bg-background/90 px-4 backdrop-blur-md md:hidden">
    <div class="flex items-center gap-2.5 min-w-0">
        <button type="button"
                @click="$store.ui.openMobileMenu()"
                aria-label="Open navigation menu"
                class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent transition-colors">
            <x-icon name="menu" class="w-4 h-4" />
        </button>
        <a href="{{ route('home') }}" class="flex items-center gap-2 min-w-0">
            <img src="{{ asset($profile['logo']) }}" alt="{{ $profile['name'] }}" class="h-6 w-6 rounded-full bg-white p-0.5 object-contain shrink-0 border border-border">
            <span class="font-bold text-sm tracking-tight text-foreground truncate">{{ $profile['name'] }}</span>
        </a>
    </div>

    <div class="flex items-center gap-2 shrink-0">
        <div class="inline-flex items-center gap-0.5 rounded-md border border-border bg-card p-0.5" role="group" aria-label="Language switcher">
            <a href="{{ route('locale.switch', 'id') }}"
               class="rounded px-2 py-1 text-xs font-medium transition-colors {{ $locale === 'id' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted' }}">
                ID
            </a>
            <a href="{{ route('locale.switch', 'en') }}"
               class="rounded px-2 py-1 text-xs font-medium transition-colors {{ $locale === 'en' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted' }}">
                EN
            </a>
        </div>

        <button type="button"
                @click="$store.ui.toggleTheme()"
                aria-label="Toggle color theme"
                class="inline-flex h-9 w-9 items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-foreground transition-colors">
            <span x-show="!$store.ui.dark"><x-icon name="moon" class="w-4 h-4" /></span>
            <span x-show="$store.ui.dark" x-cloak><x-icon name="sun" class="w-4 h-4" /></span>
        </button>
    </div>
</header>
