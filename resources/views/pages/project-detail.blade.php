@extends('layouts.app')

@section('title', $project['title'] . ' — ' . $profile['name'])
@section('meta_description', $project['summary'])

@section('content')
    <div class="space-y-8">
        {{-- Top Action Bar --}}
        <div class="flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('projects') }}"
               class="inline-flex h-9 items-center gap-2 rounded-md border border-border bg-card px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                <x-icon name="arrow-left" class="w-4 h-4" />
                <span>{{ $ui['actions']['back_to_projects'] }}</span>
            </a>

            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex h-9 items-center gap-2 rounded-md border border-border bg-card px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                    <x-icon name="github" class="w-4 h-4" />
                    <span>{{ $ui['actions']['view_github'] }}</span>
                </a>
                @if(!empty($project['demo']))
                    <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex h-9 items-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                        <span>{{ $ui['actions']['live_demo'] }}</span>
                        <x-icon name="external-link" class="w-4 h-4" />
                    </a>
                @endif
            </div>
        </div>

        {{-- Project Header (matches reference /projects/[slug]) --}}
        <div class="space-y-4">
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center rounded-full bg-primary px-3 py-0.5 text-xs font-semibold text-primary-foreground">
                    {{ $project['category'] }}
                </span>
                <span class="inline-flex items-center rounded-full border border-border bg-card px-3 py-0.5 text-xs font-medium text-foreground">
                    {{ $project['status'] }}
                </span>
                <span class="inline-flex items-center rounded-full border border-border bg-card px-3 py-0.5 text-xs font-mono text-muted-foreground">
                    {{ $project['year'] }}
                </span>
            </div>

            <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-foreground">{{ $project['title'] }}</h1>
                <p class="text-lg sm:text-xl text-muted-foreground mt-2">{{ $project['subtitle'] }}</p>
            </div>

            <div class="flex flex-wrap items-center gap-4 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1.5">
                    <x-icon name="user" class="w-4 h-4 text-primary" />
                    {{ $project['role'] }}
                </span>
                <span class="inline-flex items-center gap-1.5 font-mono text-xs">
                    <x-icon name="github" class="w-4 h-4 text-primary" />
                    pramacoder/{{ $project['repo'] }}
                </span>
            </div>
        </div>

        {{-- Cover Visual --}}
        <div class="overflow-hidden rounded-xl border border-border bg-card shadow-xs">
            <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="w-full aspect-[16/9] object-cover">
        </div>

        {{-- 2/3 Content + 1/3 Metadata Grid (matches reference detail layout) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <x-section-card>
                    <h2 class="text-xl font-bold text-foreground">{{ $locale === 'id' ? 'Gambaran Umum' : 'Overview' }}</h2>
                    <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">{{ $project['summary'] }}</p>
                </x-section-card>

                <x-section-card>
                    <h2 class="text-xl font-bold text-foreground">{{ $locale === 'id' ? 'Permasalahan' : 'Problem Statement' }}</h2>
                    <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">{{ $project['problem'] }}</p>
                </x-section-card>

                <x-section-card>
                    <h2 class="text-xl font-bold text-foreground">{{ $locale === 'id' ? 'Solusi & Implementasi' : 'Solution & Architecture' }}</h2>
                    <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">{{ $project['solution'] }}</p>
                </x-section-card>

                <x-section-card>
                    <h2 class="text-xl font-bold text-foreground">{{ $locale === 'id' ? 'Hasil & Verifikasi' : 'Outcomes & Verification' }}</h2>
                    <ul class="space-y-2.5 text-sm sm:text-base text-muted-foreground">
                        @foreach($project['results'] as $res)
                            <li class="flex items-start gap-2.5">
                                <span class="mt-1 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary/12 text-primary">
                                    <x-icon name="check" class="w-3.5 h-3.5" />
                                </span>
                                <span>{{ $res }}</span>
                            </li>
                        @endforeach
                    </ul>
                </x-section-card>
            </div>

            {{-- Right Metadata Sidebar --}}
            <div class="space-y-6">
                <x-section-card>
                    <h2 class="text-base font-bold text-foreground">{{ $locale === 'id' ? 'Teknologi' : 'Tech Stack' }}</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project['tags'] as $tag)
                            <span class="inline-flex items-center rounded-full border border-border bg-muted px-3 py-1 text-xs font-medium text-foreground">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </x-section-card>

                <x-section-card>
                    <h2 class="text-base font-bold text-foreground">{{ $locale === 'id' ? 'Fitur Utama' : 'Key Features' }}</h2>
                    <ul class="space-y-2 text-sm text-muted-foreground">
                        @foreach($project['features'] as $feat)
                            <li class="flex items-start gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-primary mt-2 shrink-0"></span>
                                <span>{{ $feat }}</span>
                            </li>
                        @endforeach
                    </ul>
                </x-section-card>

                <x-section-card>
                    <h2 class="text-base font-bold text-foreground">{{ $locale === 'id' ? 'Tautan Proyek' : 'Project Links' }}</h2>
                    <div class="space-y-2.5">
                        <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md border border-border bg-background px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                            <x-icon name="github" class="w-4 h-4" />
                            <span>{{ $ui['actions']['view_github'] }}</span>
                        </a>
                        @if(!empty($project['demo']))
                            <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                                <span>{{ $ui['actions']['live_demo'] }}</span>
                                <x-icon name="external-link" class="w-4 h-4" />
                            </a>
                        @endif
                    </div>
                </x-section-card>
            </div>
        </div>

        {{-- Related Projects --}}
        @if(count($relatedProjects) > 0)
            <x-section-card :title="$locale === 'id' ? 'Proyek Terkait' : 'Related Projects'">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach($relatedProjects as $rel)
                        <x-project-card :project="$rel" :compact="true" />
                    @endforeach
                </div>
            </x-section-card>
        @endif
    </div>
@endsection
