@extends('layouts.app')

@section('title', $ui['nav']['links'] . ' — ' . $profile['name'])

@section('content')
    <div x-data="{
            search: '',
            category: 'all',
            matches(title, desc, cat) {
                const catOk = this.category === 'all' || cat === this.category;
                if (!catOk) return false;
                const q = this.search.trim().toLowerCase();
                if (!q) return true;
                return title.toLowerCase().includes(q) || desc.toLowerCase().includes(q) || cat.toLowerCase().includes(q);
            }
        }"
         class="space-y-6">

        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">{{ $ui['nav']['links'] }}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Akses cepat ke profil GitHub, demo aplikasi live, repositori utama, dan dokumen CV saya.'
                    : 'Quick access to my GitHub profile, live deployed apps, flagship repositories, and downloadable CV.' }}
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 max-w-2xl">
            <div class="relative flex-1">
                <x-icon name="search" class="w-4 h-4 text-muted-foreground absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" />
                <input type="search" x-model="search"
                       aria-label="{{ $locale === 'id' ? 'Cari tautan' : 'Search links' }}"
                       placeholder="{{ $locale === 'id' ? 'Cari tautan...' : 'Search links...' }}"
                       class="h-10 w-full rounded-xl border border-border bg-card pl-10 pr-4 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
            </div>

            <select x-model="category"
                    aria-label="{{ $locale === 'id' ? 'Filter kategori' : 'Filter category' }}"
                    class="h-10 rounded-xl border border-border bg-card px-3.5 text-sm font-medium text-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                <option value="all">{{ $ui['actions']['all'] }}</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($links as $item)
                <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer"
                   x-show="matches(@js($item['title']), @js($item['description']), @js($item['category']))"
                   class="group flex flex-col justify-between rounded-xl border border-border bg-card p-5 transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-semibold text-primary">
                                {{ $item['category'] }}
                            </span>
                            <x-icon name="arrow-up-right" class="w-4 h-4 text-muted-foreground group-hover:text-primary transition-colors" />
                        </div>
                        <h2 class="font-semibold text-base text-foreground group-hover:text-primary transition-colors">
                            {{ $item['title'] }}
                        </h2>
                        <p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">
                            {{ $item['description'] }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-border/70 font-mono text-xs text-muted-foreground truncate">
                        {{ $item['tag'] }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
