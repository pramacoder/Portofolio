@extends('layouts.app')

@section('title', $ui['nav']['projects'] . ' — ' . $profile['name'])

@section('content')
    <div x-data="{
            search: '',
            selectedTag: @js($initialTag),
            matches(title, summary, category, tags) {
                const q = this.search.trim().toLowerCase();
                const tagMatch = !this.selectedTag || category === this.selectedTag || tags.includes(this.selectedTag);
                if (!tagMatch) return false;
                if (!q) return true;
                return title.toLowerCase().includes(q)
                    || summary.toLowerCase().includes(q)
                    || category.toLowerCase().includes(q)
                    || tags.join(' ').toLowerCase().includes(q);
            }
        }"
         class="space-y-8">

        {{-- Page Header --}}
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                {{ $ui['nav']['projects'] }}
            </h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Koleksi proyek nyata dari GitHub @pramacoder mencakup pengembangan web full-stack, AI/NLP, Information Retrieval, BI, dan IoT.'
                    : 'Curated real projects from GitHub @pramacoder spanning full-stack web engineering, AI/NLP, Information Retrieval, BI, and IoT.' }}
            </p>
        </div>

        {{-- Search & Tag Filter Card (matches reference /projects filter box) --}}
        <div class="space-y-4 bg-card border border-border rounded-xl p-4 shadow-xs">
            <div class="relative">
                <x-icon name="search" class="w-4 h-4 text-muted-foreground absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" />
                <input type="search"
                       x-model="search"
                       aria-label="{{ $locale === 'id' ? 'Cari proyek' : 'Search projects' }}"
                       placeholder="{{ $locale === 'id' ? 'Cari proyek (judul, deskripsi, teknologi)...' : 'Search projects (title, description, tech stack)...' }}"
                       class="flex h-10 w-full rounded-md border border-border bg-background pl-9 pr-4 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-colors">
            </div>

            <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-border/70 text-xs">
                <span class="text-muted-foreground font-medium inline-flex items-center gap-1 mr-1">
                    <x-icon name="filter" class="w-3.5 h-3.5" />
                    <span>{{ $locale === 'id' ? 'Filter Tag:' : 'Filter Tag:' }}</span>
                </span>
                <button type="button"
                        @click="selectedTag = ''"
                        :class="selectedTag === '' ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground hover:text-foreground'"
                        class="px-3 py-1 rounded-full text-xs font-medium transition-colors">
                    {{ $ui['actions']['all'] }}
                </button>
                @foreach($filterTags as $tag)
                    <button type="button"
                            @click="selectedTag = selectedTag === '{{ $tag }}' ? '' : '{{ $tag }}'"
                            :class="selectedTag === '{{ $tag }}' ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground hover:text-foreground'"
                            class="px-3 py-1 rounded-full text-xs font-medium transition-colors">
                        {{ $tag }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Featured Projects Section --}}
        @php
            $featured = array_values(array_filter($projects, fn ($p) => $p['featured']));
            $others = array_values(array_filter($projects, fn ($p) => !$p['featured']));
        @endphp

        <x-section-card :title="$ui['sections']['featured_projects']"
                        :subtitle="$locale === 'id' ? 'Proyek utama yang merepresentasikan keahlian saya di Full-Stack Web, AI/NLP, dan Information Retrieval.' : 'Flagship repositories demonstrating full-stack architecture, NLP, and Information Retrieval.'">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($featured as $project)
                    <div x-show="matches(@js($project['title']), @js($project['summary']), @js($project['category']), @js($project['tags']))">
                        <x-project-card :project="$project" />
                    </div>
                @endforeach
            </div>
        </x-section-card>

        {{-- Additional Projects Section --}}
        <x-section-card :title="$locale === 'id' ? 'Proyek & Eksperimen Lainnya' : 'More Projects & Experiments'"
                        :subtitle="$locale === 'id' ? 'Eksplorasi Deep Learning, Chatbot Gemini, Business Intelligence, Laravel, dan IoT.' : 'Additional builds across Deep Learning, Gemini AI, Business Intelligence, Laravel, and IoT.'">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                @foreach($others as $project)
                    <div x-show="matches(@js($project['title']), @js($project['summary']), @js($project['category']), @js($project['tags']))">
                        <x-project-card :project="$project" />
                    </div>
                @endforeach
            </div>
        </x-section-card>

        {{-- GitHub Link Footer Card --}}
        <div class="rounded-xl border border-border bg-card p-5 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <h2 class="font-semibold text-base text-foreground">
                    {{ $locale === 'id' ? 'Ingin melihat seluruh 38 repositori publik?' : 'Want to explore all 38 public repositories?' }}
                </h2>
                <p class="text-sm text-muted-foreground mt-0.5">
                    {{ $locale === 'id' ? 'Kunjungi profil GitHub saya untuk kode sumber, notebook eksperimen, dan commit terbaru.' : 'Visit my GitHub profile for full source code, experiment notebooks, and latest commits.' }}
                </p>
            </div>
            <a href="{{ $profile['github'] }}?tab=repositories" target="_blank" rel="noopener noreferrer"
               class="inline-flex h-10 shrink-0 items-center justify-center gap-2 rounded-md bg-primary px-5 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                <x-icon name="github" class="w-4 h-4" />
                <span>github.com/pramacoder</span>
            </a>
        </div>
    </div>
@endsection
