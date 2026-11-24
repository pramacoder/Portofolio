@extends('layouts.app')

@section('title', $profile['name'] . ' — ' . $profile['headline_role'])
@section('meta_description', $profile['intro'])

@section('content')
    {{-- Section 1: Hero (matches reference split layout + 4-col stat strip + circular portrait) --}}
    <section class="py-8 sm:py-12 md:py-16">
        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-10">
            <div class="flex-1 min-w-0 space-y-6 w-full">
                <div class="space-y-3">
                    <div class="inline-flex items-center gap-2 rounded-full border border-border bg-card px-3 py-1 text-xs font-medium text-muted-foreground">
                        <span class="h-2 w-2 rounded-full bg-primary"></span>
                        <span>{{ $profile['university'] }} · {{ $profile['location'] }}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-foreground">
                        {{ $profile['name'] }}
                    </h1>
                    <p class="text-lg sm:text-xl text-muted-foreground leading-relaxed">
                        {{ $profile['headline_role'] }}
                    </p>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3 w-full sm:w-auto">
                    <a href="{{ route('contact') }}"
                       class="inline-flex h-11 items-center justify-center gap-2 whitespace-nowrap rounded-md bg-primary px-6 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors w-full sm:w-auto">
                        <span>{{ $ui['actions']['contact_me'] }}</span>
                        <x-icon name="arrow-right" class="w-4 h-4" />
                    </a>
                    <div class="grid grid-cols-2 gap-3 w-full sm:flex sm:w-auto">
                        <a href="{{ route('projects') }}"
                           class="inline-flex h-11 items-center justify-center gap-2 whitespace-nowrap rounded-md border border-border bg-card px-4 sm:px-5 text-xs sm:text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                            <span class="truncate">{{ $ui['actions']['view_portfolio'] }}</span>
                            <x-icon name="folder" class="w-4 h-4 shrink-0" />
                        </a>
                        <a href="{{ route('skills') }}"
                           class="inline-flex h-11 items-center justify-center gap-2 whitespace-nowrap rounded-md border border-border bg-card px-4 sm:px-5 text-xs sm:text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                            <span class="truncate">{{ $ui['actions']['view_skills'] }}</span>
                            <x-icon name="wrench" class="w-4 h-4 shrink-0" />
                        </a>
                    </div>
                </div>

                {{-- Verified GitHub Statistics Strip --}}
                <div class="pt-2">
                    <div class="grid grid-cols-2 sm:grid-cols-4 rounded-xl border border-border bg-card/70 overflow-hidden">
                        @foreach($profile['stats'] as $idx => $stat)
                            <a href="{{ $stat['href'] }}"
                               @if($stat['external']) target="_blank" rel="noopener noreferrer" @endif
                               class="group px-3 py-3 flex flex-col items-center text-center justify-center transition-colors hover:bg-accent/50
                                      {{ $idx % 2 === 0 ? 'border-r border-border/70' : '' }}
                                      {{ $idx < 2 ? 'border-b sm:border-b-0 border-border/70' : '' }}
                                      {{ $idx < 3 ? 'sm:border-r sm:border-border/70' : '' }}">
                                <div class="h-7 w-7 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-1.5 shrink-0 group-hover:scale-105 transition-transform">
                                    <x-icon :name="$stat['icon']" class="w-3.5 h-3.5" />
                                </div>
                                <div class="text-base sm:text-lg font-extrabold text-foreground group-hover:text-primary transition-colors tracking-tight font-mono">
                                    {{ $stat['value'] }}
                                </div>
                                <div class="text-[11px] sm:text-xs text-muted-foreground font-medium leading-snug mt-0.5">
                                    {{ $stat['label'] }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Right Column: Circular Owner Portrait --}}
            <div class="w-full lg:w-1/3 flex justify-center">
                <div class="relative w-52 h-52 sm:w-60 sm:h-60 lg:w-64 lg:h-64 xl:w-72 xl:h-72 rounded-full overflow-hidden border-4 border-primary/15 bg-muted shadow-sm shrink-0">
                    <img src="{{ asset($profile['avatar']) }}"
                         alt="{{ $profile['name'] }}"
                         class="h-full w-full object-cover object-top">
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: Introduction Card --}}
    <x-section-card>
        <p class="text-base sm:text-lg text-muted-foreground leading-relaxed">
            {{ $profile['intro'] }}
        </p>
    </x-section-card>

    {{-- Section 3: Technologies I Work With (Expandable 4-column tile grid matching reference) --}}
    <x-section-card :title="$ui['sections']['tech_stack']" class="mt-12" x-data="{ expanded: false }">
        <div class="relative">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 overflow-hidden transition-all duration-300"
                 :class="expanded ? 'max-h-[1200px]' : 'max-h-[210px] sm:max-h-[215px]'">
                @foreach($technologies as $tech)
                    <div class="flex flex-col items-center justify-center p-4 bg-muted/70 hover:bg-accent/70 border border-border/60 rounded-lg h-24 transition-colors text-center">
                        <span class="font-mono text-xs font-semibold text-primary bg-primary/10 px-2 py-0.5 rounded mb-1.5">
                            {{ $tech['short'] }}
                        </span>
                        <span class="text-sm font-semibold text-foreground leading-tight">{{ $tech['name'] }}</span>
                        <span class="text-[11px] text-muted-foreground mt-0.5">{{ $tech['category'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-center pt-2">
            <button type="button"
                    @click="expanded = !expanded"
                    class="inline-flex items-center gap-1.5 rounded-md border border-border bg-background px-4 py-2 text-xs sm:text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span x-text="expanded ? '{{ $ui['actions']['show_less'] }}' : '{{ $ui['actions']['show_more'] }}'"></span>
            </button>
        </div>
    </x-section-card>

    {{-- Section 4: Academic & Technical Exploration (3-column visual cards matching reference) --}}
    <x-section-card :title="$ui['sections']['highlights']" class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($highlights as $item)
                <a href="{{ $item['href'] }}"
                   class="group rounded-lg border border-border bg-card shadow-xs overflow-hidden h-full flex flex-col justify-between transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
                    <div>
                        <div class="relative h-44 w-full overflow-hidden border-b border-border bg-muted/40">
                            <img src="{{ asset($item['image']) }}"
                                 alt="{{ $item['title'] }}"
                                 loading="lazy"
                                 class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]">
                        </div>
                        <div class="p-4 sm:p-5">
                            <div class="flex flex-wrap items-center gap-2 mb-2.5">
                                <span class="inline-flex items-center rounded-full border border-primary/25 bg-primary/10 text-primary text-xs font-semibold px-2.5 py-0.5">
                                    {{ $item['badge_primary'] }}
                                </span>
                                <span class="inline-flex items-center rounded-full border border-border bg-muted/70 text-muted-foreground text-xs font-medium px-2.5 py-0.5">
                                    {{ $item['badge_secondary'] }}
                                </span>
                            </div>
                            <h3 class="font-semibold text-base sm:text-lg text-foreground group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-sm text-muted-foreground mt-2 line-clamp-3 leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </x-section-card>

    {{-- Section 5: Core Skills (2x2 bordered cards matching reference) --}}
    <x-section-card :title="$ui['sections']['core_skills']" class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($coreSkills as $skill)
                <div class="rounded-lg border border-border bg-background/50 p-5 sm:p-6 transition-colors hover:border-primary/40">
                    <div class="flex items-start gap-4">
                        <div class="bg-primary/10 text-primary p-2.5 rounded-md shrink-0">
                            <x-icon :name="$skill['icon']" class="w-5 h-5" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-base text-foreground">{{ $skill['title'] }}</h3>
                            <p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">{{ $skill['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center pt-2">
            <a href="{{ route('skills') }}"
               class="inline-flex items-center gap-2 rounded-md border border-border bg-background px-5 py-2 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span>{{ $ui['actions']['view_skills'] }}</span>
                <x-icon name="arrow-right" class="w-4 h-4" />
            </a>
        </div>
    </x-section-card>

    {{-- Section 6: Featured Projects (3-column grid from real GitHub repos) --}}
    <x-section-card :title="$ui['sections']['featured_projects']" class="mt-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-5">
            @foreach($featuredProjects as $project)
                <x-project-card :project="$project" :compact="true" />
            @endforeach
        </div>
        <div class="flex justify-center pt-3">
            <a href="{{ route('projects') }}"
               class="inline-flex items-center gap-2 rounded-md border border-border bg-background px-5 py-2.5 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span>{{ $ui['actions']['view_all_projects'] }}</span>
                <x-icon name="arrow-right" class="w-4 h-4" />
            </a>
        </div>
    </x-section-card>

    {{-- Section 7: Latest Blog (2-column grid matching reference) --}}
    <x-section-card :title="$ui['sections']['latest_blog']" class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($latestPosts as $post)
                <x-blog-card :post="$post" :readMoreLabel="$ui['actions']['read_more']" />
            @endforeach
        </div>
        <div class="flex justify-center pt-3">
            <a href="{{ route('blog') }}"
               class="inline-flex items-center gap-2 rounded-md border border-border bg-background px-5 py-2.5 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span>{{ $ui['actions']['view_all_articles'] }}</span>
                <x-icon name="arrow-right" class="w-4 h-4" />
            </a>
        </div>
    </x-section-card>

    {{-- Section 8: Contact CTA Card --}}
    <x-section-card :title="$ui['sections']['contact_cta_title']" class="mt-12">
        <div class="text-center py-2">
            <p class="text-base sm:text-lg text-muted-foreground mb-6 max-w-2xl mx-auto leading-relaxed">
                {{ $ui['sections']['contact_cta_desc'] }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('contact') }}"
                   class="inline-flex h-11 items-center justify-center gap-2 rounded-md bg-primary px-8 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors w-full sm:w-auto">
                    <span>{{ $ui['actions']['contact_me'] }}</span>
                    <x-icon name="arrow-right" class="w-4 h-4" />
                </a>
                <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex h-11 items-center justify-center gap-2 rounded-md border border-border bg-background px-6 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors w-full sm:w-auto">
                    <x-icon name="github" class="w-4 h-4" />
                    <span>GitHub @pramacoder</span>
                </a>
            </div>
        </div>
    </x-section-card>
@endsection
