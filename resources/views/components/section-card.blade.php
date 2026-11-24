@props(['title' => null, 'subtitle' => null])

<section {{ $attributes->merge(['class' => 'section-reveal rounded-xl border border-border bg-card p-4 sm:p-6 w-full max-w-full overflow-hidden']) }}>
    @if($title)
        <div class="flex flex-col items-center justify-center text-center mb-5">
            <h2 class="text-lg sm:text-xl font-semibold tracking-tight text-foreground">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-sm text-muted-foreground mt-1 max-w-2xl">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    <div class="space-y-4">
        {{ $slot }}
    </div>
</section>
