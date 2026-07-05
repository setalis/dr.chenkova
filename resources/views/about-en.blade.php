<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow pt-20 mb-10">
            <div class="flex flex-col md:flex-row gap-8 bg-white md:bg-transparent rounded-2xl md:rounded-none p-6">
                <div class="md:w-2/5 w-full">
                    <img src="{{ asset('storage/images/doctor.png') }}" class="w-auto md:h-full h-[200px] object-cover rounded-lg mb-6 mx-auto" alt="About me">
                </div>
                <div class="md:w-3/5 w-full flex flex-col justify-center">
                    <h2 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">About me</h2>
                    <p class="text-base text-gray-700 mb-6">I am Alina Chenkova, a dermatologist and cosmetologist, an expert in skin diagnostics and aesthetic medicine.</p>
                    <p class="text-base text-gray-700 mb-6">My specialization is a systemic approach to skin health: from acne therapy to comprehensive anti-aging programs. I believe that successful treatment and aesthetics are impossible without a deep understanding of dermatology. That is why my path is clinical thinking, modern protocols, and continuous professional development.</p>

                    <p class="text-base text-gray-700 mb-6">I teach doctors, run author courses, and demonstrate in practice how medicine can be beautiful.
                    I work with patients from different countries. I help not only with "improving appearance", but with understanding the root causes, seeing progress, and feeling confident in your own skin.</p>

                    <p class="text-base text-gray-700 mb-6">If you share the passion for combining science and aesthetics — welcome.</p>
                    <a href="{{ route_locale('webinar') }}" class="bg-[#4BAE37] hover:bg-[#3c952a] md:w-96 w-full py-3 text-white rounded-xl mx-auto block uppercase font-bold text-base cursor-pointer mb-6 text-center">
                            Watch my webinars
                    </a>
                </div>
            </div>
        </div>    
    </div>
</x-layouts.main>
