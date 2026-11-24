@extends('layouts.app')

@section('title', $ui['nav']['about'] . ' — ' . $profile['name'])

@section('content')
    <div class="space-y-8">
        {{-- Page Header --}}
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                {{ $locale === 'id' ? 'Tentang Saya' : 'About Me' }}
            </h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $profile['headline_role'] }}
            </p>
        </div>

        {{-- Highlight Banner Card (matching reference /about banner) --}}
        <div class="relative overflow-hidden rounded-2xl border border-border bg-gradient-to-br from-primary/10 via-card to-muted/60 p-6 md:p-8 shadow-xs">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="space-y-3 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/12 text-primary text-xs font-semibold">
                        <x-icon name="graduation" class="w-3.5 h-3.5" />
                        <span>{{ $profile['university'] }} · Informatika</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-foreground">
                        @if($locale === 'id')
                            Menggabungkan <span class="text-primary">Rekayasa Web Modern</span> dan <span class="text-primary">Eksplorasi AI / Sains Data</span>
                        @else
                            Bridging <span class="text-primary">Modern Web Engineering</span> and <span class="text-primary">AI / Data Science</span>
                        @endif
                    </h2>
                    <p class="text-muted-foreground text-sm md:text-base leading-relaxed">
                        {{ $profile['intro'] }}
                    </p>
                    <div class="flex flex-wrap items-center gap-3 pt-1 text-xs font-medium text-muted-foreground">
                        <span class="inline-flex items-center gap-1"><x-icon name="map-pin" class="w-3.5 h-3.5 text-primary" /> {{ $profile['location'] }}</span>
                        <span>•</span>
                        <span class="inline-flex items-center gap-1"><x-icon name="github" class="w-3.5 h-3.5 text-primary" /> github.com/pramacoder</span>
                    </div>
                </div>

                <div class="w-full md:w-auto flex flex-col sm:flex-row md:flex-col gap-3 shrink-0">
                    <a href="{{ route('projects') }}"
                       class="inline-flex h-11 items-center justify-center gap-2 rounded-md bg-primary px-6 text-sm font-semibold text-primary-foreground hover:bg-primary-hover transition-colors">
                        <x-icon name="folder" class="w-4 h-4" />
                        <span>{{ $ui['actions']['view_portfolio'] }}</span>
                    </a>
                    <a href="{{ route('contact') }}"
                       class="inline-flex h-11 items-center justify-center gap-2 rounded-md border border-border bg-card px-6 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                        <span>{{ $ui['actions']['contact_me'] }}</span>
                        <x-icon name="arrow-right" class="w-4 h-4" />
                    </a>
                </div>
            </div>
        </div>

        {{-- Profile & Story Card --}}
        <x-section-card :title="$locale === 'id' ? 'Perjalanan & Latar Belakang' : 'Background & Journey'">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-44 h-44 sm:w-52 sm:h-52 rounded-2xl overflow-hidden border border-border bg-muted shadow-xs">
                        <img src="{{ asset($profile['avatar']) }}" alt="{{ $profile['name'] }}" class="h-full w-full object-cover object-top">
                    </div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-border bg-muted/60 px-3 py-1 text-xs font-mono text-muted-foreground">
                        <img src="{{ asset($profile['logo']) }}" alt="Logo" class="h-4 w-4 rounded-full bg-white object-contain">
                        <span>{{ $profile['handle'] }}</span>
                    </div>
                </div>

                <div class="md:col-span-2 space-y-4 text-sm sm:text-base text-muted-foreground leading-relaxed">
                    @if($locale === 'id')
                        <p>
                            Halo, saya <strong class="text-foreground font-semibold">Pramajaya</strong>, mahasiswa S1 Informatika di <strong class="text-foreground font-semibold">Universitas Udayana</strong> yang memiliki minat kuat pada pengembangan web full-stack serta penerapan Data Science, Machine Learning, dan Natural Language Processing (NLP).
                        </p>
                        <p>
                            Melalui 38 repositori publik di GitHub (<a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" class="text-primary underline-offset-4 hover:underline">github.com/pramacoder</a>), saya konsisten mengubah konsep teoritis menjadi perangkat lunak nyata — mulai dari sistem manajemen reservasi villa & apartemen berstandar produksi, sistem informasi proposal PKM kampus berbasis Laravel, hingga mesin pencari dokumen akademik TF-IDF/BM25 dan model klasifikasi IndoBERT.
                        </p>
                        <p>
                            Tujuan saya ke depan adalah terus mendalami rekayasa sistem berbasis data (Data Science & AI Engineering) sembari mempertahankan kualitas arsitektur frontend/backend yang rapi, teruji, dan mudah digunakan oleh pengguna akhir.
                        </p>
                    @else
                        <p>
                            Hi, I'm <strong class="text-foreground font-semibold">Pramajaya</strong>, an Informatics undergraduate at <strong class="text-foreground font-semibold">Universitas Udayana</strong> passionate about full-stack web engineering as well as practical Data Science, Machine Learning, and Natural Language Processing (NLP).
                        </p>
                        <p>
                            Across 38 public GitHub repositories (<a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" class="text-primary underline-offset-4 hover:underline">github.com/pramacoder</a>), I turn coursework and real-world ideas into working software — spanning multi-unit hospitality booking systems, a Laravel university PKM proposal platform, an Okapi BM25 / TF-IDF academic search engine, and IndoBERT news classification benchmarks.
                        </p>
                        <p>
                            My goal is to grow as a Data Scientist and Software Engineer who bridges strong analytical modeling with clean, well-tested, user-focused web products.
                        </p>
                    @endif
                </div>
            </div>
        </x-section-card>

        {{-- Focus Topics Grid --}}
        <x-section-card :title="$locale === 'id' ? 'Bidang Fokus Utama' : 'Primary Focus Areas'">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($coreSkills as $area)
                    <div class="rounded-lg border border-border bg-background/50 p-5">
                        <div class="flex items-start gap-3.5">
                            <div class="p-2 rounded-md bg-primary/10 text-primary shrink-0">
                                <x-icon :name="$area['icon']" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-base text-foreground">{{ $area['title'] }}</h3>
                                <p class="text-sm text-muted-foreground mt-1 leading-relaxed">{{ $area['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-section-card>

        {{-- Core Values --}}
        <x-section-card :title="$locale === 'id' ? 'Prinsip Kerja' : 'Engineering Principles'">
            @php
                $values = $locale === 'id'
                    ? [
                        ['title' => 'Kode Teruji & Terstruktur', 'desc' => 'Mengutamakan arsitektur yang jelas, tipe data yang rapi, serta automated testing agar sistem andal saat berkembang.'],
                        ['title' => 'Berbasis Data & Bukti', 'desc' => 'Dalam eksperimen ML dan NLP, setiap keputusan arsitektur didasarkan pada baseline pembanding dan metrik evaluasi yang jujur.'],
                        ['title' => 'Fokus Pengalaman Pengguna', 'desc' => 'Model AI atau backend sekuat apa pun perlu disajikan melalui antarmuka yang bersih, responsif, dan mudah dipahami.'],
                        ['title' => 'Belajar Berkelanjutan', 'desc' => 'Aktif membangun proyek nyata di GitHub untuk terus mengasah keahlian lintas web, data science, dan sistem terdistribusi.'],
                    ]
                    : [
                        ['title' => 'Clean, Tested Engineering', 'desc' => 'Prioritizing maintainable architecture, strict typing, and automated tests so systems remain dependable as they grow.'],
                        ['title' => 'Evidence-Driven Modeling', 'desc' => 'In ML and NLP work, grounding every modeling choice in fair baselines, clean preprocessing, and honest evaluation metrics.'],
                        ['title' => 'User-First Interfaces', 'desc' => 'Pairing backend and AI capabilities with calm, accessible, responsive web interfaces that real people enjoy using.'],
                        ['title' => 'Build in the Open', 'desc' => 'Learning through shipping real repositories on GitHub across full-stack web, NLP, information retrieval, and IoT.'],
                    ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($values as $val)
                    <div class="rounded-lg border border-border bg-background/40 p-5">
                        <h3 class="font-semibold text-foreground">{{ $val['title'] }}</h3>
                        <p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">{{ $val['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-section-card>
    </div>
@endsection
