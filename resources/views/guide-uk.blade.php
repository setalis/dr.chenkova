<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">Гайди</h1>
                <p class="text-lg text-gray-700 mb-6">На сторінці можна завантажити безкоштовні гайди, які корисні та інформативні в різних питаннях, пов'язаних з красою та здоров'ям.</p>
            </div>

            <!-- Гайды -->

            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Гайд про білки">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Гайд 1</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Все, що потрібно знати про білки</h2>
                        <p class="text-gray-700">У цьому гайді ви дізнаєтеся все, що потрібно знати про білки, їх функції та як вони впливають на ваше здоров'я та красу.</p>
                        <a href="{{asset('storage/guide-protein.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Завантажити</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto p-5">
                        <img src="{{ asset('storage/images/guide-2.jpg') }}" class="w-full h-full object-cover rounded-full" alt="Гайд про активи">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Гайд 2</h2>
                        <h2 class="text-2xl font-bold text-gray-700">Активи в догляді: як зрозуміти що працює.</h2>
                        <p class="text-gray-700">У цьому гайді ви дізнаєтеся про "активи" - працюючі молекули, які дійсно впливають на шкіру</p>
                        <a href="{{asset('storage/guide-active.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Завантажити</button></a>
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
                        <h2 class="text-2xl font-bold text-gray-700">Їж, спи, ходи</h2>
                        <p class="text-gray-700">Три базові інструменти з яких починається здоров'я та гарна шкіра</p>
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
                        <h2 class="text-2xl font-bold text-gray-700">Залізо-дефіцит</h2>
                        <p class="text-gray-700">Від аналізів до відновлення</p>
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
                        <h2 class="text-2xl font-bold text-gray-700">Розацея</h2>
                        <p class="text-gray-700">Коли почервоніння – це не просто реакція на вино чи сором</p>
                        <a href="{{asset('storage/guide_rosacea_diary.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Завантажити</button></a>
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
                        <h2 class="text-2xl font-bold text-gray-700">Гайд для пацієнтів з акне</h2>
                        <p class="text-gray-700">Прості кроки до здорової шкіри та харчування. Будьте здорові, красиві та сповнені енергії</p>
                        <a href="{{asset('storage/guide_acne_patient.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">Скачать</button></a>
                    </div>
                </div> 
            </div>
            
            <!-- Гайды -->    


        </div>
    </div>
   
</x-layouts.main>
