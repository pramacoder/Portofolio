@props(['profile', 'locale'])

<footer class="mt-12 border-t border-border pt-6 pb-8 text-xs sm:text-sm text-muted-foreground">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2.5">
            <img src="{{ asset($profile['logo']) }}" alt="{{ $profile['name'] }} Logo" class="h-6 w-6 rounded-full bg-white p-0.5 border border-border object-contain">
            <span>© {{ date('Y') }} {{ $profile['name'] }}. {{ $locale === 'id' ? 'Dibangun dengan Laravel & Tailwind CSS.' : 'Built with Laravel & Tailwind CSS.' }}</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-foreground transition-colors">GitHub</a>
            <a href="{{ route('projects') }}" class="hover:text-foreground transition-colors">{{ $locale === 'id' ? 'Proyek' : 'Projects' }}</a>
            <a href="{{ route('contact') }}" class="hover:text-foreground transition-colors">{{ $locale === 'id' ? 'Kontak' : 'Contact' }}</a>
        </div>
    </div>
</footer>
