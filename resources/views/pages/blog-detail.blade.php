@extends('layouts.app')

@section('title', $post['title'] . ' — ' . $profile['name'])
@section('meta_description', $post['excerpt'])

@section('content')
    <article class="space-y-8">
        <div>
            <a href="{{ route('blog') }}"
               class="inline-flex h-9 items-center gap-2 rounded-md border border-border bg-card px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                <x-icon name="arrow-left" class="w-4 h-4" />
                <span>{{ $ui['actions']['back_to_blog'] }}</span>
            </a>
        </div>

        <header class="space-y-4">
            <div class="flex flex-wrap items-center gap-2.5 text-xs text-muted-foreground">
                <span class="inline-flex items-center rounded-full bg-primary/12 px-3 py-0.5 font-semibold text-primary">
                    {{ $post['category'] }}
                </span>
                <span class="inline-flex items-center gap-1 font-mono">
                    <x-icon name="calendar" class="w-3.5 h-3.5" />
                    {{ $post['date'] }}
                </span>
                <span>•</span>
                <span class="inline-flex items-center gap-1">
                    <x-icon name="clock" class="w-3.5 h-3.5" />
                    {{ $post['read_time'] }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-bold tracking-tight text-foreground leading-tight">
                {{ $post['title'] }}
            </h1>
            <p class="text-base sm:text-lg text-muted-foreground leading-relaxed">
                {{ $post['excerpt'] }}
            </p>
        </header>

        <div class="overflow-hidden rounded-xl border border-border bg-card">
            <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="w-full aspect-[16/9] object-cover">
        </div>

        <x-section-card>
            <div class="space-y-6">
                @foreach($post['sections'] as $section)
                    <div class="space-y-2.5">
                        <h2 class="text-xl font-bold text-foreground">{{ $section['heading'] }}</h2>
                        <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">{{ $section['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-section-card>

        @if($relatedProject)
            <x-section-card :title="$locale === 'id' ? 'Proyek GitHub Terkait' : 'Related GitHub Project'">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 rounded-lg border border-border bg-background/50 p-4 sm:p-5">
                    <div>
                        <h3 class="font-semibold text-foreground">{{ $relatedProject['title'] }}</h3>
                        <p class="text-sm text-muted-foreground mt-1">{{ $relatedProject['summary'] }}</p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('projects.show', $relatedProject['slug']) }}"
                           class="inline-flex h-9 items-center gap-1.5 rounded-md bg-primary px-4 text-xs sm:text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                            <span>{{ $locale === 'id' ? 'Lihat Studi Kasus' : 'View Case Study' }}</span>
                            <x-icon name="arrow-right" class="w-4 h-4" />
                        </a>
                        <a href="{{ $relatedProject['github'] }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex h-9 items-center gap-1.5 rounded-md border border-border bg-card px-3.5 text-xs sm:text-sm font-medium text-foreground hover:bg-accent transition-colors">
                            <x-icon name="github" class="w-4 h-4" />
                            <span>Repo</span>
                        </a>
                    </div>
                </div>
            </x-section-card>
        @endif
    </article>
@endsection
