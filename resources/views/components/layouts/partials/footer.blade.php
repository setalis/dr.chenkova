<footer>
    <div class="container mx-auto px-4 py-3">
        <!-- Ссылки на страницы -->
        <div class="flex flex-wrap justify-center gap-4 mb-4 text-sm">
            <a href="{{ route_locale('contact') }}" class="text-gray-600 hover:text-gray-900 transition-all">
                {{ app()->getLocale() === 'uk' ? 'Контакти' : (app()->getLocale() === 'ka' ? 'კონტაქტები' : 'Контакты') }}
            </a>
            <span class="text-gray-400">|</span>
            <a href="{{ route_locale('privacy-policy') }}" class="text-gray-600 hover:text-gray-900 transition-all">
                {{ app()->getLocale() === 'uk' ? 'Політика конфіденційності' : (app()->getLocale() === 'ka' ? 'კონფიდენციალურობის პოლიტიკა' : 'Политика конфиденциальности') }}
            </a>
            <span class="text-gray-400">|</span>
            <a href="{{ route_locale('legal-info') }}" class="text-gray-600 hover:text-gray-900 transition-all">
                {{ app()->getLocale() === 'uk' ? 'Умови обміну та повернення' : (app()->getLocale() === 'ka' ? 'გაცვლისა და დაბრუნების პირობები' : 'Условия обмена и возврата') }}
            </a>
        </div>
        
        <!-- Основной контент футера -->
        <div class="flex justify-between items-center pb-4">
            <div class="text-gray-600 font-bold">
                <span class="text-teal-600">Dr.</span>Chenkova
            </div>
            <div class="text-gray-600 hidden md:block">
                2025 All Right Reserved
            </div>
            <div class="flex md:flex items-center space-x-4 text-gray-900">
            <a href="tel:+995555954169" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <svg class="w-5 h-5" fill="#214992" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
            </a>
            <a href="https://t.me/Alina_Chenkova" target="_blank" rel="noopener noreferrer" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#28a8e9" class="bi bi-telegram" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09"/>
                  </svg>
            </a>
            <a href="https://www.instagram.com/dr.chenkova/" target="_blank" rel="noopener noreferrer" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all bg-linear-65 from-purple-500 to-pink-500 bg-clip-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="oklch(0.656 0.241 354.308)" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                  </svg>
            </a>
            <a href="https://www.tiktok.com/@dr.chenkova" target="_blank" rel="noopener noreferrer" class=" text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                </svg>
            </a>    
            <a href="https://youtube.com/@dr.chenkova?si=n4TcVS0-4BPmIkj_" target="_blank" rel="noopener noreferrer" class="md:hidden text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <svg class="w-5 h-5" fill="rgb(255 0 51)" viewBox="0 0 24 24">
                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                </svg>
            </a>
                                
        </div>
        <div class="icon_youtube hidden md:flex">
            <a href="https://youtube.com/@dr.chenkova?si=n4TcVS0-4BPmIkj_" target="_blank" rel="noopener noreferrer" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <img src="{{ asset('storage/images/logos_youtube.svg') }}" alt="Youtube" class="h-5">
            </a>
        </div>
    </div>
</footer>