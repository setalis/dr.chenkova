<header class="w-full px-4 md:px-10 py-4 absolute top-0 left-0 right-0 z-99 bg-white/50 backdrop-blur-sm md:bg-transparent md:backdrop-blur-none">
    <!-- Десктопная версия -->
    <nav class="hidden md:flex items-center justify-between">
        <div class="logo">
            <a href="{{ route_locale('home') }}" class="text-xl font-semibold text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)]"><span class="text-teal-600">Dr.</span>Chenkova</a>
        </div>
        <div class="flex items-center space-x-8 uppercase text-xs">
            <a href="{{ route_locale('home') }}" class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">{{ app()->getLocale() === 'uk' ? 'Головна' : 'Главная' }}</a>
            <div class="relative group">
            <a class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all flex items-center uppercase cursor-pointer">
                    {{ app()->getLocale() === 'uk' ? 'Лікарям' : 'Докторам' }}
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            
                <!-- <button class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all flex items-center uppercase cursor-pointer">
                    {{ app()->getLocale() === 'uk' ? 'Лікарям' : 'Докторам' }}
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button> -->
                <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="py-1">
                        <a href="{{ route_locale('lessons') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ app()->getLocale() === 'uk' ? 'Навчання' : 'Обучение' }}</a>
                        <a href="{{ route_locale('webinar') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ app()->getLocale() === 'uk' ? 'Записи вебінарів' : 'Запись вебинаров' }}</a>
                    </div>
                </div>
            </div>            
            <a href="{{ route_locale('acne') }}" class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">{{ app()->getLocale() === 'uk' ? 'Про акне' : 'Об акне' }}</a>
            <a href="{{ route_locale('about') }}" class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">{{ app()->getLocale() === 'uk' ? 'Про мене' : 'Обо мне' }}</a>
            <a href="{{ route_locale('guide') }}" class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">{{ app()->getLocale() === 'uk' ? 'Гайди' : 'Гайды' }}</a>
            <a href="{{ route_locale('book') }}" class="text-gray-900 hover:text-gray-900 font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">{{ app()->getLocale() === 'uk' ? 'Книга' : 'Книга' }}</a>
        </div>
        <div class="flex items-center space-x-4 text-gray-900">
            <!-- Переключатель языка -->
            <x-language-switcher />
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
        </div>
        <div class="icon_youtube hidden md:flex">
            <a href="https://youtube.com/@dr.chenkova?si=n4TcVS0-4BPmIkj_" target="_blank" rel="noopener noreferrer" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <img src="{{ asset('storage/images/logos_youtube.svg') }}" alt="Youtube" class="h-5">
            </a>
        </div>
    </nav>

    <!-- Мобильная версия - две строки -->
    <div class="md:hidden">
        <!-- Первая строка: Логотип, Локаль, Меню -->
        <nav class="flex items-center justify-between mb-3">
            <div class="logo">
                <a href="{{ route_locale('home') }}" class="text-xl font-semibold text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)]"><span class="text-teal-600">Dr.</span>Chenkova</a>
            </div>
            <div class="flex items-center space-x-3">
                <!-- Переключатель языка -->
                <x-language-switcher />
                <!-- Mobile Menu Button -->
                <button
                    class="text-gray-600 hover:text-gray-900 focus:outline-none" 
                    type="button"
                    data-drawer-target="drawer-right-example" 
                    data-drawer-show="drawer-right-example" 
                    data-drawer-placement="right" 
                    aria-controls="drawer-right-example"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        
        <!-- Вторая строка: Иконки соцсетей -->
        <div class="flex items-center justify-center space-x-4 text-gray-900">
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
            <a href="https://youtube.com/@dr.chenkova?si=n4TcVS0-4BPmIkj_" target="_blank" rel="noopener noreferrer" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <svg class="w-5 h-5" fill="rgb(255 0 51)" viewBox="0 0 24 24">
                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                </svg>
            </a>
            <a href="https://www.tiktok.com/@dr.chenkova" target="_blank" rel="noopener noreferrer" class="text-gray-900 hover:text-gray-900 drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] hover:drop-shadow-[0_0_25px_rgba(255,255,255,1)] transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Mobile Menu (Drawer) -->
        <div
            id="drawer-right-example"
            class="fixed top-0 right-0 z-[100] h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800 bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% border-b border-gray-200"
            tabindex="-1"
            aria-labelledby="drawer-right-label"
            data-drawer-backdrop="true"
            role="dialog"
            aria-modal="true"
            aria-hidden="true">
        <div class="p-4">
            <h5
                id="drawer-right-label"
                class="inline-flex items-center text-xl font-semibold text-gray-600"
            >
                Dr.Chenkova
            </h5>
            <button
                type="button"
                data-drawer-hide="drawer-right-example"
                aria-controls="drawer-right-example"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center"
                aria-label="{{ app()->getLocale() === 'uk' ? 'Закрити меню' : 'Закрыть меню' }}"
            >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>

            <div class="flex flex-col space-y-4 mt-8">
                <div class="relative">
                    <button class="text-gray-600 hover:text-gray-900 text-lg flex items-center justify-between w-full" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        {{ app()->getLocale() === 'uk' ? 'Лікарям' : 'Докторам' }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden pl-4 space-y-2 mt-2">
                        <a href="{{ route_locale('lessons') }}" class="block text-gray-600 hover:text-gray-900">{{ app()->getLocale() === 'uk' ? 'Навчання' : 'Обучение' }}</a>
                        <a href="{{ route_locale('webinar') }}" class="block text-gray-600 hover:text-gray-900">{{ app()->getLocale() === 'uk' ? 'Записи вебінарів' : 'Запись вебинаров' }}</a>
                    </div>
                </div>                
                <a href="{{ route_locale('about') }}" class="text-gray-600 hover:text-gray-900 text-lg">{{ app()->getLocale() === 'uk' ? 'Про мене' : 'Обо мне' }}</a>
                <a href="{{ route_locale('acne') }}" class="text-gray-600 hover:text-gray-900 text-lg">{{ app()->getLocale() === 'uk' ? 'Про акне' : 'Об акне' }}</a>
                <a href="{{ route_locale('guide') }}" class="text-gray-600 hover:text-gray-900 text-lg">{{ app()->getLocale() === 'uk' ? 'Гайди' : 'Гайды' }}</a>
                <a href="{{ route_locale('book') }}" class="text-gray-600 hover:text-gray-900 text-lg">{{ app()->getLocale() === 'uk' ? 'Книга' : 'Книга' }}</a>
                
                <div class="pt-4 flex flex-col space-y-4 border-t">
                    <a href="tel:+995555954169" class="text-gray-600 hover:text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                        {{ app()->getLocale() === 'uk' ? 'Зателефонувати' : 'Позвонить' }}
                    </a>
                    <a href="https://t.me/Alina_Chenkova" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        {{ app()->getLocale() === 'uk' ? 'Написати в Telegram' : 'Написать в Telegram' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>