@extends('layouts.app')

@section('title', 'Contact - Portfolio')

@section('content')
<div class="w-full flex flex-col justify-start items-start overflow-hidden bg-black">
    <!-- Contact Section -->
    <div class="self-stretch min-h-[600px] lg:h-auto px-4 sm:px-8 lg:px-16 py-12 lg:py-28 bg-black flex flex-col justify-start items-center gap-12 lg:gap-20 overflow-hidden">
        <div class="w-full max-w-[1280px] flex flex-col justify-start items-start gap-12 lg:gap-20">
            <div class="self-stretch inline-flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-20">
                <!-- Left Content -->
                <div class="flex-1 inline-flex flex-col justify-start items-start gap-4">
                    <div class="inline-flex justify-start items-center">
                        <div class="justify-start text-[#E5E5E5] text-base font-semibold leading-6">Contact</div>
                    </div>
                    <div class="self-stretch flex flex-col justify-start items-start gap-6">
                        <div class="self-stretch justify-start text-[#7FFFD4] text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight lg:leading-[72px]">Get in touch</div>
                        <div class="self-stretch justify-start text-[#E5E5E5] text-lg lg:text-xl font-normal leading-7 lg:leading-8">
                            Have a project in mind or just want to say hello? We'd like to hear from you.
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Contact Info -->
                <div class="w-full lg:w-[500px] py-2 inline-flex flex-col justify-start items-start gap-6">
                    <!-- Email -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('mailIcon.svg') }}" alt="Email" class="w-5 h-4">
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-[#E5E5E5] text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Email</div>
                            <a href="mailto:pramajaya456@gmail.com" class="self-stretch justify-start text-[#E5E5E5] text-base lg:text-lg font-normal underline leading-6 lg:leading-7 hover:text-[#7FFFD4] transition-colors">
                                pramajaya456@gmail.com
                            </a>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('callIcon.svg') }}" alt="Phone" class="w-5 h-5">
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-[#E5E5E5] text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Phone</div>
                            <a href="tel:+6287743447062" class="self-stretch justify-start text-[#E5E5E5] text-base lg:text-lg font-normal underline leading-6 lg:leading-7 hover:text-[#7FFFD4] transition-colors">
                                +62 877 4344 7062
                            </a>
                        </div>
                    </div>
                    
                    <!-- Office -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('locationIcon.svg') }}" alt="Location" class="w-4 h-5">
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-[#E5E5E5] text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Office</div>
                            <div class="self-stretch justify-start text-[#E5E5E5] text-base lg:text-lg font-normal leading-6 lg:leading-7">
                                Work remotely worldwide
                            </div>
                        </div>
                    </div>
                    
                    <!-- Udayana University -->
                    <div class="self-stretch inline-flex justify-start items-start gap-4">
                        <div class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('locationIcon.svg') }}" alt="Location" class="w-4 h-5">
                        </div>
                        <div class="flex-1 inline-flex flex-col justify-start items-start gap-2">
                            <div class="self-stretch justify-start text-[#E5E5E5] text-xl lg:text-2xl font-bold leading-7 lg:leading-9">Udayana University</div>
                            <div class="self-stretch justify-start text-[#E5E5E5] text-base lg:text-lg font-normal leading-6 lg:leading-7">
                                You can visit me at the computer science programme, Faculty of Mathematics and Natural Sciences.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Send a Message and Follow Me Section -->
            <div class="self-stretch flex flex-col lg:flex-row justify-start items-start gap-8 lg:gap-12">
                <!-- Left: Send a Message Form -->
                <div class="flex-1 self-stretch flex flex-col justify-start items-start gap-8 lg:gap-12">
                    <div class="self-stretch justify-start text-[#E5E5E5] text-2xl lg:text-3xl font-bold leading-7 lg:leading-9">Send a message</div>
                    
                    <form id="contactForm" class="self-stretch flex flex-col justify-start items-start gap-6" onsubmit="handleFormSubmit(event)">
                        @csrf
                        
                        <!-- Name -->
                        <div class="self-stretch flex flex-col justify-start items-start gap-2">
                            <label for="name" class="text-[#E5E5E5] text-base font-medium leading-6">Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   class="self-stretch px-4 py-3 bg-transparent border-2 border-[#E5E5E5] rounded-md text-[#E5E5E5] text-base font-normal leading-6 focus:outline-none focus:border-[#7FFFD4] transition-colors">
                        </div>

                        <!-- Email -->
                        <div class="self-stretch flex flex-col justify-start items-start gap-2">
                            <label for="email" class="text-[#E5E5E5] text-base font-medium leading-6">Email</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required
                                   class="self-stretch px-4 py-3 bg-transparent border-2 border-[#E5E5E5] rounded-md text-[#E5E5E5] text-base font-normal leading-6 focus:outline-none focus:border-[#7FFFD4] transition-colors">
                        </div>

                        <!-- Subject -->
                        <div class="self-stretch flex flex-col justify-start items-start gap-2">
                            <label for="subject" class="text-[#E5E5E5] text-base font-medium leading-6">Subject</label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject" 
                                   required
                                   class="self-stretch px-4 py-3 bg-transparent border-2 border-[#E5E5E5] rounded-md text-[#E5E5E5] text-base font-normal leading-6 focus:outline-none focus:border-[#7FFFD4] transition-colors">
                        </div>

                        <!-- Message -->
                        <div class="self-stretch flex flex-col justify-start items-start gap-2">
                            <label for="message" class="text-[#E5E5E5] text-base font-medium leading-6">Message</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="6" 
                                      required
                                      class="self-stretch px-4 py-3 bg-transparent border-2 border-[#E5E5E5] rounded-md text-[#E5E5E5] text-base font-normal leading-6 resize-none focus:outline-none focus:border-[#7FFFD4] transition-colors"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="px-6 py-2.5 bg-[#7FFFD4] rounded-md border-2 border-[#7FFFD4] flex justify-center items-center gap-2 hover:bg-[#7FFFD4]/80 transition-colors">
                            <div class="text-black text-lg font-medium leading-7">Send Message</div>
                        </button>
                    </form>
                </div>
                
                <!-- Right: Follow Me Social Media -->
                <div class="flex-1 self-stretch flex flex-col justify-start items-start gap-8 lg:gap-12">
                    <div class="self-stretch justify-start text-[#E5E5E5] text-2xl lg:text-3xl font-bold leading-7 lg:leading-9">Follow Me</div>
                    <div class="inline-flex flex-row justify-start items-center gap-4 flex-wrap">
                        <!-- Instagram -->
                        <a href="https://instagram.com/pramajaya__" target="_blank" class="w-12 h-12 flex items-center justify-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('instagram.svg') }}" alt="Instagram" class="w-12 h-12">
                        </a>
                        
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/in/i-gusti-nyoman-pramajaya-3560b9285/" target="_blank" class="w-12 h-12 flex items-center justify-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('linkedin.svg') }}" alt="LinkedIn" class="w-12 h-12">
                        </a>
                        
                        <!-- GitHub -->
                        <a href="https://github.com/pramacoder" target="_blank" class="w-12 h-12 flex items-center justify-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('github.svg') }}" alt="GitHub" class="w-12 h-12">
                        </a>
                        
                        <!-- Facebook -->
                        <a href="https://facebook.com/Pramajaya" target="_blank" class="w-12 h-12 flex items-center justify-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('facebook.svg') }}" alt="Facebook" class="w-12 h-12">
                        </a>
                        
                        <!-- WhatsApp -->
                        <a href="https://wa.me/6287743447062" target="_blank" class="w-12 h-12 flex items-center justify-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('whatsapp.svg') }}" alt="WhatsApp" class="w-12 h-12">
                        </a>
                        
                        <!-- Telegram -->
                        <a href="https://t.me/6287743447062" target="_blank" class="w-12 h-12 flex items-center justify-center hover:opacity-80 transition-opacity">
                            <img src="{{ asset('telegram.svg') }}" alt="Telegram" class="w-12 h-12">
                        </a>
                    </div>
                </div>
            </div>
            
            <script>
                function handleFormSubmit(event) {
                    event.preventDefault();
                    
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const subject = document.getElementById('subject').value;
                    const message = document.getElementById('message').value;
                    
                    const mailtoLink = `mailto:pramajaya456@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent('Name: ' + name + '\nEmail: ' + email + '\n\nMessage:\n' + message)}`;
                    
                    window.location.href = mailtoLink;
                }
            </script>
            
            <!-- Map Section -->
            <div class="self-stretch flex flex-col justify-start items-start gap-6">
                <div class="self-stretch w-full h-auto lg:h-[450px] rounded-lg overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.9316634542224!2d115.17590517501598!3d-8.79249089125968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2449816b2b2a7%3A0xf47dc9bcc262b2ac!2sInformatika%20Universitas%20Udayana!5e0!3m2!1sid!2sid!4v1764742923425!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 450px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
