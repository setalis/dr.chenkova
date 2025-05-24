<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow pt-20 mb-10">
            <div class="flex flex-col md:flex-row gap-8 bg-white md:bg-transparent rounded-2xl md:rounded-none p-6">
                <div class="md:w-2/5 w-full">
                    <img src="{{ asset('storage/images/doctor.png') }}" class="w-auto md:h-full h-[200px] object-cover rounded-lg mb-6 mx-auto" alt="Обо мне">
                </div>
                <div class="md:w-3/5 w-full flex flex-col justify-center">
                    <h2 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">Обо мне</h2>
                    <p class="text-base text-gray-700 mb-6">Я — Алина Ченкова, врач-дерматолог, косметолог, эксперт в области диагностики кожи и эстетической медицины.</p>
                    <p class="text-base text-gray-700 mb-6">Моя специализация — системный подход к коже: от терапии акне до комплексных антивозрастных программ. Я считаю, что успешное лечение и эстетика невозможны без понимания дерматологии. Поэтому мой путь — это клиническое мышление, современные протоколы и постоянное профессиональное развитие.</p>

                    <p class="text-base text-gray-700 mb-6">Я обучаю врачей, провожу авторские курсы и на практике показываю, как медицина может быть красивой.
                    Работаю с пациентами из разных стран. Помогаю не просто «улучшить лицо», а разобраться с причинами, увидеть прогресс и почувствовать уверенность в себе.</p>

                    <p class="text-base text-gray-700 mb-6">  Если вам откликается сочетание науки и эстетики — добро пожаловать.</p>
                    <a href="{{ route('webinar') }}" class="bg-[#4BAE37] hover:bg-[#3c952a] md:w-96 w-full py-3 text-white rounded-xl mx-auto block uppercase font-bold text-base cursor-pointer mb-6 text-center">
                            Посмотреть мои вебинары
                    </a>
                </div>
            </div>
        </div>    
    </div>
</x-layouts.main>
