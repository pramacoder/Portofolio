@props(['post', 'readMoreLabel' => 'Baca Selengkapnya'])

<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-border bg-card shadow-xs transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
    <a href="{{ route('blog.show', $post['slug']) }}" class="block overflow-hidden border-b border-border bg-muted/40">
        <div class="relative aspect-[16/9] w-full overflow-hidden">
            <img src="{{ asset($post['image']) }}"
                 alt="{{ $post['title'] }}"
                 loading="lazy"
                 class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]">
        </div>
    </a>

    <div class="flex flex-1 flex-col justify-between p-4 sm:p-5">
        <div>
            <div class="flex flex-wrap items-center gap-2 text-xs text-muted-foreground mb-2">
                <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 font-medium text-primary">
                    {{ $post['category'] }}
                </span>
                <span class="inline-flex items-center gap-1 font-mono">
                    <x-icon name="calendar" class="w-3.5 h-3.5" />
                    {{ $post['date'] }}
                </span>
                <span>•</span>
                <span>{{ $post['read_time'] }}</span>
            </div>

            <a href="{{ route('blog.show', $post['slug']) }}">
                <h3 class="font-semibold text-base sm:text-lg text-foreground group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                    {{ $post['title'] }}
                </h3>
            </a>

            <p class="text-sm text-muted-foreground mt-2 line-clamp-2 leading-relaxed">
                {{ $post['excerpt'] }}
            </p>
        </div>

        <div class="mt-4 pt-3 border-t border-border/70">
            <a href="{{ route('blog.show', $post['slug']) }}"
               class="inline-flex items-center gap-1.5 text-sm font-medium text-primary hover:underline">
                <span>{{ $readMoreLabel }}</span>
                <x-icon name="arrow-right" class="w-4 h-4" />
            </a>
        </div>
    </div>
</article>
