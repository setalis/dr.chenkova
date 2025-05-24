<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        <div class="container max-w-7xl mx-auto px-4 pt-28">
            <h1 class="md:text-3xl text-2xl font-black uppercase text-center text-[#4BAE37] mb-6">Индивидуальное обучение</h1>
            <p class="md:text-lg text-base text-gray-700 mb-6">Формат для специалистов, ориентированных на глубокое понимание, клиническую логику и персонализированные стратегии ведения пациентов</p>
        </div>
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow">
            <div class="columns-1 md:columns-2 gap-8 mb-12">
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg md:p-6 p-4 shadow-sm">
                        <img src="{{ asset('storage/images/lessons-1.png') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Урок 1">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">Программа очного обучения №1</h1>
                            <p class="text-lg text-gray-700 mb-6">В этом курсе вы изучите:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Особенности ботулинического нейропротеина в разных торговых марках. В чем их отличия, какой лучше?</li>
                                <li>Биомеханика мимических мышц лица.</li>
                                <li>Создание индивидуального протокола для каждого пациента. Отходим от стандартных точек.
                                </li>
                                <li>Разбор основных техник.</li>
                                <li>Отработка на моделях.</li>
                            </ul>
                            <div class="flex flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700 mb-6">Стоимость курса:</p>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">
                                    $1000
                                </button>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg p-6 shadow-sm text-gray-700">
                        <img src="{{ asset('storage/images/lessons-2.png') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Урок 2">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">Программа очного обучения №2</h1>
                            <p class="text-lg text-gray-700 mb-6">В этом курсе вы узнаете:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Анатомию и морфологию лица: послойное строение, иннервация и кровоснабжение </li>
                                <li>Возрастные инволюционные изменения</li>
                                <li>Показания и противопоказания к контурной пластике</li>
                                <li>Заполнение карты пациента и информированного согласия</li>
                                <li>Асептику и антисептику в инъекционной практике</li>
                                <li>Техники инъекций: выбор подхода в зависимости от анатомии и возраста пациента</li>
                                <li>Классификацию препаратов и инструментов</li>
                                <li>Составление индивидуального протокола коррекции</li>
                                <li>Характеристики препаратов и критерии их выбора</li>
                                <li>Опасные зоны, осложнения и тактика неотложной помощи</li>
                            </ul>
                            <div class="flex flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700 mb-6">Стоимость курса:</p>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">
                                    $1500
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
