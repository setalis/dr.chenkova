<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        <div class="container max-w-7xl mx-auto px-4 pt-28">
            <h1 class="md:text-3xl text-2xl font-black uppercase text-center text-[#4BAE37] mb-6">ინდივიდუალური ტრენინგი</h1>
            <p class="md:text-lg text-base text-gray-700 mb-6">ფორმატი სპეციალისტებისთვის, რომლებიც ორიენტირებულნი არიან ღრმა გაგებაზე, კლინიკურ ლოგიკაზე და პერსონალიზებულ სტრატეგიებზე პაციენტების მართვაში</p>
        </div>
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow">
            <div class="columns-1 md:columns-2 gap-8 mb-12">
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg md:p-6 p-4 shadow-sm">
                        <img src="{{ asset('storage/images/lessons-1.png') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Урок 1">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">სახე-სახე ტრენინგის პროგრამა №1</h1>
                            <p class="text-lg text-gray-700 mb-6">ამ კურსში შეისწავლით:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Особливості ботулінічного нейропротеїну в різних торгових марках. У чому їх відмінності, який краще?</li>
                                <li>Біомеханіка мімічних м'язів обличчя.</li>
                                <li>Створення індивідуального протоколу для кожного пацієнта. Відходимо від стандартних точок.
                                </li>
                                <li>Розбір основних технік.</li>
                                <li>Відпрацювання на моделях.</li>
                            </ul>
                            <div class="flex flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700 mb-6">კურსის ღირებულება:</p>
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
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">სახე-სახე ტრენინგის პროგრამა №2</h1>
                            <p class="text-lg text-gray-700 mb-6">ამ კურსში გაიგებთ:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>Анатомію та морфологію обличчя: шарова будова, іннервація та кровопостачання </li>
                                <li>Вікові інволюційні зміни</li>
                                <li>Показання та протипоказання до контурної пластики</li>
                                <li>Заповнення карти пацієнта та інформованої згоди</li>
                                <li>Асептику та антисептику в ін'єкційній практиці</li>
                                <li>Техніки ін'єкцій: вибір підходу залежно від анатомії та віку пацієнта</li>
                                <li>Класифікацію препаратів та інструментів</li>
                                <li>Складання індивідуального протоколу корекції</li>
                                <li>Характеристики препаратів та критерії їх вибору</li>
                                <li>Небезпечні зони, ускладнення та тактика невідкладної допомоги</li>
                            </ul>
                            <div class="flex flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700 mb-6">კურსის ღირებულება:</p>
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
