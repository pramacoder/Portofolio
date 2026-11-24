@extends('layouts.app')

@section('title', $ui['nav']['experience'] . ' — ' . $profile['name'])

@section('content')
    <div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                {{ $locale === 'id' ? 'Pengalaman & Proyek Terverifikasi' : 'Experience & Engineering Track' }}
            </h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Rekam jejak pengembangan perangkat lunak, proyek kampus, dan riset AI/NLP yang terdokumentasi di GitHub.'
                    : 'Verified software engineering, university system development, and AI/NLP research documented on GitHub.' }}
            </p>
        </div>

        <x-section-card>
            <div class="space-y-8">
                @foreach($experiences as $idx => $exp)
                    <div class="relative pl-6 border-l-2 border-border {{ !$loop->last ? 'pb-8' : '' }}">
                        <div class="absolute -left-[7px] top-1.5 h-3 w-3 rounded-full bg-primary ring-4 ring-card"></div>
                        <h2 class="font-semibold text-lg sm:text-xl text-foreground leading-snug">{{ $exp['role'] }}</h2>
                        <p class="text-sm text-muted-foreground mt-1">
                            <span class="font-medium text-foreground/85">{{ $exp['org'] }}</span>
                            <span> • </span>
                            <span>{{ $exp['period'] }}</span>
                            <span> • </span>
                            <span>{{ $exp['location'] }}</span>
                        </p>

                        <ul class="mt-4 space-y-2 list-disc list-inside text-sm sm:text-base text-muted-foreground leading-relaxed">
                            @foreach($exp['bullets'] as $bullet)
                                <li>{{ $bullet }}</li>
                            @endforeach
                        </ul>

                        <div class="flex flex-wrap gap-2 mt-4">
                            @foreach($exp['tags'] as $tag)
                                <span class="inline-flex items-center rounded-full border border-border bg-muted/60 px-2.5 py-0.5 text-xs font-medium text-foreground">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </x-section-card>
    </div>
@endsection
