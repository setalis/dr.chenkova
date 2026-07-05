<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        <div class="container max-w-7xl mx-auto px-4 pt-28">
            <h1 class="md:text-3xl text-2xl font-black uppercase text-center text-[#4BAE37] mb-6">Individual Training</h1>
            <p class="md:text-lg text-base text-gray-700 mb-6">A format for specialists focused on deep understanding, clinical logic, and personalised strategies for patient management.</p>
        </div>
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow">
            <div class="columns-1 md:columns-2 gap-8 mb-12">
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg md:p-6 p-4 shadow-sm">
                        <img src="{{ asset('storage/images/lessons-1.png') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Lesson 1">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">Face-to-Face Training Programme №1</h1>
                            <p class="text-lg text-gray-700 mb-6">In this course you will study:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Characteristics of botulinum neuroprotein across different trade names. What distinguishes them, which is better?</li>
                                <li>Biomechanics of facial mimetic muscles.</li>
                                <li>Creating an individual protocol for each patient. Moving beyond standard injection points.</li>
                                <li>Analysis of core techniques.</li>
                                <li>Practice on models.</li>
                            </ul>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700">Course price:</p>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer">
                                    $1000
                                </button>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg p-6 shadow-sm text-gray-700">
                        <img src="{{ asset('storage/images/lessons-2.png') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Lesson 2">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">Face-to-Face Training Programme №2</h1>
                            <p class="text-lg text-gray-700 mb-6">In this course you will learn:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Facial anatomy and morphology: layered structure, innervation, and blood supply</li>
                                <li>Age-related involutional changes</li>
                                <li>Indications and contraindications for contour plastic surgery</li>
                                <li>Filling out patient cards and informed consent forms</li>
                                <li>Aseptics and antiseptics in injection practice</li>
                                <li>Injection techniques: choosing the approach based on patient anatomy and age</li>
                                <li>Classification of preparations and instruments</li>
                                <li>Composing an individual correction protocol</li>
                                <li>Preparation characteristics and criteria for selection</li>
                                <li>Danger zones, complications, and emergency care tactics</li>
                            </ul>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700">Course price:</p>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer">
                                    $1500
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg p-6 shadow-sm text-gray-700">
                        <img src="{{ asset('storage/images/lessons-3.jpg') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Lesson 3">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">PLA — Through the Prism of Collagen Loss Mechanism Diagnostics</h1>
                            <p class="text-lg text-gray-700 mb-6">In this course you will learn about:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Physiology of aging</li>
                                <li>Epigenetics of aging</li>
                                <li>Diagnostics</li>
                                <li>What polylactic acid is</li>
                                <li>PLA classification and mechanism of action</li>
                                <li>Working protocols for different forms (special protocols by different manufacturers)</li>
                                <li>Complications</li>
                            </ul>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <div class="flex flex-col md:items-start items-center text-center md:text-left">
                                    <p class="text-lg font-bold text-gray-700">1-day price:</p>
                                    <p class="text-base font-normal text-gray-700 md:mb-6 mb-3">Theory + practice (1 model)</p>
                                </div>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">
                                €1300
                                </button>
                            </div>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <div class="flex flex-col md:items-start items-center md:text-left text-center">
                                    <p class="text-lg font-bold text-gray-700 mb-3">2-day price:</p>
                                    <p class="text-base font-normal text-gray-700 mb-1">Day 1 — Theory + cannula hand technique</p>
                                    <p class="text-base font-normal text-gray-700 mb-6">Day 2 — Practice on 3–4 models</p>
                                </div>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">
                                €2500
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <x-modal-form />
</x-layouts.main>
