@extends('layouts.app')

@section('title', 'About - Portfolio')

@section('content')
<div class="w-full flex flex-col justify-start items-start overflow-hidden bg-black">
    <!-- About Hero Section with Background Image -->
    <div class="self-stretch relative min-h-[600px] lg:h-[900px] flex flex-col justify-center items-center overflow-hidden" 
         style="background-image: url('{{ asset('images/portfolio/hero/AboutHero.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Dark Overlay for Readability -->
        <div class="absolute inset-0 bg-black/60"></div>
        
        <!-- Hero Content Section -->
        <div class="relative z-10 self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 inline-flex justify-center items-start gap-8 lg:gap-20">
            <div class="flex-1 max-w-[1280px] inline-flex flex-col justify-start items-start gap-8 lg:gap-20">
                <div class="self-stretch flex-1 inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-20">
                    <!-- Left Content -->
                    <div class="flex-1 self-stretch inline-flex flex-col justify-center items-start gap-6 lg:gap-8">
                        <!-- Main Heading -->
                        <div class="self-stretch justify-start text-left">
                            <div class="text-white text-4xl sm:text-5xl lg:text-6xl xl:text-8xl font-bold leading-tight lg:leading-[92.40px] drop-shadow-lg">Digital</div>
                            <div class="text-[#7FFFD4] text-4xl sm:text-5xl lg:text-6xl xl:text-8xl font-bold leading-tight lg:leading-[92.40px] drop-shadow-lg">transformat</div>
                            <div class="text-[#7FFFD4] text-4xl sm:text-5xl lg:text-6xl xl:text-8xl font-bold leading-tight lg:leading-[92.40px] drop-shadow-lg">ion</div>
                        </div>
                        
                        <!-- Buttons/Tags -->
                        <div class="inline-flex flex-col sm:flex-row justify-start items-start gap-4 flex-wrap">
                            <div class="px-4 py-2 bg-transparent rounded-md border-2 border-white flex justify-center items-center">
                                <div class="text-white text-base lg:text-lg font-medium leading-6 lg:leading-7">Website Creator</div>
                            </div>
                            <div class="px-4 py-2 bg-transparent rounded-md border-2 border-white flex justify-center items-center">
                                <div class="text-white text-base lg:text-lg font-medium leading-6 lg:leading-7">Desain UI</div>
                            </div>
                            <!-- Barcelona Fans with gradient border -->
                            <div class="p-[2px] rounded-md bg-gradient-to-r from-red-500 to-blue-500">
                                <div class="px-4 py-2 bg-black rounded-md flex justify-center items-center">
                                    <div class="text-white text-base lg:text-lg font-medium leading-6 lg:leading-7">Barcelona Fans</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Content - Description -->
                    <div class="flex-1 self-stretch inline-flex flex-col justify-center items-start gap-4">
                        <div class="self-stretch justify-start text-left text-[#7FFFD4] text-base sm:text-lg lg:text-xl font-normal leading-6 sm:leading-7 lg:leading-8 drop-shadow-lg">
                            A complete redesign that moved the needle. The site now converts better and users stay longer.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-12 lg:gap-20">
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-center gap-8 lg:gap-20">
                <!-- Image -->
                <div class="flex-1 flex justify-center lg:justify-center">
                    <div class="relative w-full max-w-sm overflow-visible">
                        <!-- Background Text: PRAMA JAYA -->
                        <div class="absolute inset-0 flex flex-col justify-center items-center z-0 pointer-events-none overflow-visible">
                            <div class="text-[#7FFFD4] text-7xl lg:text-[10rem] font-black leading-none opacity-50 select-none whitespace-nowrap" style="font-family: 'Arial Black', sans-serif;">
                                PRAMA
                            </div>
                            <div class="text-[#7FFFD4] text-7xl lg:text-[10rem] font-black leading-none opacity-50 select-none mt-2 whitespace-nowrap" style="font-family: 'Arial Black', sans-serif;">
                                JAYA
                            </div>
                        </div>
                        
                        <!-- Photo Container -->
                        <div class="relative z-10 rounded-2xl overflow-hidden">
                            <img src="{{ asset('Photodiri.png') }}" 
                                 alt="Profile" 
                                 class="w-full h-auto object-contain"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden w-full h-full items-center justify-center text-white text-2xl font-bold bg-black min-h-[400px]">
                                Profile Photo
                            </div>
                            
                            <!-- Gradient Overlay Bottom (Black to Transparent) -->
                            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black via-black/80 to-transparent pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-start items-start gap-6">
                    <h2 class="text-[#7FFFD4] text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight lg:leading-[60px]">
                        Hi, I'm Pramajaya
                    </h2>
                    <div class="space-y-4 text-white text-base lg:text-lg font-normal leading-6 lg:leading-7">
                        <p>
                            I'm a full-stack developer with a passion for creating beautiful, functional, and user-centered digital experiences. With over 5 years of experience in web development, I've worked with various technologies and frameworks.
                        </p>
                        <p>
                            My expertise includes front-end development with modern JavaScript frameworks, back-end development with Laravel and PHP, and UI/UX design. I'm always eager to learn new technologies and improve my skills.
                        </p>
                        <p>
                            When I'm not coding, you can find me exploring new design trends, contributing to open-source projects, or sharing knowledge with the developer community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Experience & Education Section -->
    <div class="self-stretch relative px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-[#1A1A1A] flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
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
        
        <div class="relative z-10 w-full max-w-[1280px] flex flex-col justify-start items-start gap-12 lg:gap-20">
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-12">
                <!-- Experience -->
                <div class="flex-1 flex flex-col justify-start items-start gap-6 lg:gap-8">
                    <h2 class="text-[#7FFFD4] text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight lg:leading-[60px]">
                        Experience
                    </h2>
                    <div class="self-stretch flex flex-col justify-start items-start gap-6">
                        @foreach([
                            [
                                'position' => 'Event Contribution Coordinator',
                                'organization' => 'Supremasi 17',
                                'period' => 'April 2024',
                                'description' => 'Coordinated and managed contributions required for Supremasi event operations. Demonstrated reliability in team collaboration and resource allocation to ensure smooth event execution.'
                            ],
                            [
                                'position' => 'Facilities & Equipment Coordinator',
                                'organization' => 'DPM FMIPA - Community Service Program',
                                'period' => 'March 2025',
                                'description' => 'Managed venue arrangements and equipment logistics for community service initiatives. Ensured proper setup before events and organized teardown procedures, maintaining operational excellence throughout activities.'
                            ],
                            [
                                'position' => 'Master of Ceremony',
                                'organization' => 'National Informatics Webinar - Udayana University',
                                'period' => 'April 14, 2025',
                                'description' => 'Served as Master of Ceremony for a large-scale national webinar in informatics. Facilitated program flow, engaged audience participation, and maintained professional presentation standards throughout the event.'
                            ],
                            [
                                'position' => 'Facilities & Equipment Coordinator',
                                'organization' => 'Supremasi 18',
                                'period' => 'April 2025',
                                'description' => 'Led venue and equipment management operations for Supremasi 18 event. Coordinated pre-event setup and post-event logistics, ensuring seamless operations and maintaining high standards of organization.'
                            ]
                        ] as $experience)
                        <div class="self-stretch p-6 rounded-lg border-2 border-white/10 bg-black/50">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between mb-2 gap-2">
                                <h3 class="text-white text-xl lg:text-2xl font-semibold leading-6 lg:leading-7">
                                    {{ $experience['position'] }}
                                </h3>
                                <span class="text-[#E5E5E5] text-sm lg:text-base font-normal">{{ $experience['period'] }}</span>
                            </div>
                            <p class="text-[#7FFFD4] text-base lg:text-lg font-medium mb-2">{{ $experience['organization'] }}</p>
                            <p class="text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">
                                {{ $experience['description'] }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Education -->
                <div class="flex-1 flex flex-col justify-start items-start gap-6 lg:gap-8">
                    <h2 class="text-[#7FFFD4] text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight lg:leading-[60px]">
                        Education
                    </h2>
                    <div class="self-stretch flex flex-col justify-start items-start gap-6">
                        @foreach([
                            [
                                'title' => 'High School Diploma',
                                'institution' => 'SMA Negeri 5 Denpasar',
                                'period' => '2020 - 2023',
                                'major' => 'Science (MIPA)',
                                'description' => 'Completed high school education with focus on Mathematics and Natural Sciences, building strong analytical and problem-solving foundation.'
                            ],
                            [
                                'title' => 'Bachelor\'s Degree in Informatics',
                                'institution' => 'Udayana University',
                                'period' => '2023 - Present',
                                'major' => null,
                                'description' => 'Currently pursuing Bachelor\'s degree in Informatics Engineering, focusing on software development, data structures, algorithms, and modern web technologies.'
                            ]
                        ] as $education)
                        <div class="self-stretch p-6 rounded-lg border-2 border-white/10 bg-black/50">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between mb-2 gap-2">
                                <h3 class="text-white text-xl lg:text-2xl font-semibold leading-6 lg:leading-7">
                                    {{ $education['title'] }}
                                </h3>
                                <span class="text-[#E5E5E5] text-sm lg:text-base font-normal">{{ $education['period'] }}</span>
                            </div>
                            <p class="text-[#7FFFD4] text-base lg:text-lg font-medium mb-2">{{ $education['institution'] }}</p>
                            @if($education['major'])
                            <p class="text-[#7FFFD4] text-sm lg:text-base font-medium mb-2">{{ $education['major'] }}</p>
                            @endif
                            <p class="text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">
                                {{ $education['description'] }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills & Tools Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-12 lg:gap-20">
            <!-- Header -->
            <div class="w-full max-w-[768px] flex flex-col justify-start items-center gap-4">
                <div class="inline-flex justify-start items-center">
                    <div class="text-center text-white text-base font-semibold leading-6">Skills</div>
                </div>
                <div class="self-stretch flex flex-col justify-start items-center gap-6">
                    <div class="self-stretch text-center text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">Skills & Tools</div>
                    <div class="self-stretch text-center text-white text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                        Technologies and tools I work with to bring ideas to life
                    </div>
                </div>
            </div>
            
            <!-- Skills Grid -->
            <div class="self-stretch grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach([
                    ['name' => 'Event Management & Coordination', 'icon' => 'eventmanagement.svg'],
                    ['name' => 'Public Speaking & MC', 'icon' => 'mc.svg'],
                    ['name' => 'Team Collaboration', 'icon' => 'teamwork.svg'],
                    ['name' => 'Logistics Planning', 'icon' => 'checklist.svg'],
                    ['name' => 'Problem Solving', 'icon' => 'problem-solving.svg'],
                    ['name' => 'Laravel', 'icon' => 'laravel.svg'],
                    ['name' => 'PHP', 'icon' => 'php.svg'],
                    ['name' => 'Next.js', 'icon' => 'nextjs-icon-svgrepo-com.svg'],
                    ['name' => 'JavaScript', 'icon' => 'javascript.svg'],
                    ['name' => 'TypeScript', 'icon' => 'typescript.svg'],
                    ['name' => 'Tailwind CSS', 'icon' => 'tailwind-css.svg'],
                    ['name' => 'Web Development', 'icon' => 'web-development.svg'],
                    ['name' => 'Machine Learning, AI, & Data Science', 'icon' => 'python.svg'],
                    ['name' => 'MySQL', 'icon' => 'mysql.svg'],
                    ['name' => 'Git', 'icon' => 'github.svg'],
                    ['name' => 'Figma', 'icon' => 'figma.svg']
                ] as $skill)
                <div class="flex flex-col items-center justify-center gap-3 p-4 lg:p-6 rounded-lg border-2 border-white/10 bg-[#1A1A1A] hover:border-[#7FFFD4]/50 transition-colors">
                    <img src="{{ asset($skill['icon']) }}" alt="{{ $skill['name'] }}" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                    <h3 class="text-white text-sm lg:text-base font-medium leading-5 lg:leading-6 text-center">{{ $skill['name'] }}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="self-stretch px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-center gap-8 lg:gap-12">
            <div class="w-full max-w-[768px] flex flex-col justify-start items-center gap-6">
                <h2 class="text-center text-[#7FFFD4] text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight lg:leading-[60px]">
                    Let's Work Together
                </h2>
                <p class="text-center text-white text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                    I'm always open to discussing new projects, creative ideas, or opportunities to be part of your visions.
                </p>
            </div>
            <a href="{{ route('contact') }}" class="px-6 py-2.5 bg-[#7FFFD4] rounded-md border-2 border-[#7FFFD4] flex justify-center items-center gap-2 hover:bg-[#7FFFD4]/80 transition-colors">
                <div class="text-black text-lg font-medium leading-7">Get In Touch</div>
            </a>
        </div>
    </div>
</div>
@endsection

