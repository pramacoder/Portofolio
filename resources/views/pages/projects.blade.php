@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
@php
    // ============================================
    // PROJECTS DATA - Easy to add/edit projects
    // ============================================
    $projects = [
        [
            'id' => 1,
            'title' => 'Viera Resort & Cafe',
            'description' => 'Simple landing page for a resort in Nguarbloat, Kei Kecil.',
            'category' => 'web',
            'year' => '2024',
            'image' => asset('images/portfolio/projects/Viera.png'),
            'gallery' => [], // Optional: Add multiple images here if available
            'tags' => ['Resort', 'Web design', 'Laravel'],
            'live_url' => '#',
            'github_url' => '#',
            'featured' => false
        ],
        [
            'id' => 2,
            'title' => 'Redesain UI M-Paspor',
            'description' => 'Numerous issues with the design and system of M-Passport prompted me and my team to redesign the UI based on a user-centred approach.',
            'category' => 'design',
            'year' => '2024',
            'image' => asset('images/portfolio/projects/Pasporid.png'),
            'gallery' => [], // Optional: Add multiple images here if available
            'tags' => ['Coursework', 'Figma', 'UI/UX', 'Mobile'],
            'live_url' => '#',
            'github_url' => '#',
            'featured' => false
        ],
        [
            'id' => 3,
            'title' => 'DwipaFresh E-Commerce',
            'description' => 'Implementing my grocery store sales system online through e-commerce.',
            'category' => 'web',
            'year' => '2024',
            'image' => asset('images/portfolio/projects/logodwipafresh.jpeg'),
            'gallery' => [], // Optional: Add multiple images here if available
            'tags' => ['Technology', 'Figma', 'Next.js'],
            'live_url' => '#',
            'github_url' => '#',
            'featured' => true
        ],
        [
            'id' => 4,
            'title' => 'Mental Health Predict',
            'description' => 'Machine learning project untuk memprediksi happiness index menggunakan data penggunaan layar smartphone. Menggunakan feature selection Spearman dan Pearson, kemudian membandingkan 3 algoritma regresi (kNN Regressor, Linear Regression, Random Forest Regressor) dengan dataset 500 data dari Kaggle. Model terbaik adalah kNN Regressor dengan R² 0.6417 dan MAPE 9.32%.',
            'category' => 'web',
            'year' => '2024',
            'image' => asset('images/portfolio/projects/mentalhealtpredict/LandingPage.png'),
            'gallery' => [
                asset('images/portfolio/projects/mentalhealtpredict/LandingPage.png'),
                asset('images/portfolio/projects/mentalhealtpredict/kNN.png'),
                asset('images/portfolio/projects/mentalhealtpredict/Linear.png'),
                asset('images/portfolio/projects/mentalhealtpredict/RandomForest.png'),
            ],
            'tags' => ['Python', 'Machine Learning', 'Regression', 'kNN', 'Linear Regression', 'Random Forest'],
            'live_url' => '#',
            'github_url' => '#',
            'featured' => false
        ],
        [
            'id' => 5,
            'title' => 'Pengajuan Proposal PKM Universitas Udayana',
            'description' => 'Mengembangkan solusi sistem pengajuan proposal PKM yang terintegrasi dalam satu sistem untuk menggantikan sistem sebelumnya yang belum terintegrasi. Project ini dikembangkan saat PKL di Biro Kemahasiswaan Universitas Udayana. Sistem masih dalam tahap pengembangan.',
            'category' => 'web',
            'year' => '2024',
            'image' => asset('images/portfolio/projects/PengajuanProposalPKMUnud/LoginPage.png'),
            'gallery' => [
                asset('images/portfolio/projects/PengajuanProposalPKMUnud/LoginPage.png'),
                asset('images/portfolio/projects/PengajuanProposalPKMUnud/Dosen.png'),
                asset('images/portfolio/projects/PengajuanProposalPKMUnud/Mahasiswa.png'),
                asset('images/portfolio/projects/PengajuanProposalPKMUnud/Operator.png'),
                asset('images/portfolio/projects/PengajuanProposalPKMUnud/Reviewer.png'),
            ],
            'tags' => ['Laravel', 'Tailwind CSS', 'Alpine.js', 'PDF.js'],
            'live_url' => '#',
            'github_url' => '#',
            'featured' => false
        ],
        // Add more projects here by copying the structure above
        // [
        //     'id' => 4,
        //     'title' => 'Your Project Title',
        //     'description' => 'Your project description here.',
        //     'category' => 'web', // 'web', 'mobile', or 'design'
        //     'year' => '2024',
        //     'image' => asset('images/portfolio/projects/your-image.jpg'),
        //     'tags' => ['Tag1', 'Tag2', 'Tag3'],
        //     'live_url' => '#',
        //     'github_url' => '#',
        //     'featured' => false
        // ],
    ];
    
    // Separate featured and regular projects
    $featuredProject = collect($projects)->firstWhere('featured', true);
    $regularProjects = collect($projects)->where('featured', false)->values()->all();
