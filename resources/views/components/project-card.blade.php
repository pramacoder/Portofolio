@props(['project', 'compact' => false])

<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-border bg-card shadow-xs transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
    <a href="{{ route('projects.show', $project['slug']) }}" class="block overflow-hidden border-b border-border bg-muted/40">
        <div class="relative aspect-[16/9] w-full overflow-hidden">
            <img src="{{ asset($project['image']) }}"
                 alt="{{ $project['title'] }}"
                 loading="lazy"
                 class="h-full w-full object-cover object-top transition-transform duration-300 group-hover:scale-[1.02]">
            @if(!empty($project['demo']))
                <span class="absolute top-2.5 right-2.5 inline-flex items-center gap-1 rounded-full bg-card/90 backdrop-blur-xs border border-border px-2.5 py-0.5 text-[11px] font-semibold text-primary shadow-xs">
                    <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                    Live
                </span>
            @endif
        </div>
    </a>

    <div class="flex flex-1 flex-col justify-between p-4">
        <div>
            <div class="flex items-center justify-between gap-2 mb-1.5">
                <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-[11px] font-medium text-primary">
                    {{ $project['category'] }}
                </span>
                <span class="font-mono text-[11px] text-muted-foreground">{{ $project['year'] }}</span>
            </div>

            <a href="{{ route('projects.show', $project['slug']) }}" class="inline-flex items-start justify-between gap-1.5 group/link w-full">
                <h3 class="font-semibold text-base sm:text-lg text-foreground group-hover:text-primary transition-colors leading-snug">
                    {{ $project['title'] }}
                </h3>
                <x-icon name="arrow-up-right" class="w-4 h-4 mt-1 shrink-0 text-muted-foreground group-hover:text-primary transition-colors" />
            </a>

            <p class="text-sm text-muted-foreground mt-1.5 line-clamp-2 leading-relaxed">
                {{ $project['summary'] }}
            </p>
        </div>

        <div class="mt-4 pt-3 border-t border-border/70 space-y-3">
            <div class="flex flex-wrap gap-1.5">
                @foreach(array_slice($project['tags'], 0, $compact ? 3 : 4) as $tag)
                    <span class="inline-flex items-center rounded-full bg-muted px-2.5 py-0.5 text-xs font-normal text-muted-foreground">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>

            @if(!$compact)
                <div class="flex items-center justify-between gap-3 pt-1 text-xs font-medium">
                    <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 text-muted-foreground hover:text-foreground transition-colors">
                        <x-icon name="github" class="w-3.5 h-3.5" />
                        <span>GitHub</span>
                    </a>
                    @if(!empty($project['demo']))
                        <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 text-primary hover:underline">
                            <span>Live Demo</span>
                            <x-icon name="external-link" class="w-3.5 h-3.5" />
                        </a>
                    @else
                        <a href="{{ route('projects.show', $project['slug']) }}"
                           class="inline-flex items-center gap-1 text-primary hover:underline">
                            <span>Detail</span>
                            <x-icon name="arrow-right" class="w-3.5 h-3.5" />
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</article>
