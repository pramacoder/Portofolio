@extends('layouts.app')

@section('title', $ui['nav']['skills'] . ' — ' . $profile['name'])

@section('content')
    <div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                {{ $ui['nav']['skills'] }}
            </h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Hard skills, perangkat AI/ML, dan soft skills yang saya gunakan dalam proyek nyata di GitHub.'
                    : 'Hard skills, AI/ML frameworks, and soft skills demonstrated across my real GitHub repositories.' }}
            </p>
        </div>

        {{-- Hard Skills (matches reference 2-col card grid with inner 2/3-col skill tiles) --}}
        <x-section-card :title="'Hard Skills'">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($skillsData['hard'] as $group)
                    <div class="rounded-lg border border-border bg-background/40 p-5 sm:p-6">
                        <h3 class="font-semibold text-base sm:text-lg text-foreground mb-4">{{ $group['title'] }}</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            @foreach($group['items'] as $item)
                                <div class="flex flex-col items-center justify-center p-3 border border-border/80 bg-card rounded-lg text-center hover:border-primary/45 transition-colors">
                                    <span class="h-8 w-8 rounded-md bg-primary/10 text-primary flex items-center justify-center font-mono text-xs font-bold mb-2">
                                        {{ strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $item), 0, 2)) }}
                                    </span>
                                    <span class="text-xs sm:text-sm font-medium text-foreground leading-snug">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </x-section-card>

        {{-- Soft Skills --}}
        <x-section-card :title="'Soft Skills'">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($skillsData['soft'] as $soft)
                    <div class="rounded-lg border border-border bg-background/40 p-5">
                        <h3 class="font-semibold text-foreground">{{ $soft['title'] }}</h3>
                        <p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">{{ $soft['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-section-card>

        {{-- Languages --}}
        <x-section-card :title="$locale === 'id' ? 'Bahasa' : 'Languages'">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($skillsData['languages'] as $lang)
                    <div class="rounded-lg border border-border bg-background/40 p-5 flex items-center justify-between gap-4">
                        <div>
                            <h3 class="font-semibold text-foreground">{{ $lang['name'] }}</h3>
                            <p class="text-sm text-muted-foreground mt-0.5">{{ $lang['level'] }}</p>
                        </div>
                        <span class="h-2.5 w-2.5 rounded-full bg-primary shrink-0"></span>
                    </div>
                @endforeach
            </div>
        </x-section-card>
    </div>
@endsection
