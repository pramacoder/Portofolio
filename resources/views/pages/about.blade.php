@extends('layouts.app')

@section('title', 'About - Portfolio')

@section('content')
<!-- About Hero Section -->
<section class="py-12 lg:py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center mb-12 lg:mb-16">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-4 lg:mb-6">
                About Me
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Passionate developer and designer creating digital experiences that matter
            </p>
        </div>

        <!-- Profile Section - Mobile: Stacked, Desktop: Side by Side -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-16 lg:mb-20">
            <!-- Image - Mobile First -->
            <div class="order-1 lg:order-1 flex justify-center lg:justify-start">
                <div class="relative w-full max-w-sm">
                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-blue-400 to-purple-500 dark:from-blue-600 dark:to-purple-700 shadow-2xl overflow-hidden">
                        <img src="{{ asset('images/portfolio/hero/profile.jpg') }}" 
                             alt="Profile" 
                             class="w-full h-full object-cover"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-full h-full items-center justify-center text-white text-2xl font-bold">
                            Profile Photo
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content - Mobile Second, Desktop First -->
            <div class="order-2 lg:order-2">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white mb-4 lg:mb-6">
                    Hi, I'm Your Name
                </h2>
                <div class="space-y-4 text-gray-600 dark:text-gray-400 text-base lg:text-lg">
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
</section>

<!-- Experience & Education Section -->
<section class="py-12 lg:py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Experience -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6 lg:mb-8">
                    Experience
                </h2>
                <div class="space-y-6">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Senior Developer
                            </h3>
                            <span class="text-sm text-gray-500 dark:text-gray-400">2020 - Present</span>
                        </div>
                        <p class="text-blue-600 dark:text-blue-400 font-medium mb-2">Company Name {{ $i }}</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm lg:text-base">
                            Led development of multiple web applications using Laravel, Vue.js, and modern CSS frameworks. Collaborated with cross-functional teams to deliver high-quality products.
                        </p>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Education -->
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6 lg:mb-8">
                    Education
                </h2>
                <div class="space-y-6">
                    @for($i = 1; $i <= 2; $i++)
                    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Bachelor's Degree
                            </h3>
                            <span class="text-sm text-gray-500 dark:text-gray-400">2015 - 2019</span>
                        </div>
                        <p class="text-blue-600 dark:text-blue-400 font-medium mb-2">University Name</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm lg:text-base">
                            Computer Science - Focused on software engineering, web development, and database management.
                        </p>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills & Tools Section -->
<section class="py-12 lg:py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-center text-gray-900 dark:text-white mb-8 lg:mb-12">
            Skills & Tools
        </h2>
        
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach([
                    'Laravel', 'PHP', 'Vue.js', 'React', 
                    'JavaScript', 'TypeScript', 'Tailwind CSS', 'Alpine.js',
                    'MySQL', 'PostgreSQL', 'Git', 'Docker',
                    'Figma', 'Adobe XD', 'Photoshop', 'Illustrator'
                ] as $skill)
                <div class="text-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg hover:shadow-md transition-shadow">
                    <div class="text-2xl mb-2">🔧</div>
                    <h3 class="text-sm lg:text-base font-medium text-gray-900 dark:text-white">{{ $skill }}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 lg:py-20 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-700 dark:to-purple-700">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4 lg:mb-6">
            Let's Work Together
        </h2>
        <p class="text-lg lg:text-xl text-blue-100 mb-8 lg:mb-10 max-w-2xl mx-auto">
            I'm always open to discussing new projects, creative ideas, or opportunities to be part of your visions.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
            Get In Touch
        </a>
    </div>
</section>
@endsection

