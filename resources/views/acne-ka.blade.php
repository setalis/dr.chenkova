<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-4 bg-white rounded-2xl py-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">აკნეს შესახებ</h1>
                <p class="text-lg text-gray-700 mb-6">სპეციალურად მათთვის, ვინც იბრძვის აკნესთან, შევქმენი ტელეგრამ-არხი, სადაც ვიზიარებ პროფესიონალურ რეკომენდაციებს, დადასტურებულ მეთოდებსა და სასარგებლო რჩევებს კანის მოვლის შესახებ. </p>
            </div>

            <!-- Слайдер -->
            <div class="container max-w-5xl mx-auto px-4 py-6 justify-center items-center relative md:mb-6">
                <div class="swiper-button-next !hidden md:!block absolute -right-12 top-1/2 -translate-y-1/2 !z-50 !-me-8 !mt-1 !text-gray-700"></div>
                <div class="swiper-button-prev !hidden md:!block absolute -left-12 top-1/2 -translate-y-1/2 !z-50 !-ms-8 !mt-1 !text-gray-700"></div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Item 1 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="აკნე მანამდე და შემდეგ">
                        </div>
                        <!-- Item 2 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-2.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="აკნე მანამდე და შემდეგ">
                        </div>
                        <!-- Item 3 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-3.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="აკნე მანამდე და შემდეგ">
                        </div>
                        <!-- Item 4 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-4.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="აკნე მანამდე და შემდეგ">
                        </div>
                        <!-- Item 5 -->
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-5.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="აკნე მანამდე და შემდეგ">
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination !hidden md:!block"></div> -->
                </div>
            </div>
            <!-- Слайдер -->    

            <!-- Текст -->
            <div class="container max-w-5xl h-full mx-auto px-4 pt-6 justify-center items-center">
                <p class="text-lg text-gray-700 mb-6">დღეს მსოფლიო სტატისტიკა - 84% ადამიანი ამა თუ იმ ხარისხით აწყდება აკნეს. 
                    ჩემი დიდი მიზანი პროფესიონალურ ცხოვრებაში - დავეხმარო რაც შეიძლება მეტ პაციენტს და ვუთხრა დაავადების შესახებ ყველაფერი და ხელმისაწვდომი ენით. და რა თქმა უნდა, დავამტკიცო, რომ შესაძლებელია ლამაზი კანი გამონაყარების გარეშე
                </p>
            
                <!-- Текст -->
                <a href="https://t.me/acne_channel" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">გამოწერა</button></a>
                <div class="flex justify-center items-center mb-6">
                    <h4 class="text-xl text-center font-bold text-gray-700">შემოუერთდით — გახდით გზა სუფთა კანისკენ გასაგები და ეფექტური</h4>    
                </div>
            </div>       
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 
    @endpush
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        });
    </script>
</x-layouts.main>

