@extends('layouts.app')

@section('title', $ui['nav']['contact'] . ' — ' . $profile['name'])

@section('content')
    <div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                {{ $ui['nav']['contact'] }}
            </h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                {{ $locale === 'id'
                    ? 'Hubungi saya untuk kolaborasi proyek web, riset AI/ML, atau peluang kerja sama.'
                    : 'Reach out for web development collaborations, AI/ML research, or engineering opportunities.' }}
            </p>
        </div>

        @if(session('contact_success'))
            <div role="status" class="rounded-xl border border-primary/35 bg-primary/10 px-4 py-3 text-sm text-foreground flex items-start gap-3">
                <x-icon name="check" class="w-5 h-5 text-primary shrink-0 mt-0.5" />
                <span>{{ session('contact_success') }}</span>
            </div>
        @endif

        {{-- 3-Column Reference Contact Grid (md:col-span-2 Form + md:col-span-1 Info Cards) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <x-section-card>
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        {{-- Honeypot anti-spam field matching reference pattern --}}
                        <div class="hidden" aria-hidden="true">
                            <label for="website">Leave this empty</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="name" class="text-sm font-medium text-foreground block">
                                    {{ $locale === 'id' ? 'Nama' : 'Name' }}
                                </label>
                                <input id="name" name="name" type="text" required value="{{ old('name') }}"
                                       placeholder="{{ $locale === 'id' ? 'Nama Anda' : 'Your name' }}"
                                       class="flex h-10 w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                @error('name')
                                    <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="text-sm font-medium text-foreground block">Email</label>
                                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                       placeholder="email@example.com"
                                       class="flex h-10 w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                @error('email')
                                    <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="text-sm font-medium text-foreground block">
                                {{ $locale === 'id' ? 'Subjek' : 'Subject' }}
                            </label>
                            <input id="subject" name="subject" type="text" required value="{{ old('subject') }}"
                                   placeholder="{{ $locale === 'id' ? 'Subjek pesan Anda' : 'Subject of your message' }}"
                                   class="flex h-10 w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                            @error('subject')
                                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="text-sm font-medium text-foreground block">
                                {{ $locale === 'id' ? 'Pesan' : 'Message' }}
                            </label>
                            <textarea id="message" name="message" rows="5" required
                                      placeholder="{{ $locale === 'id' ? 'Ceritakan tentang proyek, ide, atau pertanyaan Anda...' : 'Tell me about your project, idea, or question...' }}"
                                      class="flex w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary resize-y">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="inline-flex h-11 items-center justify-center gap-2 rounded-md bg-primary px-6 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors w-full sm:w-auto">
                            <x-icon name="mail" class="w-4 h-4" />
                            <span>{{ $ui['actions']['send_message'] }}</span>
                        </button>
                    </form>
                </x-section-card>
            </div>

            {{-- Right Column Contact Details --}}
            <div class="space-y-4">
                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">
                        <x-icon name="mail" class="w-4 h-4" />
                        <h2>Email</h2>
                    </div>
                    <a href="mailto:{{ $profile['email'] }}" class="text-sm text-foreground hover:text-primary underline-offset-4 hover:underline break-all block">
                        {{ $profile['email'] }}
                    </a>
                </div>

                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">
                        <x-icon name="github" class="w-4 h-4" />
                        <h2>GitHub</h2>
                    </div>
                    <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" class="text-sm text-foreground hover:text-primary underline-offset-4 hover:underline block">
                        github.com/pramacoder
                    </a>
                </div>

                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">
                        <x-icon name="map-pin" class="w-4 h-4" />
                        <h2>{{ $locale === 'id' ? 'Lokasi' : 'Location' }}</h2>
                    </div>
                    <p class="text-sm text-muted-foreground">{{ $profile['location'] }}</p>
                    <p class="text-xs text-muted-foreground">{{ $profile['university'] }}</p>
                </div>

                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">
                        <x-icon name="clock" class="w-4 h-4" />
                        <h2>{{ $locale === 'id' ? 'Ketersediaan' : 'Availability' }}</h2>
                    </div>
                    <p class="text-sm text-muted-foreground leading-relaxed">
                        {{ $locale === 'id'
                            ? 'Terbuka untuk kolaborasi proyek web, riset AI/Data Science, dan kesempatan magang.'
                            : 'Open to web development projects, AI/Data Science research collaborations, and internships.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
