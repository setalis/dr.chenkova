<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Предотвращение горизонтальной прокрутки при открытом модальном окне */
    body.modal-open {
        overflow-x: hidden !important;
        position: fixed;
        width: 100%;
    }
    
    /* Модальное окно на мобильных */
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
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-6">Книги</h1>
                <p class="text-lg text-gray-700 mb-6 text-center">На странице можно купить и скачать книги, которые полезны и информативны в различных вопросах, связанных с красотой и здоровьем.</p>
            </div>

            

            <!-- Книги -->
            <div id="hero-section" class="flex items-center justify-center mb-6 px-8 py-4 ">
                <img src="{{ asset('storage/images/book-animate-3.jpg') }}" alt="Front cover" id="hero-img" class="w-full h-full object-cover rounded-lg opacity-0">
            </div>

            <div class="flex md:flex-row flex-col gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-8 border border-gray-300 rounded-lg p-4">
                    <!-- <div class="flex items-center justify-center md:w-[300px] md:h-auto">
                        <img src="{{ asset('storage/images/book-1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Акне до и после">
                    </div> -->
                    
                    <div class="flex flex-col gap-4">                        
                        <h3 class="text-xl">Книга</h2>
                        <h2 class="text-2xl font-bold text-gray-700">"Кожа на всю жизнь"</h2>
                        <p class="text-gray-700">«Кожа на всю жизнь» — это научно-популярная и одновременно глубоко личная книга врача-дерматолога, которая переворачивает представление об уходе за кожей. В ней сочетаются доказательная медицина, личный профессиональный опыт и человеческие истории — все для того, чтобы ответить на главный вопрос: как сохранить здоровье и красоту кожи на долгие годы?</p>
                        @php
                            $currency = config('monobank.default_currency', 'UAH');
                            $currencySymbol = config("monobank.currencies.{$currency}.symbol", '₴');
                            $paperBookPrice = config('monobank.paper_book.price', 50000) / 100;
                            $ebookPrice = config('monobank.ebook.price', 30000) / 100;
                        @endphp
                        <div class="flex flex-col md:flex-row gap-4 mb-2">
                            <div class="flex-1 bg-gradient-to-br from-cyan-50 to-blue-50 border border-cyan-200 rounded-xl p-4 shadow-sm flex flex-col">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-600">Печатная версия</span>
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
                                            Купить печатную
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="flex-1 bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-4 shadow-sm flex flex-col">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-600">Электронная версия</span>
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
                                            Купить электронную
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-gray-700 text-xl font-bold text-center mb-4">ДЛЯ КОГО ЭТА КНИГА?</p>
                            <ul class="list-disc list-inside px-3 gap-2">
                                <li class="mb-2">Для пациентов — чтобы понять свою кожу и научиться заботиться о ней осознанно.</li>
                                <li class="mb-2">Для врачей — чтобы увидеть медицину глазами пациента, говорить проще, вдохновлять и укреплять доверие.</li>
                                <li class="mb-2">Для всех, кто интересуется здоровьем — чтобы найти ответы, поддержку и вдохновение в заботе о себе.</li>
                            </ul>
                            <div class="flex flex-col md:flex-row gap-4 mt-6">
                                <div class="flex-1 bg-gradient-to-br from-emerald-50 to-green-50 border border-emerald-200 rounded-xl p-4 shadow-sm flex flex-col">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-sm font-medium text-gray-600">Отрывок из книги</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book text-emerald-600" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                        </svg>
                                    </div>
                                    <div class="flex items-center justify-center mb-4">
                                        <img src="{{ asset('storage/images/book-open.png') }}" alt="Раскрытая книга" class="w-72 h-auto object-cover">
                                    </div>
                                    <p class="text-sm text-gray-600 text-center mb-4">Ознакомьтесь с отрывком из книги перед покупкой</p>
                                    <button type="button" id="readExcerptDriveBtn" class="mt-auto bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-600 hover:to-green-600 text-white px-4 py-2 rounded-full w-full uppercase font-bold cursor-pointer transition-all">
                                        <div class="flex items-center justify-center gap-2 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                            </svg>
                                            Прочитать отрывок
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pt-4">
                                <a href="{{ route_locale('book.return-policy') }}" class="text-gray-600 hover:text-[#4BAE37] text-sm underline transition-colors text-center">
                                    📘 Условия возврата книги
                                </a>
                        </div>                        
                    </div>                    
                </div>                 
            </div>  
        </div>
    </div>

    <!-- Модальное окно для просмотра PDF -->
    <div id="pdfModal" class="fixed inset-0 z-999 bg-black bg-opacity-75 items-center justify-center p-10" style="display: none; overflow: hidden; max-width: 100vw; max-height: 100vh; ">
        <div class="relative w-full h-full md:w-auto md:h-auto md:max-w-6xl md:max-h-[90vh] md:rounded-lg bg-white flex flex-col" style="max-width: 100vw; max-height: 100vh;">
            <!-- Заголовок модального окна -->
            <div class="flex items-center justify-between p-3 md:p-4 border-b border-gray-200 bg-white flex-shrink-0 z-50 relative" style="min-height: 60px; padding-top:50px;">
                <h3 class="text-base md:text-xl font-bold text-gray-800 flex-1">Отрывок из книги</h3>
                <button type="button" id="closePdfModalBtn" class="text-gray-700 hover:text-gray-900 bg-white border border-gray-300 rounded-full p-2 hover:bg-gray-100 transition-colors flex items-center justify-center shadow-sm" style="min-width: 44px; min-height: 44px; flex-shrink: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </button>
            </div>
            <!-- Контейнер для PDF -->
            <div class="flex-1 overflow-auto p-2 md:p-4" style="min-height: 0; max-height: calc(100vh - 60px);">
                <iframe id="pdfViewer" src="" class="w-full border-0" style="width: 100%; min-height: calc(100vh - 80px);"></iframe>
            </div>
        </div>
    </div>
   
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script>
    // Анимация появления книги
    document.addEventListener("DOMContentLoaded", () => {
        if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
            gsap.registerPlugin(ScrollTrigger);

            const heroImg = document.getElementById("hero-img");
            
            if (heroImg) {
                // Анимация появления книги при загрузке страницы
                gsap.fromTo("#hero-img", 
                    {
                        opacity: 0,
                        scale: 0.3,
                        y: 100,
                        rotation: 0
                    },
                    {
                        opacity: 1,
                        scale: 1,
                        y: 0,
                        rotation: 0,
                        duration: 1.2,
                        ease: "back.out(1.7)",
                        delay: 0.3
                    }
                );

                // Анимация вращения при скролле
                // gsap.to("#hero-img", {
                //     scrollTrigger: {
                //         trigger: "#hero-section",
                //         start: "top 60%",
                //         end: "bottom 20%",
                //         scrub: 1,
                //         markers: false
                //     },
                //     rotation: 15,
                //     ease: "power1.inOut"
                // });

                // Дополнительная анимация: легкое покачивание при наведении
                // heroImg.addEventListener("mouseenter", () => {
                //     gsap.to("#hero-img", {
                //         scale: 1.05,
                //         rotation: 5,
                //         duration: 0.3,
                //         ease: "power2.out"
                //     });
                // });

                // heroImg.addEventListener("mouseleave", () => {
                //     gsap.to("#hero-img", {
                //         scale: 1,
                //         rotation: 0,
                //         duration: 0.3,
                //         ease: "power2.out"
                //     });
                // });
            }
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('pdfModal');
        const openBtn = document.getElementById('readExcerptBtn');
        const openDriveBtn = document.getElementById('readExcerptDriveBtn');
        const closeBtn = document.getElementById('closePdfModalBtn');
        const pdfViewer = document.getElementById('pdfViewer');
        
        @php
            $pdfUrl = asset('storage/files/excerpt-book.pdf');
            $googleDriveUrl = 'https://drive.google.com/file/d/10Dn71lhaxrt2D6HW_Y9opE_Ub0_oQ56k/preview';
        @endphp
        const pdfUrl = '{{ $pdfUrl }}';
        const googleDriveUrl = '{{ $googleDriveUrl }}';
        
        // Функция открытия модального окна с локальным PDF
        function openPdfModal() {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
            
            // Загружаем локальный PDF
            pdfViewer.src = pdfUrl + '#toolbar=1&navpanes=0&scrollbar=1';
            
            // Устанавливаем размер iframe
            setTimeout(function() {
                const header = modal.querySelector('.border-b');
                const headerHeight = header ? header.offsetHeight : 60;
                const isMobile = window.innerWidth < 768;
                if (isMobile) {
                    pdfViewer.style.height = 'calc(100vh - ' + headerHeight + 'px)';
                } else {
                    pdfViewer.style.height = '600px';
                }
            }, 150);
        }
        
        // Функция открытия модального окна с Google Drive PDF
        function openGoogleDriveModal() {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
            
            // Загружаем PDF из Google Drive
            pdfViewer.src = googleDriveUrl;
            
            // Устанавливаем размер iframe
            setTimeout(function() {
                const header = modal.querySelector('.border-b');
                const headerHeight = header ? header.offsetHeight : 60;
                const isMobile = window.innerWidth < 768;
                if (isMobile) {
                    pdfViewer.style.height = 'calc(100vh - ' + headerHeight + 'px)';
                } else {
                    pdfViewer.style.height = '600px';
                }
            }, 150);
        }
        
        // Функция закрытия модального окна
        function closePdfModal() {
            modal.style.display = 'none';
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.width = '';
            pdfViewer.src = '';
        }
        
        // Открытие модального окна с локальным PDF
        if (openBtn) {
            openBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                openPdfModal();
            });
        }
        
        // Открытие модального окна с Google Drive PDF
        if (openDriveBtn) {
            openDriveBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                openGoogleDriveModal();
            });
        }
        
        // Закрытие через кнопку X
        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closePdfModal();
            });
            
            // Touch события для мобильных
            closeBtn.addEventListener('touchend', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closePdfModal();
            });
        }
        
        // Закрытие при клике на фон
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closePdfModal();
            }
        });
        
        // Закрытие по Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.style.display === 'flex') {
                closePdfModal();
            }
        });
        
        // Адаптация при изменении размера окна
        function adjustSize() {
            if (modal.style.display === 'flex') {
                const header = modal.querySelector('.border-b');
                const headerHeight = header ? header.offsetHeight : 60;
                const isMobile = window.innerWidth < 768;
                if (isMobile) {
                    pdfViewer.style.height = 'calc(100vh - ' + headerHeight + 'px)';
                } else {
                    pdfViewer.style.height = '600px';
                }
            }
        }
        
        window.addEventListener('resize', adjustSize);
        window.addEventListener('orientationchange', function() {
            setTimeout(adjustSize, 200);
        });
    });
</script>
@endpush
</x-layouts.main>
