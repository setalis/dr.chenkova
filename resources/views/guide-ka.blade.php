<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">გაიდები</h1>
                <p class="text-lg text-gray-700 mb-6">გვერდზე შეგიძლიათ ჩამოტვირთოთ უფასო გაიდები, რომლებიც სასარგებლო და ინფორმატიულია სილამაზესა და ჯანმრთელობასთან დაკავშირებულ სხვადასხვა საკითხებში.</p>
            </div>

            <!-- Гайды -->

            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Гайд про білки">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">გაიდი 1</h2>
                        <h2 class="text-2xl font-bold text-gray-700">ყველაფერი, რაც უნდა იცოდეთ ცილების შესახებ</h2>
                        <p class="text-gray-700">ამ გაიდში გაიგებთ ყველაფერს, რაც უნდა იცოდეთ ცილების, მათი ფუნქციებისა და როგორ მოქმედებენ ისინი თქვენს ჯანმრთელობასა და სილამაზეზე.</p>
                        <a href="{{asset('storage/guide-protein.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">ჩამოტვირთვა</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[300px] md:h-auto p-5">
                        <img src="{{ asset('storage/images/guide-2.jpg') }}" class="w-full h-full object-cover rounded-full" alt="Гайд про активи">
                    </div>
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">გაიდი 2</h2>
                        <h2 class="text-2xl font-bold text-gray-700">აქტივები მოვლაში: როგორ გავიგოთ რა მუშაობს.</h2>
                        <p class="text-gray-700">ამ გაიდში გაიგებთ "აქტივების" შესახებ - მოქმედ მოლეკულებს, რომლებიც ნამდვილად მოქმედებენ კანზე</p>
                        <a href="{{asset('storage/guide-active.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">ჩამოტვირთვა</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-3.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">გაიდი 3</h2>
                        <h2 class="text-2xl font-bold text-gray-700">ჭამე, იძინე, იარე</h2>
                        <p class="text-gray-700">სამი ძირითადი ინსტრუმენტი, საიდანაც იწყება ჯანმრთელობა და ლამაზი კანი</p>
                        <a href="{{asset('storage/guide_eat_sleep_walk.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">ჩამოტვირთვა</button></a>
                    </div>
                    
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-4.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">გაიდი 4</h2>
                        <h2 class="text-2xl font-bold text-gray-700">რკინის დეფიციტი</h2>
                        <p class="text-gray-700">ანალიზებიდან აღდგენამდე</p>
                        <a href="{{asset('storage/guide_iron.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">ჩამოტვირთვა</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-5.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">გაიდი 5</h2>
                        <h2 class="text-2xl font-bold text-gray-700">როზაცეა</h2>
                        <p class="text-gray-700">როდესაც წითლობა — ეს არ არის მხოლოდ რეაქცია ღვინოზე ან სირცხვილზე</p>
                        <a href="{{asset('storage/guide_rosacea_diary.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">ჩამოტვირთვა</button></a>
                    </div>
                </div> 
            </div>
            <div class="flex flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center justify-center md:w-[250px] md:h-auto">
                        <img src="{{ asset('storage/images/guide-6.jpg') }}" class="w-[250px] h-auto object-cover rounded-full" alt="Акне до и после">
                    </div>
                    <div class="flex flex-col justify-center gap-4">                        
                        <h3 class="text-xl">გაიდი 6</h2>
                        <h2 class="text-2xl font-bold text-gray-700">გაიდი აკნეის მქონე პაციენტებისთვის</h2>
                        <p class="text-gray-700">მარტივი ნაბიჯები ჯანსაღი კანისა და კვებისკენ. იყავით ჯანმრთელები, ლამაზები და ენერგიით სავსე</p>
                        <a href="{{asset('storage/guide_acne_patient.pdf')}}" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md block uppercase font-bold cursor-pointer mb-6">ჩამოტვირთვა</button></a>
                    </div>
                </div> 
            </div>
            
            <!-- Гайды -->    


        </div>
    </div>
   
</x-layouts.main>
