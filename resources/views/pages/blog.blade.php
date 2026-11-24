@extends('layouts.app')

@section('title', $ui['nav']['blog'] . ' — ' . $profile['name'])

@section('content')
    <div x-data="{
            search: '',
            category: 'all',
            matches(title, excerpt, cat) {
                const catOk = this.category === 'all' || cat === this.category;
                if (!catOk) return false;
                const q = this.search.trim().toLowerCase();
                if (!q) return true;
                return title.toLowerCase().includes(q) || excerpt.toLowerCase().includes(q) || cat.toLowerCase().includes(q);
            }
        }"
         class="space-y-6">

        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">Blog</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Catatan teknis dan pembelajaran dari proyek nyata seputar Web Development, Information Retrieval, NLP, dan Machine Learning.'
                    : 'Technical notes and engineering lessons from building Web, Information Retrieval, NLP, and Machine Learning projects.' }}
            </p>
        </div>

        {{-- Search Box (matches reference /blog search + rounded-full tab pills) --}}
        <div class="relative">
            <x-icon name="search" class="w-4 h-4 text-muted-foreground absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" />
            <input type="search"
                   x-model="search"
                   aria-label="{{ $locale === 'id' ? 'Cari artikel' : 'Search articles' }}"
                   placeholder="{{ $locale === 'id' ? 'Cari artikel...' : 'Search articles...' }}"
                   class="flex h-10 w-full rounded-xl border border-border bg-card pl-10 pr-4 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
        </div>

        {{-- Category Pill Tabs --}}
        <div class="overflow-x-auto no-scrollbar pb-1">
            <div role="tablist" class="inline-flex items-center rounded-full bg-muted/80 p-1 gap-1 border border-border">
                <button type="button" role="tab"
                        @click="category = 'all'"
                        :aria-selected="category === 'all'"
                        :class="category === 'all' ? 'bg-card text-foreground shadow-xs' : 'text-muted-foreground hover:text-foreground'"
                        class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all">
                    {{ $ui['actions']['all'] }}
                </button>
                @foreach($categories as $cat)
                    <button type="button" role="tab"
                            @click="category = '{{ $cat }}'"
                            :aria-selected="category === '{{ $cat }}'"
                            :class="category === '{{ $cat }}' ? 'bg-card text-foreground shadow-xs' : 'text-muted-foreground hover:text-foreground'"
                            class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Articles Grid --}}
        @if(count($posts) === 0)
            <x-section-card>
                <div class="py-10 text-center text-muted-foreground">
                    {{ $locale === 'id' ? 'Belum ada artikel yang dipublikasikan.' : 'No articles published yet.' }}
                </div>
            </x-section-card>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($posts as $post)
                    <div x-show="matches(@js($post['title']), @js($post['excerpt']), @js($post['category']))">
                        <x-blog-card :post="$post" :readMoreLabel="$ui['actions']['read_more']" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
