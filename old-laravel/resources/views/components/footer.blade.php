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
            <div class="self-stretch inline-flex justify-start items-start gap-1">
                    <div class="justify-start text-white/60 text-xs font-normal leading-4">
                        Follow me on social media
                    </div>
                </div>
                <div class="self-stretch inline-flex justify-start items-start gap-1">
                    <div class="justify-start text-white/60 text-xs font-normal leading-4">
                        & Unsubscribe anytime.
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
                    <a href="https://www.linkedin.com/in/i-gusti-nyoman-pramajaya-3560b9285/" target="_blank" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                        <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">LinkedIn profile</div>
                    </a>
                    <a href="https://instagram.com/pramajaya__" target="_blank" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                        <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Instagram account</div>
                    </a>
                    <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                        <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Twitter updates</div>
                    </a>
                    <a href="https://facebook.com/Pramajaya" target="_blank" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                        <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Facebook page</div>
                    </a>
                    <a href="#" class="self-stretch py-2 inline-flex justify-start items-start hover:text-[#7FFFD4] transition-colors">
                        <div class="flex-1 justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">Dribbble</div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="self-stretch flex flex-col justify-start items-start gap-8">
            <div class="self-stretch h-0 outline outline-2 outline-offset-[-1px] outline-white/20"></div>
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-between items-center gap-4">
                <!-- Logo/Name -->
                <a href="{{ route('home') }}" class="text-white text-base lg:text-lg font-semibold leading-6 lg:leading-7 hover:text-[#7FFFD4] transition-colors">
                    Pramajaya
                </a>
                
                <!-- Copyright -->
                <div class="flex justify-start items-center gap-6">
                    <div class="justify-start text-white text-sm lg:text-base font-normal leading-5 lg:leading-6">
                        © 2025 Portfolio Pramajaya. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
