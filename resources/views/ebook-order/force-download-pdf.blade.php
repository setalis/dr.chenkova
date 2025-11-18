<x-layouts.main>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="text-center mb-6">
            <div class="mx-auto w-16 h-16 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Подготовка файла...</h1>
            <p class="text-gray-600 dark:text-gray-400">Пожалуйста, подождите, файл готовится к скачиванию.</p>
        </div>

        <div id="download-status" class="text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-4">Инициализация скачивания...</p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route_locale('ebook-order.payment-success') }}" 
               class="inline-block px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 font-medium">
                Вернуться назад
            </a>
        </div>
    </div>

    <script>
        (function() {
            const downloadUrl = @json($downloadUrl);
            const fileName = @json($fileName);
            const statusEl = document.getElementById('download-status');
            
            // Функция для обновления статуса
            function updateStatus(message, isError = false) {
                if (statusEl) {
                    statusEl.innerHTML = '<p class="text-gray-600 dark:text-gray-400 mb-4">' + message + '</p>';
                    if (isError) {
                        statusEl.innerHTML += '<p class="text-red-600 dark:text-red-400 text-sm mt-2">Если скачивание не началось автоматически, попробуйте открыть ссылку в обычном браузере.</p>';
                    }
                }
            }

            // Функция для принудительного скачивания через blob
            async function forceDownload() {
                try {
                    updateStatus('Загрузка файла...');
                    
                    // Загружаем файл через fetch
                    const response = await fetch(downloadUrl, {
                        method: 'GET',
                        credentials: 'include', // Важно для передачи сессии
                    });

                    if (!response.ok) {
                        throw new Error('Ошибка загрузки файла: ' + response.status);
                    }

                    updateStatus('Создание файла для скачивания...');
                    
                    // Получаем blob
                    const blob = await response.blob();
                    
                    // Создаем URL для blob
                    const blobUrl = window.URL.createObjectURL(blob);
                    
                    // Создаем временную ссылку для скачивания
                    const link = document.createElement('a');
                    link.href = blobUrl;
                    link.download = fileName;
                    link.style.display = 'none';
                    
                    // Добавляем в DOM, кликаем и удаляем
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    
                    // Освобождаем память
                    setTimeout(() => {
                        window.URL.revokeObjectURL(blobUrl);
                    }, 100);
                    
                    updateStatus('Файл успешно скачан! Проверьте папку "Загрузки" на вашем устройстве.');
                    
                } catch (error) {
                    console.error('Ошибка при скачивании:', error);
                    updateStatus('Ошибка при скачивании файла. Попробуйте еще раз или откройте ссылку в обычном браузере.', true);
                    
                    // Показываем альтернативную ссылку
                    const fallbackLink = document.createElement('a');
                    fallbackLink.href = downloadUrl;
                    fallbackLink.download = fileName;
                    fallbackLink.className = 'inline-block px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium mt-4';
                    fallbackLink.textContent = 'Скачать файл напрямую';
                    if (statusEl) {
                        statusEl.appendChild(fallbackLink);
                    }
                }
            }

            // Запускаем скачивание сразу после загрузки страницы
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', forceDownload);
            } else {
                forceDownload();
            }
        })();
    </script>
</x-layouts.main>

