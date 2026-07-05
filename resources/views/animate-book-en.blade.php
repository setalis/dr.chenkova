<x-layouts.main>

    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">
        <div class="container max-w-7xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">Books</h1>
                <p class="text-lg text-gray-700 mb-6 text-center">On this page you can purchase and download books that are useful and informative on various topics related to beauty and health.</p>
            </div>

            <!-- Books -->
            <div id="hero-section" class="flex justify-center my-8">
                <img src="{{asset('storage/images/animate-book.png')}}" width="200" id="hero-img" alt="Book" class="max-w-full h-auto opacity-0">
            </div>
            <div class="flex md:flex-row flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Book</h3>
                        <h2 class="text-2xl font-bold text-gray-700">"Skin for Life"</h2>
                        <div class="start-rotate">
                            <p class="text-gray-700">«Skin for Life» is a popular science yet deeply personal book by a dermatologist that turns upside down the common understanding of skincare. It combines evidence-based medicine, personal professional experience, and human stories — all to answer the main question: how to preserve the health and beauty of your skin for years to come?</p>
                        </div>
                        @php
                            $currency = config('monobank.default_currency', 'UAH');
                            $currencySymbol = config("monobank.currencies.{$currency}.symbol", '₴');
                            $paperBookPrice = config('monobank.paper_book.price', 50000) / 100;
                            $ebookPrice = config('monobank.ebook.price', 30000) / 100;
                        @endphp
                        <div class="flex flex-col md:flex-row gap-4 mb-2">
                            <div class="flex-1 bg-gradient-to-br from-cyan-50 to-blue-50 border border-cyan-200 rounded-xl p-4 shadow-sm flex flex-col">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-600">Print version</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book text-cyan-600" viewBox="0 0 16 16">
                                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                    </svg>
                                </div>
                                <div class="flex items-baseline gap-1 mb-4">
                                    <span class="text-3xl font-bold text-gray-800">{{ number_format($paperBookPrice, 0, ',', ' ') }}</span>
                                    <span class="text-lg font-semibold text-gray-600">{{ $currencySymbol }}</span>
                                </div>
                                <a href="{{route_locale('book-order.create')}}" class="mt-auto">
                                    <button class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white px-4 py-2 rounded-full w-full uppercase font-bold cursor-pointer transition-all">
                                        <div class="flex items-center justify-center gap-2 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                            </svg>
                                            Buy print version
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="flex-1 bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-4 shadow-sm flex flex-col">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-600">E-book version</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-usb-drive text-purple-600" viewBox="0 0 16 16">
                                        <path d="M6 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4H6zM7 1v1h1V1zm2 0v1h1V1zM6 5a1 1 0 0 0-1 1v8.5A1.5 1.5 0 0 0 6.5 16h4a1.5 1.5 0 0 0 1.5-1.5V6a1 1 0 0 0-1-1zm0 1h5v8.5a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </div>
                                <div class="flex items-baseline gap-1 mb-4">
                                    <span class="text-3xl font-bold text-gray-800">{{ number_format($ebookPrice, 0, ',', ' ') }}</span>
                                    <span class="text-lg font-semibold text-gray-600">{{ $currencySymbol }}</span>
                                </div>
                                <a href="{{ route_locale('ebook-order.create') }}" class="mt-auto">
                                    <button class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-4 py-2 rounded-full w-full uppercase font-bold cursor-pointer transition-all">
                                        <div class="flex items-center justify-center gap-2 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-usb-drive" viewBox="0 0 16 16">
                                                <path d="M6 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4H6zM7 1v1h1V1zm2 0v1h1V1zM6 5a1 1 0 0 0-1 1v8.5A1.5 1.5 0 0 0 6.5 16h4a1.5 1.5 0 0 0 1.5-1.5V6a1 1 0 0 0-1-1zm0 1h5v8.5a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                            Buy e-book
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>                        
                    </div>                    
                </div>                 
            </div>            
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") return;
                gsap.registerPlugin(ScrollTrigger);
                const heroImg = document.getElementById("hero-img");
                if (!heroImg) return;
                gsap.fromTo("#hero-img", 
                    { opacity: 0, scale: 0.3, y: 100, rotation: -10 },
                    { opacity: 1, scale: 1, y: 0, rotation: 0, duration: 1.2, ease: "back.out(1.7)", delay: 0.3 }
                );
                gsap.to("#hero-img", {
                    scrollTrigger: { trigger: "#hero-section", start: "top 60%", end: "bottom 20%", scrub: 1.5, markers: false },
                    rotation: 15,
                    ease: "power1.inOut"
                });
                heroImg.addEventListener("mouseenter", () => gsap.to("#hero-img", { scale: 1.05, rotation: 5, duration: 0.3, ease: "power2.out" }));
                heroImg.addEventListener("mouseleave", () => gsap.to("#hero-img", { scale: 1, rotation: 0, duration: 0.3, ease: "power2.out" }));
            });
        </script>
    @endpush

</x-layouts.main>
