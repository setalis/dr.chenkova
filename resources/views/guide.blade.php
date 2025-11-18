<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">Гайды</h1>
                <p class="text-lg text-gray-700 mb-6">На странице можно скачать бесплатные гайды, которые полезны и информативны в различных вопросах, связанных с красотой и здоровьем.</p>
            </div>

            <!-- Гайды -->

            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Гайд 1</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Все, что нужно знать о белках</h2>
                        <p class="text-gray-700">В этом гайде вы узнаете все, что нужно знать о белках, их функции, и как они влияют на ваше здоровье и красоту.</p>
                        <a href="{{asset('storage/guide-protein.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto p-5">
                        <img src="{{ asset('storage/images/guide-2.jpg') }}" class="w-full h-full object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Гайд 2</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Активы в уходе: как понять что работает.</h2>
                        <p class="text-gray-700">В этом гайде вы узнаете об "активах" - работающих молекулах, которые действительно влияют на кожу</p>
                        <a href="{{asset('storage/guide-active.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-3.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Гайд 3</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Ешь, спи, ходи</h2>
                        <p class="text-gray-700">Три базовых инструмента с которых начинается здоровье и красивая кожа</p>
                        <a href="{{asset('storage/guide_eat_sleep_walk.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-4.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Гайд 4</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Железо-дефицит</h2>
                        <p class="text-gray-700">От анализов до восстановления</p>
                        <a href="{{asset('storage/guide_iron.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-5.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Гайд 5</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Розацеа</h2>
                        <p class="text-gray-700">Когда покраснение - это не просто реакция на вино или стыд</p>
                        <a href="{{asset('storage/guide_rosacea_diary.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-6.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">Гайд 6</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Гайд для пациентов с акне</h2>
                        <p class="text-gray-700">Простые шаги к здоровой коже и питанию. Будьте здоровы, красивы и полны энергии</p>
                        <a href="{{asset('storage/guide_acne_patient.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                </div> 
            </div>
            
            <!-- Гайды -->    


        </div>
    </div>
   
</x-layouts.main>
