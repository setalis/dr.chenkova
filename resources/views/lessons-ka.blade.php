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
                                <li>ბოტულინის ნეიროპროტეინის მახასიათებლები სხვადასხვა სავაჭრო ნიშნებში. რა განასხვავებს მათ, რომელია უკეთესი?</li>
                                <li>სახის მიმიკური კუნთების ბიომექანიკა.</li>
                                <li>ინდივიდუალური პროტოკოლის შექმნა თითოეული პაციენტისთვის. გავდივართ სტანდარტული წერტილებიდან.
                                </li>
                                <li>ძირითადი ტექნიკების ანალიზი.</li>
                                <li>მოდელებზე პრაქტიკა.</li>
                            </ul>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700">კურსის ღირებულება:</p>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer">
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
                                <li>სახის ანატომია და მორფოლოგია: შრეობრივი სტრუქტურა, ინერვაცია და სისხლმომარაგება</li>
                                <li>ასაკობრივი ინვოლუციური ცვლილებები</li>
                                <li>კონტურული პლასტიკის ჩვენებები და უკუჩვენებები</li>
                                <li>პაციენტის ბარათის და ინფორმირებული თანხმობის შევსება</li>
                                <li>ასეპტიკა და ანტისეპტიკა ინექციურ პრაქტიკაში</li>
                                <li>ინექციის ტექნიკები: მიდგომის არჩევანი პაციენტის ანატომიისა და ასაკის მიხედვით</li>
                                <li>პრეპარატებისა და ინსტრუმენტების კლასიფიკაცია</li>
                                <li>ინდივიდუალური კორექციის პროტოკოლის შედგენა</li>
                                <li>პრეპარატების მახასიათებლები და მათი არჩევის კრიტერიუმები</li>
                                <li>საშიში ზონები, გართულებები და გადაუდებელი დახმარების ტაქტიკა</li>
                            </ul>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <p class="text-lg font-bold text-gray-700">კურსის ღირებულება:</p>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer">
                                    $1500
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="break-inside-avoid mb-8">
                    <div class="bg-white rounded-lg p-6 shadow-sm text-gray-700">
                        <img src="{{ asset('storage/images/lessons-3.jpg') }}" class="w-full h-auto object-cover rounded-lg mb-6" alt="Урок 2">
                        <div class="md:px-10 px-2">
                            <h1 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">PLA — კოლაგენის დაკარგვის მექანიზმის დიაგნოსტიკის პრიზმით</h1>
                            <p class="text-lg text-gray-700 mb-6">ამ კურსში თქვენ შეიტყობთ:</p>
                            <ul class="list-disc list-inside text-base text-gray-700 mb-6">
                                <li>დაბერების ფიზიოლოგია</li>
                                <li>დაბერების ეპიგენეტიკა</li>
                                <li>დიაგნოზი</li>
                                <li>რა არის პოლირძმჟავა</li>
                                <li>PLA-ს კლასიფიკაცია და მოქმედების მექანიზმი</li>
                                <li>სამუშაო პროტოკოლები სხვადასხვა ფორმებთან (სპეც. პროტოკოლები სხვადასხვა მწარმოებლების მიხედვით)</li>
                                <li>გართულებები</li>
                            </ul>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <div class="flex flex-col md:items-start items-center text-center md:text-left">
                                    <p class="text-lg font-bold text-gray-700">1 დღის ღირებულება:</p>
                                    <p class="text-base font-normal text-gray-700 md:mb-6 mb-3">თეორია + პრაქტიკა (1 მოდელი)</p>
                                </div>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">
                                    $1300
                                </button>
                            </div>
                            <div class="flex flex-col md:flex-row justify-start items-center mb-6 gap-4">
                                <div class="flex flex-col md:items-start items-center md:text-left text-center">
                                    <p class="text-lg font-bold text-gray-700 mb-3">ღირებულება 2 დღისთვის:</p>
                                    <p class="text-base font-normal text-gray-700 mb-1">1 დღე - თეორია + კანულის ხელის დადგმა</p>
                                    <p class="text-base font-normal text-gray-700 mb-6">2 დღე - პრაქტიკა 3-4 მოდელზე</p>
                                </div>
                                <button onclick="openModal()" class="bg-[#4BAE37] hover:bg-[#3c952a] text-white text-2xl px-16 py-3 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">
                                    $2500
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
