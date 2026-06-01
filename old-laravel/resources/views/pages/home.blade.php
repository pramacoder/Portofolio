@extends('layouts.app')

@section('title', 'Home - Portfolio')

@section('content')
<div class="w-full flex flex-col justify-start items-start overflow-hidden bg-black">
    
    <!-- Hero Section with Background Image -->
    <div class="self-stretch relative min-h-[600px] lg:h-[900px] flex flex-col justify-center items-center overflow-hidden" 
         style="background-image: url('{{ asset('images/portfolio/hero/Homepage.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Dark Overlay for Readability -->
        <div class="absolute inset-0 bg-black/60"></div>
        
        <!-- Hero Content Section -->
        <div class="relative z-10 self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 inline-flex justify-center items-start gap-8 lg:gap-20">
            <div class="flex-1 max-w-[1280px] inline-flex flex-col justify-start items-start gap-8 lg:gap-20">
                <div class="self-stretch flex-1 inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-20">
                    <!-- Left Content -->
                    <div class="flex-1 self-stretch inline-flex flex-col justify-center items-center lg:items-start gap-6 lg:gap-8">
                        <!-- Mobile: Stacked, Desktop: Inline -->
                        <div class="self-stretch justify-start text-center lg:text-left">
                            <span class="text-white text-4xl sm:text-5xl lg:text-6xl xl:text-8xl font-bold leading-tight lg:leading-[92.40px] drop-shadow-lg">Pramajaya </span>
                            <span class="text-[#7FFFD4] text-4xl sm:text-5xl lg:text-6xl xl:text-8xl font-bold leading-tight lg:leading-[92.40px] drop-shadow-lg">Website Developer</span>
                        </div>
                        
                        <!-- CTA Buttons - Mobile: Centered, Desktop: Inline -->
                        <div class="inline-flex flex-col sm:flex-row justify-center items-center sm:justify-start sm:items-start gap-4">
                            <a href="{{ route('projects') }}" class="px-6 py-2.5 bg-white rounded-md shadow-[inset_0px_-4px_0px_0px_rgba(140,255,215,1.00)] border-2 border-[#7FFFD4] flex justify-center items-center gap-2 hover:bg-gray-100 transition-colors">
                                <div class="text-black text-lg font-medium leading-7">Portfolio</div>
                            </a>
                            <a href="#" class="px-6 py-2.5 rounded-md border-2 border-[#7FFFD4] flex justify-center items-center gap-2 hover:bg-[#7FFFD4]/10 transition-colors">
                                <div class="text-[#7FFFD4] text-lg font-medium leading-7">Resume</div>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Right Content - Quote -->
                    <div class="flex-1 self-stretch inline-flex flex-col justify-end items-start gap-4">
                        <!-- Quote - Mobile: Visible, Desktop: Right aligned -->
                        <div class="self-stretch inline-flex justify-center lg:justify-end items-start gap-4">
                            <div class="flex-1 text-center lg:text-right text-[#7FFFD4] text-base sm:text-lg lg:text-xl font-normal leading-6 sm:leading-7 lg:leading-8 drop-shadow-lg">
                                Clean design meets purposeful code. Every site we create tells a story worth telling.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-12 lg:gap-20">
            <!-- Header -->
            <div class="w-full max-w-[768px] flex flex-col justify-start items-center gap-4">
                <div class="inline-flex justify-start items-center">
                    <div class="text-center text-white text-base font-semibold leading-6">Services</div>
                </div>
                <div class="self-stretch flex flex-col justify-start items-center gap-6">
                    <div class="self-stretch text-center text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">How I Work</div>
                    <div class="self-stretch text-center text-white text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                        We focus on the fundamentals. Good design is invisible until it isn't there.
                    </div>
                </div>
            </div>
            
            <!-- Services Grid - Mobile: 1 column, Desktop: 3 columns -->
            <div class="self-stretch flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-12">
                <!-- Custom web design -->
                <div class="flex-1 inline-flex flex-col justify-start items-center gap-6">
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="{{ asset('CostumWebDesign.svg') }}" alt="Custom web design icon" class="w-9 h-9 object-contain">
                    </div>
                    <div class="self-stretch flex flex-col justify-start items-center gap-6">
                        <div class="self-stretch text-center text-white text-2xl lg:text-4xl font-bold leading-tight lg:leading-[52px]">Custom web design</div>
                        <div class="self-stretch text-center text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">
                            Sites built from scratch, tailored to your vision and your users.
                        </div>
                    </div>
                </div>
                
                <!-- Responsive development -->
                <div class="flex-1 inline-flex flex-col justify-start items-center gap-6">
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="{{ asset('ResponsiveIcon.svg') }}" alt="Responsive development icon" class="w-9 h-9 object-contain">
                    </div>
                    <div class="self-stretch flex flex-col justify-start items-center gap-6">
                        <div class="self-stretch text-center text-white text-2xl lg:text-4xl font-bold leading-tight lg:leading-[52px]">Responsive development</div>
                        <div class="self-stretch text-center text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">
                            Your site works everywhere, on any screen, at any size.
                        </div>
                    </div>
                </div>
                
                <!-- Performance first -->
                <div class="flex-1 inline-flex flex-col justify-start items-center gap-6">
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="{{ asset('PerformanceIcon.svg') }}" alt="Performance first icon" class="w-8 h-8 object-contain">
                    </div>
                    <div class="self-stretch flex flex-col justify-start items-center gap-6">
                        <div class="self-stretch text-center text-white text-2xl lg:text-4xl font-bold leading-tight lg:leading-[52px]">Performance first</div>
                        <div class="self-stretch text-center text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">
                            Fast loading times and smooth interactions keep users engaged.
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="inline-flex flex-col sm:flex-row justify-start items-center gap-6">
                <a href="{{ route('projects') }}" class="px-6 py-2.5 rounded-md border-2 border-[#7FFFD4] flex justify-center items-center gap-2 hover:bg-[#7FFFD4]/10 transition-colors">
                    <div class="text-[#7FFFD4] text-lg font-medium leading-7">Explore</div>
                </a>
                <a href="{{ route('about') }}" class="rounded-md flex justify-center items-center gap-2 hover:opacity-80 transition-opacity">
                    <div class="text-[#7FFFD4] text-lg font-medium leading-7">Learn</div>
                    <img src="{{ asset('nextIcon.svg') }}" alt="" class="w-5 h-5">
                </a>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-[#1A1A1A] flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-start gap-12 lg:gap-20">
            <!-- Header -->
            <div class="w-full max-w-[768px] flex flex-col justify-start items-start gap-6">
                <div class="self-stretch justify-start text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">Testimonials</div>
                <div class="self-stretch justify-start text-[#E5E5E5] text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                    What clients say about working with me
                </div>
            </div>
            
            <!-- Testimonials Grid - Mobile: 1 column, Desktop: 2 columns -->
            <div class="self-stretch flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-8">
                @foreach([
                    [
                        'quote' => '"I am his university friend, and I see that Prama is a reliable person to work with."',
                        'name' => 'Mario',
                        'role' => 'Owner of Viera Resort',
                        'instagram' => '@_alxtethool',
                        'image' => '#'
                    ],
                    [
                        'quote' => '"I am a colleague of his, he works professionally."',
                        'name' => 'Andika',
                        'role' => 'Udayana Informatics',
                        'instagram' => '@andika_arsana',
                        'image' => '#'
                    ]
                ] as $testimonial)
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-6 lg:gap-8 overflow-hidden">
                    <!-- Stars -->
                    <div class="inline-flex justify-start items-center gap-1 overflow-hidden">
                        @for($i = 1; $i <= 5; $i++)
                        <img 
                            src="{{ asset('starIcon.svg') }}" 
                            alt="Star rating" 
                            class="w-5 h-5"
                        >
                        @endfor
                    </div>
                    
                    <!-- Quote -->
                    <div class="self-stretch justify-start text-white text-xl lg:text-2xl font-bold leading-7 lg:leading-9">
                        {{ $testimonial['quote'] }}
                    </div>
                    
                    <!-- Author -->
                    <div class="flex flex-col justify-start items-start gap-4">
                        <img class="w-14 h-14 rounded-full object-cover" 
                             src="{{ $testimonial['image'] }}" 
                             alt="{{ $testimonial['name'] }}"
                             onerror="this.src='https://placehold.co/56x56/1A1A1A/E5E5E5?text=' + encodeURIComponent('{{ substr($testimonial['name'], 0, 1) }}');">
                        <div class="flex flex-col justify-start items-start gap-2">
                            <div class="justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">{{ $testimonial['name'] }}</div>
                            <div class="justify-start text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">{{ $testimonial['role'] }}</div>
                            <!-- Instagram -->
                            <div class="inline-flex justify-start items-center gap-2">
                                <img src="{{ asset('instagram.svg') }}" alt="Instagram" class="w-5 h-5">
                                <a href="https://instagram.com/{{ str_replace('@', '', $testimonial['instagram']) }}" 
                                   target="_blank" 
                                   class="text-purple-500 hover:text-purple-400 text-base lg:text-lg font-normal leading-6 lg:leading-7 transition-colors">
                                    {{ $testimonial['instagram'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-start gap-12 lg:gap-20">
            <!-- Header -->
            <div class="w-full max-w-[768px] flex flex-col justify-start items-start gap-4">
                <div class="inline-flex justify-start items-center">
                    <div class="justify-start text-white text-base font-semibold leading-6">Portfolio</div>
                </div>
                <div class="self-stretch flex flex-col justify-start items-start gap-6">
                    <div class="self-stretch justify-start text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">Recent work</div>
                    <div class="self-stretch justify-start text-white text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                        A selection of projects that showcase our approach
                    </div>
                </div>
            </div>
            
            <!-- Projects List -->
            <div class="self-stretch flex flex-col justify-start items-center gap-8 lg:gap-16">
                @foreach([
                    [
                        'title' => 'Viera Resort & Cafe',
                        'desc' => 'Simple landing page for a resort in Nguarbloat, Kei Kecil.',
                        'tags' => ['Resort', 'Web design', 'Laravel'],
                        'image' => asset('images/portfolio/projects/Viera.png')
                    ],
                    [
                        'title' => 'Redesain UI M-Paspor',
                        'desc' => 'Numerous issues with the design and system of M-Passport prompted me and my team to redesign the UI based on a user-centred approach.',
                        'tags' => ['Coursework', 'Figma', 'UI/UX'],
                        'image' => asset('images/portfolio/projects/Pasporid.png')
                    ],
                    [
                        'title' => 'DwipaFresh E-Commerce',
                        'desc' => 'Implementing my grocery store sales system online through e-commerce.',
                        'tags' => ['Technology', 'Figma', 'Next.js'],
                        'image' => asset('images/portfolio/projects/logodwipafresh.jpeg')
                    ]
                ] as $index => $project)
                <div class="self-stretch py-8 lg:py-12 border-t-2 border-[#7FFFD4] flex flex-col justify-start items-start gap-8 lg:gap-12">
                    <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-20">
                        <!-- Content -->
                        <div class="flex-1 self-stretch inline-flex flex-col justify-center items-start gap-6 lg:gap-8">
                            <div class="self-stretch flex flex-col justify-start items-start gap-4">
                                <div class="self-stretch flex flex-col justify-start items-start gap-2">
                                    <div class="self-stretch justify-start text-white text-2xl lg:text-4xl font-bold leading-tight lg:leading-[52px]">{{ $project['title'] }}</div>
                                    <div class="w-full lg:w-[560px] justify-start text-[#E5E5E5] text-base lg:text-lg font-normal leading-6 lg:leading-7">{{ $project['desc'] }}</div>
                                </div>
                                <!-- Tags -->
                                <div class="self-stretch inline-flex justify-start items-start gap-2 flex-wrap content-start">
                                    @foreach($project['tags'] as $tag)
                                    <div class="px-2.5 py-1 bg-transparent rounded outline outline-2 outline-offset-[-2px] outline-white flex justify-start items-start">
                                        <div class="justify-start text-white text-sm lg:text-base font-semibold leading-5 lg:leading-6">{{ $tag }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- View Project Link -->
                            <div class="self-stretch flex flex-col justify-start items-start gap-4">
                                <a href="{{ route('projects') }}" class="rounded-md inline-flex justify-center items-center gap-2 hover:opacity-80 transition-opacity">
                                    <div class="justify-start text-[#E5E5E5] text-base lg:text-lg font-medium leading-6 lg:leading-7">View project</div>
                                    <img src="{{ asset('nextIcon.svg') }}" alt="Arrow" class="w-3 h-5">
                                </a>
                            </div>
                        </div>
                        
                        <!-- Image -->
                        <div class="flex-1 inline-flex flex-col justify-center items-end">
                            <img class="self-stretch h-64 lg:h-96 rounded-lg object-cover" 
                                 src="{{ $project['image'] }}" 
                                 alt="{{ $project['title'] }}"
                                 onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'self-stretch h-64 lg:h-96 rounded-lg bg-[#1A1A1A] flex items-center justify-center\'><div class=\'text-[#E5E5E5] text-lg\'>No image</div></div>';">
                        </div>
                    </div>
                </div>
                @endforeach
                
                <!-- View All Button -->
                <div class="flex flex-col justify-start items-start gap-4">
                    <a href="{{ route('projects') }}" class="px-6 py-2.5 rounded-md border-2 border-white inline-flex justify-center items-center gap-2 hover:bg-white/10 transition-colors">
                        <div class="justify-start text-white text-lg font-medium leading-7">View all</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
