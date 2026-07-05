<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-4 bg-white rounded-2xl py-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">About Acne</h1>
                <p class="text-lg text-gray-700 mb-6">Especially for those struggling with acne, I created a Telegram channel where I share professional recommendations, evidence-based methods, and helpful tips for skin care.</p>
            </div>

            <!-- Slider -->
            <div class="container max-w-5xl mx-auto px-4 py-6 justify-center items-center relative md:mb-6">
                <div class="swiper-button-next !hidden md:!block absolute -right-12 top-1/2 -translate-y-1/2 !z-50 !-me-8 !mt-1 !text-gray-700"></div>
                <div class="swiper-button-prev !hidden md:!block absolute -left-12 top-1/2 -translate-y-1/2 !z-50 !-ms-8 !mt-1 !text-gray-700"></div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Acne before and after">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-2.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Acne before and after">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-3.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Acne before and after">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-4.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Acne before and after">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/acne/slider-5.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Acne before and after">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text -->
            <div class="container max-w-5xl h-full mx-auto px-4 pt-6 justify-center items-center">
                <p class="text-lg text-gray-700 mb-6">Today's global statistics — 84% of people experience acne to some degree.
                    My great professional goal is to help as many patients as possible, to tell them everything about the condition in accessible language. And of course, to prove that clear skin without breakouts is absolutely achievable.
                </p>
            
                <a href="https://t.me/acne_stop_chenkova" target="_blank"><button class="bg-[#4BAE37] hover:bg-[#3c952a] text-white px-4 py-2 rounded-md mx-auto block uppercase font-bold cursor-pointer mb-6">Subscribe</button></a>
                <div class="flex justify-center items-center mb-6">
                    <h4 class="text-xl text-center font-bold text-gray-700">Join — make the path to clear skin clear and effective</h4>    
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
