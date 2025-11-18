<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow pt-20 mb-10">
            <div class="flex flex-col md:flex-row gap-8 bg-white md:bg-transparent rounded-2xl md:rounded-none p-6">
                <div class="md:w-2/5 w-full">
                    <img src="{{ asset('storage/images/doctor.png') }}" class="w-auto md:h-full h-[200px] object-cover rounded-lg mb-6 mx-auto" alt="Про мене">
                </div>
                <div class="md:w-3/5 w-full flex flex-col justify-center">
                    <h2 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">Про мене</h2>
                    <p class="text-base text-gray-700 mb-6">Я — Аліна Ченкова, лікар-дерматолог, косметолог, експерт у галузі діагностики шкіри та естетичної медицини.</p>
                    <p class="text-base text-gray-700 mb-6">Моя спеціалізація — системний підхід до шкіри: від терапії акне до комплексних антивікових програм. Я вважаю, що успішне лікування та естетика неможливі без розуміння дерматології. Тому мій шлях — це клінічне мислення, сучасні протоколи та постійний професійний розвиток.</p>

                    <p class="text-base text-gray-700 mb-6">Я навчаю лікарів, проводжу авторські курси та на практиці показую, як медицина може бути красивою.
                    Працюю з пацієнтами з різних країн. Допомагаю не просто «покращити обличчя», а розібратися з причинами, побачити прогрес і відчути впевненість у собі.</p>

                    <p class="text-base text-gray-700 mb-6">  Якщо вам відгукується поєднання науки та естетики — ласкаво просимо.</p>
                    <a href="{{ route_locale('webinar') }}" class="bg-[#4BAE37] hover:bg-[#3c952a] md:w-96 w-full py-3 text-white rounded-xl mx-auto block uppercase font-bold text-base cursor-pointer mb-6 text-center">
                            Переглянути мої вебінари
                    </a>
                </div>
            </div>
        </div>    
    </div>
</x-layouts.main>
