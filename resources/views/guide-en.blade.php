<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">Guides</h1>
                <p class="text-lg text-gray-700 mb-6">On this page you can download free guides that are useful and informative on various topics related to beauty and health.</p>
            </div>

            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Guide about proteins">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Guide 1</h3>
                        <h2 class="text-2xl font-bold text-gray-700">Everything you need to know about proteins</h2>
                        <p class="text-gray-700">In this guide you will learn everything you need to know about proteins, their functions, and how they affect your health and beauty.</p>
                        <a href="{{asset('storage/guide-protein.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Download</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto p-5">
                        <img src="{{ asset('storage/images/guide-2.jpg') }}" class="w-full h-full object-cover rounded-full" alt="Guide about actives">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Guide 2</h3>
                        <h2 class="text-2xl font-bold text-gray-700">Actives in skincare: how to understand what really works.</h2>
                        <p class="text-gray-700">In this guide you will learn about "actives" — the active molecules that genuinely affect the skin.</p>
                        <a href="{{asset('storage/guide-active.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Download</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-3.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Acne before and after">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Guide 3</h3>
                        <h2 class="text-2xl font-bold text-gray-700">Eat, Sleep, Walk</h2>
                        <p class="text-gray-700">Three fundamental tools where health and beautiful skin begin.</p>
                        <a href="{{asset('storage/guide_eat_sleep_walk.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Download</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-4.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Acne before and after">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Guide 4</h3>
                        <h2 class="text-2xl font-bold text-gray-700">Iron Deficiency</h2>
                        <p class="text-gray-700">From lab tests to recovery.</p>
                        <a href="{{asset('storage/guide_iron.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Download</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-5.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Acne before and after">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Guide 5</h3>
                        <h2 class="text-2xl font-bold text-gray-700">Rosacea</h2>
                        <p class="text-gray-700">When redness is not just a reaction to wine or embarrassment.</p>
                        <a href="{{asset('storage/guide_rosacea_diary.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Download</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-6.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Acne before and after">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Guide 6</h3>
                        <h2 class="text-2xl font-bold text-gray-700">Guide for patients with acne</h2>
                        <p class="text-gray-700">Simple steps towards healthy skin and nutrition. Stay healthy, beautiful, and full of energy.</p>
                        <a href="{{asset('storage/guide_acne_patient.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Download</button></a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
   
</x-layouts.main>
