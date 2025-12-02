@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
<!-- Projects Hero Section -->
<section class="py-12 lg:py-20 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-4 lg:mb-6">
                My Projects
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                A collection of projects I've worked on, showcasing my skills and experience
            </p>
        </div>
    </div>
</section>

<!-- Projects Grid Section -->
<section class="py-12 lg:py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Tabs - Mobile: Scrollable, Desktop: Centered -->
        <div class="flex justify-center mb-8 lg:mb-12 overflow-x-auto" x-data="{ active: 'all' }">
            <div class="flex space-x-2 lg:space-x-4">
                <button @click="active = 'all'" 
                        :class="active === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                        class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                    All
                </button>
                <button @click="active = 'web'" 
                        :class="active === 'web' ? 'bg-blue-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                        class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                    Web
                </button>
                <button @click="active = 'mobile'" 
                        :class="active === 'mobile' ? 'bg-blue-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                        class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                    Mobile
                </button>
                <button @click="active = 'design'" 
                        :class="active === 'design' ? 'bg-blue-600 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                        class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                    Design
                </button>
            </div>
        </div>

        <!-- Projects Grid - Mobile: 1 column, Tablet: 2 columns, Desktop: 3 columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @for($i = 1; $i <= 6; $i++)
            <div class="group bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                <!-- Project Image -->
                <div class="relative aspect-video bg-gradient-to-br from-blue-400 to-purple-500 dark:from-blue-600 dark:to-purple-700 overflow-hidden">
                    <img src="{{ asset('images/portfolio/projects/project-' . $i . '.jpg') }}" 
                         alt="Project {{ $i }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                         onerror="this.style.display='none';">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-opacity duration-300"></div>
                    
                    <!-- Overlay on Hover -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="#" class="px-6 py-3 bg-white dark:bg-gray-900 text-gray-900 dark:text-white rounded-lg font-semibold hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            View Project
                        </a>
                    </div>
                </div>

                <!-- Project Info -->
                <div class="p-4 lg:p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs lg:text-sm text-blue-600 dark:text-blue-400 font-medium">
                            Web Development
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">2024</span>
                    </div>
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        Project Title {{ $i }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm lg:text-base mb-4">
                        Brief description of the project, technologies used, and key features implemented.
                    </p>
                    
                    <!-- Technologies -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(['Laravel', 'Vue.js', 'Tailwind'] as $tech)
                        <span class="px-3 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>

                    <!-- Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline text-sm lg:text-base font-medium">
                            Live Demo →
                        </a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white text-sm lg:text-base font-medium">
                            GitHub →
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Featured Project Section - Mobile: Stacked, Desktop: Side by Side -->
<section class="py-12 lg:py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl lg:text-4xl font-bold text-center text-gray-900 dark:text-white mb-8 lg:mb-12">
                Featured Project
            </h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Image - Mobile First -->
                <div class="order-1 lg:order-1">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <div class="aspect-video bg-gradient-to-br from-blue-400 to-purple-500 dark:from-blue-600 dark:to-purple-700">
                            <img src="{{ asset('images/portfolio/projects/featured.jpg') }}" 
                                 alt="Featured Project" 
                                 class="w-full h-full object-cover"
                                 onerror="this.style.display='none';">
                        </div>
                    </div>
                </div>

                <!-- Content - Mobile Second -->
                <div class="order-2 lg:order-2">
                    <span class="inline-block px-3 py-1 text-sm bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400 rounded-full mb-4">
                        Featured
                    </span>
                    <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        E-Commerce Platform
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                        A full-stack e-commerce solution built with Laravel and Vue.js. Features include user authentication, product management, shopping cart, payment integration, and admin dashboard.
                    </p>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['Laravel', 'Vue.js', 'MySQL', 'Stripe', 'Tailwind CSS'] as $tech)
                        <span class="px-4 py-2 text-sm bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 rounded-lg">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
                            View Live Project
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-white dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-900 dark:text-white border-2 border-gray-300 dark:border-gray-600 font-semibold rounded-lg transition-colors">
                            View Code
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 lg:py-20 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-700 dark:to-purple-700">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4 lg:mb-6">
            Have a Project in Mind?
        </h2>
        <p class="text-lg lg:text-xl text-blue-100 mb-8 lg:mb-10 max-w-2xl mx-auto">
            I'm always interested in hearing about new projects and opportunities.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
            Let's Talk
        </a>
    </div>
</section>
@endsection

