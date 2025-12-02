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
                    What clients say about working with us
                </div>
            </div>
            
            <!-- Testimonials Grid - Mobile: 1 column, Desktop: 3 columns -->
            <div class="self-stretch flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-8">
                @foreach([
                    ['quote' => '"They understood what we needed before we could articulate it."', 'name' => 'Sarah Mitchell', 'role' => 'Founder, Bright Co'],
                    ['quote' => '"The site performs beautifully and our users notice the difference."', 'name' => 'James Chen', 'role' => 'CEO, Digital First'],
                    ['quote' => '"Professional, responsive, and they delivered on time."', 'name' => 'Emma Rodriguez', 'role' => 'Director, Studio Labs']
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
                    <div class="self-stretch justify-start text-[#E5E5E5] text-xl lg:text-2xl font-bold leading-7 lg:leading-9">
                        {{ $testimonial['quote'] }}
                    </div>
                    
                    <!-- Author -->
                    <div class="flex flex-col justify-start items-start gap-4">
                        <img class="w-14 h-14 rounded-full object-cover" 
                             src="{{ asset('images/portfolio/testimonials/' . strtolower(str_replace(' ', '-', $testimonial['name'])) . '.jpg') }}" 
                             alt="{{ $testimonial['name'] }}"
                             onerror="this.src='https://placehold.co/56x56/1A1A1A/E5E5E5?text=' + encodeURIComponent('{{ substr($testimonial['name'], 0, 1) }}');">
                        <div class="flex flex-col justify-start items-start">
                            <div class="justify-start text-[#E5E5E5] text-base lg:text-lg font-semibold leading-6 lg:leading-7">{{ $testimonial['name'] }}</div>
                            <div class="justify-start text-[#E5E5E5] text-base lg:text-lg font-normal leading-6 lg:leading-7">{{ $testimonial['role'] }}</div>
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
                    ['title' => 'Coastal Retreat', 'desc' => 'Luxury hospitality site with booking integration and gallery', 'tags' => ['Hospitality', 'Web design', 'Development']],
                    ['title' => 'Urban Studio', 'desc' => 'Creative agency portfolio with dynamic project filtering', 'tags' => ['Creative', 'Portfolio', 'Branding']],
                    ['title' => 'Tech Ventures', 'desc' => 'SaaS platform landing page with conversion optimization', 'tags' => ['Technology', 'SaaS', 'Marketing']]
                ] as $index => $project)
                <div class="self-stretch py-8 lg:py-12 border-t-2 border-[#7FFFD4] flex flex-col justify-start items-start gap-8 lg:gap-12">
                    <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-20">
                        <!-- Content -->
                        <div class="flex-1 self-stretch inline-flex flex-col justify-center items-start gap-6 lg:gap-8">
                            <div class="self-stretch flex flex-col justify-start items-start gap-4">
                                <div class="self-stretch flex flex-col justify-start items-start gap-2">
                                    <div class="self-stretch justify-start text-white text-2xl lg:text-4xl font-bold leading-tight lg:leading-[52px]">{{ $project['title'] }}</div>
                                    <div class="w-full lg:w-[560px] justify-start text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">{{ $project['desc'] }}</div>
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
                                    <div class="justify-start text-white text-base lg:text-lg font-medium leading-6 lg:leading-7">View project</div>
                                    <div class="w-6 h-6 relative overflow-hidden">
                                        <div class="w-1.5 h-3 left-[8.51px] top-[6.17px] absolute bg-white border border-black"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Image -->
                        <div class="flex-1 inline-flex flex-col justify-center items-end">
                            <img class="self-stretch h-64 lg:h-96 rounded-lg object-cover" 
                                 src="{{ asset('images/portfolio/projects/project-' . ($index + 1) . '.jpg') }}" 
                                 alt="{{ $project['title'] }}"
                                 onerror="this.src='https://placehold.co/600x450/1A1A1A/7FFFD4?text=' + encodeURIComponent('{{ $project['title'] }}');">
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

    <!-- Contact Section -->
    <div class="self-stretch min-h-[600px] lg:h-[1232px] px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-start gap-12 lg:gap-20">
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-20">
                <!-- Left Content -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4">
                    <div class="inline-flex justify-start items-center">
                        <div class="justify-start text-white text-base font-semibold leading-6">Contact</div>
                    </div>
                    <div class="self-stretch flex flex-col justify-start items-start gap-6">
                        <div class="self-stretch justify-start text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">Get in touch</div>
                        <div class="self-stretch justify-start text-white text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                            Have a project in mind or just want to say hello? We'd like to hear from you.
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Contact Info -->
                <div class="w-full lg:w-[500px] py-2 inline-flex flex-col justify-start items-start gap-6">
                    <!-- Email -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 relative overflow-hidden">
                            <div class="w-5 h-4 left-[1.85px] top-[3.84px] absolute bg-white border border-white"></div>
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-white text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Email</div>
                            <a href="mailto:hello@portfoliodesign.com" class="self-stretch justify-start text-white text-base lg:text-lg font-normal underline leading-6 lg:leading-7 hover:text-[#7FFFD4] transition-colors">
                                hello@portfoliodesign.com
                            </a>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 relative overflow-hidden">
                            <div class="w-5 h-5 left-[2.85px] top-[2.84px] absolute bg-white border border-white"></div>
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-white text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Phone</div>
                            <a href="tel:+15551234567" class="self-stretch justify-start text-white text-base lg:text-lg font-normal underline leading-6 lg:leading-7 hover:text-[#7FFFD4] transition-colors">
                                +1 (555) 123-4567
                            </a>
                        </div>
                    </div>
                    
                    <!-- Office -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 relative overflow-hidden">
                            <div class="w-4 h-5 left-[3.85px] top-[1.84px] absolute bg-white border border-white"></div>
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-white text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Office</div>
                            <div class="self-stretch justify-start text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">
                                456 Design Street, Sydney NSW 2000 AU
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Image -->
            <img class="w-full h-auto lg:h-[720px] rounded-lg object-cover" 
                 src="{{ asset('images/portfolio/hero/map.jpg') }}" 
                 alt="Office Location"
                 onerror="this.src='https://placehold.co/1280x720/1A1A1A/7FFFD4?text=Office+Location';">
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-20 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-start gap-12 lg:gap-20">
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-between items-start gap-8">
                <!-- Left Content -->
                <div class="flex-1 max-w-[560px] inline-flex flex-col justify-start items-start">
                    <div class="self-stretch justify-start text-white text-lg lg:text-xl font-semibold leading-7 lg:leading-8">Stay in the loop</div>
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">
                        Get updates on new work and design insights
                    </div>
                </div>
                
                <!-- Right Content - Newsletter Form -->
                <div class="w-full lg:w-96 inline-flex flex-col justify-start items-start gap-3">
                    <form class="self-stretch inline-flex justify-start items-start gap-4">
                        <input type="email" 
                               placeholder="Your email here" 
                               class="flex-1 px-3 py-2 bg-transparent rounded-md outline outline-2 outline-white text-white placeholder:text-white/60 text-lg font-normal leading-7 focus:outline-[#7FFFD4] transition-colors">
                        <button type="submit" class="px-6 py-2.5 rounded-md border-2 border-white flex justify-center items-center gap-2 hover:bg-white/10 transition-colors">
                            <div class="text-white text-lg font-medium leading-7">Subscribe</div>
                        </button>
                    </form>
                    <div class="self-stretch inline-flex justify-start items-start gap-1">
                        <div class="justify-start text-white/60 text-xs font-normal leading-4">
                            We respect your privacy. Unsubscribe anytime.
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Divider -->
            <div class="self-stretch h-0 outline outline-2 outline-offset-[-1px] outline-white/20"></div>
            
            <!-- Footer Links -->
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-10">
                <!-- Explore -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4 overflow-hidden">
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">Explore</div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        <a href="{{ route('projects') }}" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Portfolio</div>
                        </a>
                        <a href="{{ route('projects') }}" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Projects</div>
                        </a>
                        <a href="{{ route('about') }}" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">About</div>
                        </a>
                        <a href="{{ route('contact') }}" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Contact</div>
                        </a>
                        <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Services</div>
                        </a>
                    </div>
                </div>
                
                <!-- Resources -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4 overflow-hidden">
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">Resources</div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        @foreach(['Blog', 'Insights', 'Guides', 'Tools', 'Gallery'] as $item)
                        <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">{{ $item }}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Company -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4 overflow-hidden">
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">Company</div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        @foreach(['Our story', 'Team', 'Careers', 'Press', 'Partners'] as $item)
                        <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">{{ $item }}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Connect -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4 overflow-hidden">
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">Connect</div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        @foreach(['Get in touch', 'Email us', 'Call now', 'Visit us', 'Schedule call'] as $item)
                        <a href="{{ route('contact') }}" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">{{ $item }}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Legal -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4 overflow-hidden">
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">Legal</div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        @foreach(['Privacy policy', 'Terms of service', 'Cookie policy', 'Disclaimer', 'Accessibility'] as $item)
                        <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">{{ $item }}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Follow -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4 overflow-hidden">
                    <div class="self-stretch justify-start text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7">Follow</div>
                    <div class="self-stretch flex flex-col justify-start items-start">
                        @foreach(['LinkedIn profile', 'Instagram account', 'Twitter updates', 'Facebook page', 'Dribbble'] as $item)
                        <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                            <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">{{ $item }}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="self-stretch flex flex-col justify-start items-start gap-8">
                <div class="self-stretch h-0 outline outline-2 outline-offset-[-1px] outline-white/20"></div>
                <div class="self-stretch inline-flex flex-col lg:flex-row justify-between items-center gap-4">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="w-20 h-9 relative overflow-hidden">
                        <div class="w-16 h-9 left-[6.67px] top-0 absolute overflow-hidden">
                            <div class="w-5 h-4 left-[50.82px] top-[10.87px] absolute bg-white"></div>
                            <div class="w-5 h-6 left-[34.33px] top-[11.32px] absolute bg-white"></div>
                            <div class="w-5 h-4 left-[18.55px] top-[10.87px] absolute bg-white"></div>
                            <div class="w-5 h-4 left-0 top-[10.24px] absolute bg-white"></div>
                            <div class="w-4 h-2.5 left-[1.15px] top-0 absolute bg-white"></div>
                        </div>
                    </a>
                    
                    <!-- Copyright -->
                    <div class="flex justify-start items-center gap-6">
                        <div class="justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">
                            © {{ date('Y') }} Portfolio Web Design. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
