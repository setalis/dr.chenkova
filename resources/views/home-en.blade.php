<x-layouts.main>
<!-- Main Content -->
    <!-- Hero Section -->
    <section class="min-h-screen relative flex items-center overflow-hidden header bg-gradient-to-r from-indigo-500/20 from-10% via-sky-500/20 via-30% to-emerald-500/20 to-90%">
        <!-- Background Image Desktop -->
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0 hidden md:block">
            <img src="{{ asset('storage/images/doctor.png') }}" alt="Doctor" class="w-[600px] xl:w-[800px] object-contain opacity-80"/>
        </div>
        <!-- Mobile Background Images -->
        <div class="md:hidden absolute inset-0 z-0">
            <div class="absolute -right-56 bottom-1/2 h-[500px] w-full">
                <img src="{{ asset('storage/images/doctor.png') }}" alt="Doctor" class="h-full w-full object-contain opacity-60"/>
            </div>
            <div class="absolute -left-56 bottom-0 h-[500px] w-full">
                <img src="{{ asset('storage/images/doctor.png') }}" alt="Doctor" class="h-full w-full object-contain opacity-60"/>
            </div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-2 gap-8 items-stretch pt-20 pb-10">
                <!-- Left Column -->
                <div class="text-left bg-white/80 backdrop-blur-xs rounded-2xl p-10 flex flex-col h-auto md:h-[550px] relative overflow-hidden">
                    <div class="relative z-10">
                        <h1 class="text-6xl md:text-7xl xl:text-8xl font-bold text-teal-600 leading-tight">On Line</h1>
                        <h2 class="text-2xl md:text-4xl xl:text-5xl text-gray-700 -mt-3">consultation</h2>
                        <p class="text-gray-600 max-w-lg text-lg mt-8 mb-8">We will analyse your skin type and condition and you will receive lifestyle recommendations. I will explain the mechanism behind any skin condition (if present). We will create a treatment map or beauty protocol. I will provide written recommendations for external treatment, a procedure protocol, and internal medication intake (if needed).</p>
                    </div>
                    <div class="mt-auto relative z-10">
                        <a href="https://t.me/Alina_Chenkova" target="_blank" class="bg-teal-600 text-white px-8 py-4 rounded-full hover:bg-teal-700 transition-all text-lg">
                            Book appointment
                        </a>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="text-right bg-white/80 backdrop-blur-xs rounded-2xl p-10 flex flex-col h-auto md:h-[550px] relative overflow-hidden">
                    <div class="relative z-10">
                        <h1 class="text-6xl md:text-7xl xl:text-8xl font-bold text-[#214992] leading-tight">Off Line</h1>
                        <h2 class="text-2xl md:text-4xl xl:text-5xl text-gray-700 -mt-3">in-person visit</h2>
                        <p class="text-[#214992] max-w-lg ml-auto text-lg mt-8 mb-8">At the in-person visit you can receive cosmetological and dermatological consultation. Dermoscopy and ultrasound skin examination are also available if needed. Appointments are only possible through the clinic administrator.</p>
                    </div>
                    <div class="mt-auto relative z-10">
                        <a href="https://t.me/+995557673280" target="_blank" class="bg-[#214992] text-white px-8 py-4 rounded-full hover:bg-[#214992]/80 transition-all text-lg">
                            Book appointment
</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scroll Indicator -->
        <div class="hidden md:flex absolute bottom-8 left-1/2 transform -translate-x-1/2 bg-white/80 rounded-full animate-bounce p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#214992" class="w-8 h-8 text-gray-400 " viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
            </svg>
        </div>
    </section>
    <section class="py-16 bg-gradient-to-r from-emerald-500/20 from-10% via-sky-500/20 via-30% to-indigo-500/20 to-90%">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-4 items-center">
                <div class="md:col-span-2 flex flex-col items-center md:items-start">
                    <h2 class="text-5xl font-bold text-center md:text-left  text-[#214992] mb-12">Take the skin condition test</h2>
                    <p class="md:max-w-[90%] text-center md:text-left text-lg mb-8 text-gray-600">Complete a four-part questionnaire to determine your skin condition. After completing the test, you can save your results and later receive a consultation and lifestyle recommendations by booking an appointment.</p>
                    <a href="{{ route_locale('test') }}" class="bg-[#214992] text-center margin-auto md:text-left text-white px-8 py-4 rounded-full hover:bg-[#214992]/80 transition-all text-lg">
                        Take the test
                    </a>
                </div>
                <div class="max-w-full md:col-span-1 flex justify-center pt-4">
                    <img src="{{ asset('storage/images/3813830.png') }}" alt="Test" class="w-full h-full object-cover rounded-2xl">
                </div>
            </div>
        </div>
    </section>
    <!-- Doctors Section -->
    <section class="py-16 ">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center text-teal-600  mb-12">For Doctors</h2>
            <div class="grid md:grid-cols-2 gap-8">                            
                <div class="w-full text-center space-y-4">
                    <img src="{{ asset('storage/images/webinar-save.jpg') }}" alt="Doctor" class="w-[250px] h-auto object-cover rounded-2xl mx-auto p-4 border-green-300 border">
                    <h3 class="text-xl font-semibold">Webinar recordings</h3>
                    <p class="text-gray-600 mb-8">For patients and doctors I conduct educational webinars and live streams. You can access the full video archive by clicking the button below.</p>
                
                    <a href="{{ route_locale('webinar') }}" class="bg-[#214992] text-white px-6 py-4 rounded-full hover:bg-blue-700 transition-all">
                    View
                    </a>
                </div>
                <div class="text-center space-y-4">
                    <img src="{{ asset('storage/images/individual_training.jpg') }}" alt="Doctor" class="w-[250px] h-auto object-cover rounded-2xl mx-auto p-4 border-green-300 border">
                    <h3 class="text-xl font-semibold">Individual training</h3>
                    <p class="text-gray-600">This format is suitable for practicing specialists and doctors.
                        Over 2 days you can gain both theoretical and practical knowledge on the following topics:                                    
                    </p>
                    <div class="w-80 mx-auto mb-8">
                        <ul class="list-disc list-inside text-left text-gray-600">
                            <li>Dermatology in cosmetology.</li>
                            <li>Acne treatment in the cosmetologist's office;</li>
                            <li>Botulinum therapy;</li>
                            <li>Hand technique — cannula;</li>
                            <li>Radiesse;</li>
                            <li>Combination of hardware techniques;</li>
                            <li>Ultrasound diagnostics in cosmetology.</li>
                        </ul>
                    </div>
                    <a href="{{ route_locale('lessons') }}" class="bg-teal-600 text-white px-6 py-4 rounded-full hover:bg-teal-700 transition-all">
                        Learn more
                    </a>
                </div>
        </div>
    </section>
</x-layouts.main>
