<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    body.modal-open {
        overflow-x: hidden !important;
        position: fixed;
        width: 100%;
    }
    
    @media (max-width: 767px) {
        #pdfModal {
            padding: 0 !important;
        }
        
        #pdfModal > div {
            width: 100vw !important;
            height: 100vh !important;
            max-width: 100vw !important;
            max-height: 100vh !important;
            border-radius: 0 !important;
        }
        
        #closePdfModalBtn {
            background-color: white !important;
            border: 1px solid #e5e7eb !important;
        }
    }
</style>
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-7xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="container max-w-5xl mx-auto px-4 justify-center items-center">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">Books</h1>
                <p class="text-lg text-gray-700 mb-6 text-center">On this page you can purchase and download books that are useful and informative on various topics related to beauty and health.</p>
            </div>

            <!-- Books -->
            <div id="hero-section" class="flex items-center justify-center mb-6 px-8 py-4 ">
                <img src="{{ asset('storage/images/book-animate-3.jpg') }}" alt="Front cover" id="hero-img" class="w-full h-full object-cover rounded-lg opacity-0">
            </div>

            <div class="flex md:flex-row flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Book</h3>
                        <h2 class="text-2xl font-bold text-gray-700">"Skin for Life"</h2>
                        <p class="text-gray-700">«Skin for Life» is a popular science yet deeply personal book by a dermatologist that turns upside down the common understanding of skincare. It combines evidence-based medicine, personal professional experience, and human stories — all to answer the main question: how to preserve the health and beauty of your skin for years to come?</p>
                        @php
                            $paperBookPriceGEL = config('monobank.paper_book.price_gel', 100);
                            $paperBookPriceUSD = config('monobank.paper_book.price_usd', 35);
                            $ebookPriceGEL = config('monobank.ebook.price_gel', 50);
                            $ebookPriceUSD = config('monobank.ebook.price_usd', 17);
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
                                    <span class="text-3xl font-bold text-gray-800">{{ number_format($paperBookPriceGEL, 0, ',', ' ') }} ₾</span>
                                    <span class="text-lg font-semibold text-gray-600">/ ${{ number_format($paperBookPriceUSD, 0, ',', ' ') }}</span>
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
                                    <span class="text-3xl font-bold text-gray-800">{{ number_format($ebookPriceGEL, 0, ',', ' ') }} ₾</span>
                                    <span class="text-lg font-semibold text-gray-600">/ ${{ number_format($ebookPriceUSD, 0, ',', ' ') }}</span>
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
                        <div class="">
                            <p class="text-gray-700 text-xl font-bold text-center mb-4">Who is this book for?</p>
                            <ul class="list-disc list-inside px-3 gap-2">
                                <li class="mb-2">For patients — to understand their own skin and learn to care for it consciously.</li>
                                <li class="mb-2">For doctors — to see medicine through the patient's eyes, speak more simply, inspire, and build trust.</li>
                                <li class="mb-2">For everyone interested in health — to find answers, support, and inspiration in taking care of themselves.</li>
                            </ul>
                            <div class="flex flex-col md:flex-row gap-4 mt-6">
                                <div class="flex-1 bg-gradient-to-br from-emerald-50 to-green-50 border border-emerald-200 rounded-xl p-4 shadow-sm flex flex-col">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-sm font-medium text-gray-600">Book excerpt</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book text-emerald-600" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                        </svg>
                                    </div>
                                    <div class="flex items-center justify-center mb-4">
                                        <img src="{{ asset('storage/images/book-open.jpg') }}" alt="Open book" class="w-32 h-auto object-cover rounded-lg shadow-md">
                                    </div>
                                    <p class="text-sm text-gray-600 text-center mb-4">Read a book excerpt before purchasing</p>
                                    <button type="button" id="readExcerptDriveBtn" class="mt-auto bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-600 hover:to-green-600 text-white px-4 py-2 rounded-full w-full uppercase font-bold cursor-pointer transition-all">
                                        <div class="flex items-center justify-center gap-2 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                            </svg>
                                            Read excerpt
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pt-4">
                                <a href="{{ route_locale('book.return-policy') }}" class="text-gray-600 hover:text-[#4BAE37] text-sm underline transition-colors text-center">
                                    📘 Book return policy
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex md:flex-row flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4 w-full">
                    <div class="flex flex-col gap-4 w-full">
                        <h3 class="text-xl">Book (English)</h3>
                        <h2 class="text-2xl font-bold text-gray-700">"Skin for Life"</h2>
                        <p class="text-gray-700">The English electronic edition of «Skin for Life» — a popular science book by a dermatologist about skin health and beauty. Available in EPUB and KPF formats.</p>
                        @php
                            $ebookEnPriceGEL = config('monobank.ebook_en.price_gel', config('monobank.ebook.price_gel', 50));
                            $ebookEnPriceUSD = config('monobank.ebook_en.price_usd', config('monobank.ebook.price_usd', 17));
                        @endphp
                        <div class="flex flex-col md:flex-row gap-4 mb-2">
                            <div class="flex-1 bg-gradient-to-br from-indigo-50 to-violet-50 border border-indigo-200 rounded-xl p-4 shadow-sm flex flex-col max-w-md">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-600">E-book version (EPUB + KPF)</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-usb-drive text-indigo-600" viewBox="0 0 16 16">
                                        <path d="M6 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4H6zM7 1v1h1V1zm2 0v1h1V1zM6 5a1 1 0 0 0-1 1v8.5A1.5 1.5 0 0 0 6.5 16h4a1.5 1.5 0 0 0 1.5-1.5V6a1 1 0 0 0-1-1zm0 1h5v8.5a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </div>
                                <div class="flex items-baseline gap-1 mb-4">
                                    <span class="text-3xl font-bold text-gray-800">{{ number_format($ebookEnPriceGEL, 0, ',', ' ') }} ₾</span>
                                    <span class="text-lg font-semibold text-gray-600">/ ${{ number_format($ebookEnPriceUSD, 0, ',', ' ') }}</span>
                                </div>
                                <a href="{{ route_locale('ebook-en-order.create') }}" class="mt-auto">
                                    <button class="bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 text-white px-4 py-2 rounded-full w-full uppercase font-bold cursor-pointer transition-all">
                                        <div class="flex items-center justify-center gap-2 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-usb-drive" viewBox="0 0 16 16">
                                                <path d="M6 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4H6zM7 1v1h1V1zm2 0v1h1V1zM6 5a1 1 0 0 0-1 1v8.5A1.5 1.5 0 0 0 6.5 16h4a1.5 1.5 0 0 0 1.5-1.5V6a1 1 0 0 0-1-1zm0 1h5v8.5a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                            Buy English e-book
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

    <!-- PDF Modal -->
    <div id="pdfModal" class="fixed inset-0 z-999 bg-black bg-opacity-75 items-center justify-center p-10" style="display: none; overflow: hidden; max-width: 100vw; max-height: 100vh; ">
        <div class="relative w-full h-full md:w-auto md:h-auto md:max-w-6xl md:max-h-[90vh] md:rounded-lg bg-white flex flex-col" style="max-width: 100vw; max-height: 100vh;">
            <div class="flex items-center justify-between p-3 md:p-4 border-b border-gray-200 bg-white flex-shrink-0 z-50 relative" style="min-height: 60px; padding-top:50px;">
                <h3 class="text-base md:text-xl font-bold text-gray-800 flex-1">Book excerpt</h3>
                <button type="button" id="closePdfModalBtn" class="text-gray-700 hover:text-gray-900 bg-white border border-gray-300 rounded-full p-2 hover:bg-gray-100 transition-colors flex items-center justify-center shadow-sm" style="min-width: 44px; min-height: 44px; flex-shrink: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 overflow-auto p-2 md:p-4" style="min-height: 0; max-height: calc(100vh - 60px);">
                <iframe id="pdfViewer" src="" class="w-full border-0" style="width: 100%; min-height: calc(100vh - 80px);"></iframe>
            </div>
        </div>
    </div>
   
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
            gsap.registerPlugin(ScrollTrigger);
            const heroImg = document.getElementById("hero-img");
            if (heroImg) {
                gsap.fromTo("#hero-img", 
                    { opacity: 0, scale: 0.3, y: 100, rotation: 0 },
                    { opacity: 1, scale: 1, y: 0, rotation: 0, duration: 1.2, ease: "back.out(1.7)", delay: 0.3 }
                );
            }
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('pdfModal');
        const openDriveBtn = document.getElementById('readExcerptDriveBtn');
        const closeBtn = document.getElementById('closePdfModalBtn');
        const pdfViewer = document.getElementById('pdfViewer');
        
        @php
            $pdfUrl = asset('storage/files/excerpt-book.pdf');
            $googleDriveUrl = 'https://drive.google.com/file/d/10Dn71lhaxrt2D6HW_Y9opE_Ub0_oQ56k/preview';
        @endphp
        const googleDriveUrl = '{{ $googleDriveUrl }}';
        
        function openGoogleDriveModal() {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
            pdfViewer.src = googleDriveUrl;
            setTimeout(function() {
                const header = modal.querySelector('.border-b');
                const headerHeight = header ? header.offsetHeight : 60;
                pdfViewer.style.height = window.innerWidth < 768 ? 'calc(100vh - ' + headerHeight + 'px)' : '600px';
            }, 150);
        }
        
        function closePdfModal() {
            modal.style.display = 'none';
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.width = '';
            pdfViewer.src = '';
        }
        
        if (openDriveBtn) {
            openDriveBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                openGoogleDriveModal();
            });
        }
        
        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); closePdfModal(); });
            closeBtn.addEventListener('touchend', function(e) { e.preventDefault(); e.stopPropagation(); closePdfModal(); });
        }
        
        modal.addEventListener('click', function(e) { if (e.target === modal) { closePdfModal(); } });
        document.addEventListener('keydown', function(e) { if (e.key === 'Escape' && modal.style.display === 'flex') { closePdfModal(); } });
    });
</script>
@endpush
</x-layouts.main>
