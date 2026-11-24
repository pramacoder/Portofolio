@extends('layouts.app')

@section('title', $ui['nav']['education'] . ' — ' . $profile['name'])

@section('content')
    <div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                {{ $ui['nav']['education'] }}
            </h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Latar belakang akademik dan pembelajaran berkelanjutan di bidang Informatika, Web, dan AI.'
                    : 'Academic background and continuous self-directed learning in Informatics, Web, and AI.' }}
            </p>
        </div>

        {{-- Formal Education --}}
        <x-section-card :title="$locale === 'id' ? 'Pendidikan Formal' : 'Formal Education'">
            <div class="space-y-6">
                @foreach($education['formal'] as $item)
                    <div class="relative pl-6 border-l-2 border-border">
                        <div class="absolute -left-[7px] top-1.5 h-3 w-3 rounded-full bg-primary ring-4 ring-card"></div>
                        <h3 class="font-semibold text-lg sm:text-xl text-foreground">{{ $item['degree'] }}</h3>
                        <p class="text-sm text-muted-foreground mt-1">
                            <span class="font-medium text-foreground/85">{{ $item['institution'] }}</span> • {{ $item['period'] }}
                        </p>
                        <ul class="mt-4 space-y-2 list-disc list-inside text-sm sm:text-base text-muted-foreground leading-relaxed">
                            @foreach($item['highlights'] as $hl)
                                <li>{{ $hl }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </x-section-card>

        {{-- Continuous Learning --}}
        <x-section-card :title="$locale === 'id' ? 'Pembelajaran Berkelanjutan' : 'Continuous Learning'">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($education['continuous'] as $learn)
                    <div class="rounded-lg border border-border bg-background/50 p-5">
                        <h3 class="font-semibold text-base text-foreground">{{ $learn['title'] }}</h3>
                        <p class="text-sm text-muted-foreground mt-2 leading-relaxed">{{ $learn['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-section-card>
    </div>
@endsection