@endphp

<div class="w-full flex flex-col justify-start items-start overflow-hidden bg-black" 
     x-data="{ 
         selectedProject: null,
         activeFilter: 'all',
         projects: @js($projects),
         currentImageIndex: 0,
         selectProject(project) {
             this.selectedProject = project;
             this.currentImageIndex = 0;
             window.scrollTo({ top: 0, behavior: 'smooth' });
         },
         clearSelection() {
             this.selectedProject = null;
             this.currentImageIndex = 0;
         },
         setFilter(filter) {
             this.activeFilter = filter;
         },
         nextImage() {
             if (this.selectedProject && this.selectedProject.gallery && this.selectedProject.gallery.length > 0) {
                 this.currentImageIndex = (this.currentImageIndex + 1) % this.selectedProject.gallery.length;
             }
         },
         prevImage() {
             if (this.selectedProject && this.selectedProject.gallery && this.selectedProject.gallery.length > 0) {
                 this.currentImageIndex = (this.currentImageIndex - 1 + this.selectedProject.gallery.length) % this.selectedProject.gallery.length;
             }
         },
         goToImage(index) {
             this.currentImageIndex = index;
         }
     }">
    <!-- Projects Hero Section - Dynamic -->
    <div class="self-stretch relative px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-8 lg:gap-12 overflow-hidden">
        <!-- Background Decorative Elements (Default View) -->
        <div x-show="!selectedProject" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <!-- Large Circle Top Left -->
            <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-[#7FFFD4]/10 blur-3xl"></div>
            
            <!-- Medium Circle Bottom Right -->
            <div class="absolute -bottom-24 -right-24 w-80 h-80 rounded-full bg-[#7FFFD4]/15 blur-3xl"></div>
            
            <!-- Small Circle Center -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full bg-[#7FFFD4]/5 blur-2xl"></div>
            
            <!-- Gradient Blob Top Right -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-gradient-to-br from-[#7FFFD4]/20 to-[#7FFFD4]/5 rounded-full blur-3xl"></div>
            
            <!-- Gradient Blob Bottom Left -->
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-[#7FFFD4]/15 to-transparent rounded-full blur-3xl"></div>
        </div>

        <!-- Default Hero Content -->
        <div x-show="!selectedProject" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="relative z-10 w-full max-w-[1280px] flex flex-col justify-start items-center gap-6 lg:gap-8">
            <div class="inline-flex justify-start items-center">
                <div class="text-center text-white text-base font-semibold leading-6"></div>
            </div>
            <div class="self-stretch flex flex-col justify-start items-center gap-6">
                <div class="self-stretch text-center text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">
                    My Projects
                </div>
                <div class="self-stretch text-left text-white text-lg lg:text-xl font-normal leading-7 lg:leading-8 max-w-2xl justify-start">
                    A collection of projects I've worked on, showcasing my skills and experience
                </div>
            </div>
        </div>

        <!-- Selected Project Hero Content -->
        <div x-show="selectedProject" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="relative z-10 w-full max-w-[1280px] flex flex-col justify-start items-center gap-8 lg:gap-12">
            <!-- Back Button -->
            <div class="self-stretch flex justify-start items-center">
                <button @click="clearSelection()" 
                        class="inline-flex items-center gap-2 text-[#7FFFD4] hover:text-[#7FFFD4]/80 text-base font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Projects
                </button>
            </div>

            <!-- Project Detail -->
            <div class="self-stretch flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-12">
                <!-- Project Images Gallery -->
                <div class="flex-1 w-full lg:max-w-2xl">
                    <!-- Gallery with Multiple Images -->
                    <template x-if="selectedProject && selectedProject.gallery && selectedProject.gallery.length > 0">
                        <div class="flex flex-col gap-4">
                            <!-- Main Image Display with Navigation -->
                            <div class="rounded-2xl overflow-hidden border-2 border-white/10 bg-[#1A1A1A] relative group">
                                <div class="aspect-video relative">
                                    <img :src="selectedProject.gallery[currentImageIndex]" 
                                         :alt="`${selectedProject.title} - Image ${currentImageIndex + 1}`" 
                                         class="w-full h-full object-contain">
                                    
                                    <!-- Navigation Arrows (if more than 1 image) -->
                                    <template x-if="selectedProject.gallery.length > 1">
                                        <div>
                                            <!-- Previous Button -->
                                            <button @click="prevImage()" 
                                                    class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/50 hover:bg-black/70 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                            </button>
                                            
                                            <!-- Next Button -->
                                            <button @click="nextImage()" 
                                                    class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/50 hover:bg-black/70 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                            
                                            <!-- Image Counter -->
                                            <div class="absolute bottom-4 right-4 px-3 py-1 bg-black/50 text-white text-sm rounded-full">
                                                <span x-text="currentImageIndex + 1"></span> / <span x-text="selectedProject.gallery.length"></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            
                            <!-- Gallery Thumbnails (if more than 1 image) -->
                            <template x-if="selectedProject.gallery.length > 1">
                                <div class="flex gap-3 overflow-x-auto pb-2">
                                    <template x-for="(img, index) in selectedProject.gallery" :key="index">
                                        <button @click="goToImage(index)"
                                                :class="currentImageIndex === index ? 'border-[#7FFFD4]' : 'border-white/10'"
                                                class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 hover:border-[#7FFFD4]/50 transition-colors">
                                            <img :src="img" 
                                                 :alt="`${selectedProject.title} - Thumbnail ${index + 1}`" 
                                                 class="w-full h-full object-cover">
                                        </button>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </template>
                    
                    <!-- Fallback: Single Image -->
                    <template x-if="selectedProject && (!selectedProject.gallery || selectedProject.gallery.length === 0)">
                        <div class="rounded-2xl overflow-hidden border-2 border-white/10">
                            <div class="aspect-video bg-[#1A1A1A]">
                                <template x-if="selectedProject.image && selectedProject.image !== '#'">
                                    <img :src="selectedProject.image" 
                                         :alt="selectedProject.title" 
                                         class="w-full h-full object-contain">
                                </template>
                                <template x-if="!selectedProject.image || selectedProject.image === '#'">
                                    <div class="w-full h-full flex items-center justify-center text-[#E5E5E5] text-sm">
                                        No Image
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Project Info -->
                <div class="flex-1 flex flex-col justify-start items-start gap-6">
                    <div class="inline-flex items-center gap-3">
                        <span class="px-3 py-1 text-sm bg-[#7FFFD4]/20 text-[#7FFFD4] border border-[#7FFFD4]/50 rounded-full" 
                              x-text="selectedProject ? selectedProject.category.charAt(0).toUpperCase() + selectedProject.category.slice(1) : ''">
                        </span>
                        <span class="text-[#E5E5E5] text-sm" x-text="selectedProject ? selectedProject.year : ''"></span>
                    </div>
                    
                    <h1 class="text-[#7FFFD4] text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight" 
                        x-text="selectedProject ? selectedProject.title : ''">
                    </h1>
                    
                    <p class="text-white text-lg lg:text-xl leading-7 lg:leading-8" 
                       x-text="selectedProject ? selectedProject.description : ''">
                    </p>
                    
                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2" x-show="selectedProject && selectedProject.tags">
                        <template x-for="tag in (selectedProject ? selectedProject.tags : [])" :key="tag">
                            <span class="px-4 py-2 text-sm bg-[#1A1A1A] text-white border border-white/10 rounded-lg" 
                                  x-text="tag">
                            </span>
                        </template>
                    </div>

                    <!-- Links -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <template x-if="selectedProject && selectedProject.live_url !== '#'">
                            <a :href="selectedProject.live_url" 
                               class="inline-flex items-center justify-center px-6 py-3 bg-[#7FFFD4] hover:bg-[#7FFFD4]/80 text-black font-semibold rounded-lg transition-colors">
                                View Live Project
                            </a>
                        </template>
                        <template x-if="selectedProject && selectedProject.github_url !== '#'">
                            <a :href="selectedProject.github_url" 
                               class="inline-flex items-center justify-center px-6 py-3 bg-transparent hover:bg-[#1A1A1A] text-white border-2 border-white/10 hover:border-[#7FFFD4]/50 font-semibold rounded-lg transition-colors">
                                View Code
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Grid Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-[#1A1A1A] flex flex-col justify-start items-center gap-12 lg:gap-20">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-12 lg:gap-20">
            <!-- Filter Tabs -->
            <div class="flex justify-center overflow-x-auto">
                <div class="flex space-x-2 lg:space-x-4">
                    <button @click="setFilter('all')" 
                            :class="activeFilter === 'all' ? 'bg-[#7FFFD4] text-black' : 'bg-black/50 text-white border-2 border-white/10'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                        All
                    </button>
                    <button @click="setFilter('web')" 
                            :class="activeFilter === 'web' ? 'bg-[#7FFFD4] text-black' : 'bg-black/50 text-white border-2 border-white/10'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                        Web
                    </button>
                    <button @click="setFilter('mobile')" 
                            :class="activeFilter === 'mobile' ? 'bg-[#7FFFD4] text-black' : 'bg-black/50 text-white border-2 border-white/10'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                        Mobile
                    </button>
                    <button @click="setFilter('design')" 
                            :class="activeFilter === 'design' ? 'bg-[#7FFFD4] text-black' : 'bg-black/50 text-white border-2 border-white/10'"
                            class="px-4 py-2 rounded-lg font-medium transition-colors whitespace-nowrap">
                        Design
                    </button>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="self-stretch grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($regularProjects as $project)
                <div class="group bg-black rounded-xl overflow-hidden border-2 border-white/10 hover:border-[#7FFFD4]/50 transition-all duration-300 cursor-pointer"
                     x-show="activeFilter === 'all' || activeFilter === '{{ $project['category'] }}'"
                     x-transition
                     @click="selectProject(@js($project))">
                    <!-- Project Image -->
                    <div class="relative aspect-video bg-[#1A1A1A] overflow-hidden">
                        @php
                            $displayImage = !empty($project['gallery']) && count($project['gallery']) > 0 
                                ? $project['gallery'][0] 
                                : ($project['image'] ?? '#');
                        @endphp
                        @if($displayImage !== '#' && $displayImage)
                        <img src="{{ $displayImage }}" 
                             alt="{{ $project['title'] }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                             loading="lazy"
                             onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full h-full hidden items-center justify-center text-[#E5E5E5] text-sm bg-[#1A1A1A]">
                            No Image
                        </div>
                        @else
                        <div class="w-full h-full flex items-center justify-center text-[#E5E5E5] text-sm bg-[#1A1A1A]">
                            No Image
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            <div class="px-6 py-3 bg-[#7FFFD4] text-black rounded-lg font-semibold pointer-events-auto">
                                View Project
                            </div>
                        </div>
                    </div>

                    <!-- Project Info -->
                    <div class="p-4 lg:p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs lg:text-sm text-[#7FFFD4] font-medium">
                                {{ ucfirst($project['category']) }}
                            </span>
                            <span class="text-xs text-[#E5E5E5]">{{ $project['year'] }}</span>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-white mb-2">
                            {{ $project['title'] }}
                        </h3>
                        <p class="text-[#E5E5E5] text-sm lg:text-base mb-4">
                            {{ $project['description'] }}
                        </p>
                        
                        <!-- Technologies -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project['tags'] as $tag)
                            <span class="px-3 py-1 text-xs bg-[#1A1A1A] text-white border border-white/10 rounded-full">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>

                        <!-- Links -->
                        <div class="flex space-x-4">
                            @if($project['live_url'] !== '#')
                            <a href="{{ $project['live_url'] }}" class="text-[#7FFFD4] hover:text-[#7FFFD4]/80 text-sm lg:text-base font-medium transition-colors">
                                Live Demo →
                            </a>
                            @endif
                            @if($project['github_url'] !== '#')
                            <a href="{{ $project['github_url'] }}" class="text-[#E5E5E5] hover:text-white text-sm lg:text-base font-medium transition-colors">
                                GitHub →
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Project Section -->
    @if($featuredProject)
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-12 lg:gap-20">
            <h2 class="text-[#7FFFD4] text-3xl lg:text-4xl font-bold text-center">
                Featured Project
            </h2>
            
            <div class="self-stretch grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center cursor-pointer hover:opacity-90 transition-opacity"
                 @click="selectProject(@js($featuredProject))">
                <!-- Image -->
                <div class="order-1 lg:order-1">
                    <div class="rounded-2xl overflow-hidden border-2 border-white/10">
                        <div class="aspect-video bg-[#1A1A1A]">
                            <img src="{{ $featuredProject['image'] }}" 
                                 alt="{{ $featuredProject['title'] }}" 
                                 class="w-full h-full object-cover"
                                 onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-[#E5E5E5] text-sm\'>No Image</div>';">
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="order-2 lg:order-2 flex flex-col justify-start items-start gap-6">
                    <span class="inline-block px-3 py-1 text-sm bg-[#7FFFD4]/20 text-[#7FFFD4] border border-[#7FFFD4]/50 rounded-full">
                        Featured
                    </span>
                    <h3 class="text-3xl lg:text-4xl font-bold text-white">
                        {{ $featuredProject['title'] }}
                    </h3>
                    <p class="text-lg text-[#E5E5E5]">
                        {{ $featuredProject['description'] }}
                    </p>
                    
                    <div class="flex flex-wrap gap-2">
                        @foreach($featuredProject['tags'] as $tech)
                        <span class="px-4 py-2 text-sm bg-[#1A1A1A] text-white border border-white/10 rounded-lg">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        @if($featuredProject['live_url'] !== '#')
                        <a href="{{ $featuredProject['live_url'] }}" class="inline-flex items-center justify-center px-6 py-3 bg-[#7FFFD4] hover:bg-[#7FFFD4]/80 text-black font-semibold rounded-lg transition-colors">
                            View Live Project
                        </a>
                        @endif
                        @if($featuredProject['github_url'] !== '#')
                        <a href="{{ $featuredProject['github_url'] }}" class="inline-flex items-center justify-center px-6 py-3 bg-transparent hover:bg-[#1A1A1A] text-white border-2 border-white/10 hover:border-[#7FFFD4]/50 font-semibold rounded-lg transition-colors">
                            View Code
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- CTA Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-[#1A1A1A] flex flex-col justify-start items-center gap-8 lg:gap-12">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-6 lg:gap-8 text-center">
            <h2 class="text-[#7FFFD4] text-3xl lg:text-4xl font-bold mb-4 lg:mb-6">
                Have a Project in Mind?
            </h2>
            <p class="text-white text-lg lg:text-xl mb-8 lg:mb-10 max-w-2xl">
                I'm always interested in hearing about new projects and opportunities.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-[#7FFFD4] hover:bg-[#7FFFD4]/80 text-black font-semibold rounded-lg transition-colors">
                Let's Talk
            </a>
        </div>
    </div>
</div>
@endsection
