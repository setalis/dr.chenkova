<!-- Модальное окно -->
<div id="contactModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Записаться на обучение</h3>
            <form id="contactForm" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Ф.И.О.</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Телефон</label>
                    <input type="tel" name="phone" id="phone" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="messenger" class="block text-sm font-medium text-gray-700">Мессенджер</label>
                    <select name="messenger" id="messenger" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Выберите мессенджер</option>
                        <option value="telegram">Telegram</option>
                        <option value="whatsapp">WhatsApp</option>
                        <option value="viber">Viber</option>
                        <option value="instagram">Instagram</option>
                    </select>
                </div>
                <div id="messengerContactContainer" class="hidden">
                    <label for="messengerContact" class="block text-sm font-medium text-gray-700">Контакт в мессенджере</label>
                    <input type="text" name="messengerContact" id="messengerContact"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Введите ваш контакт">
                </div>
                
                <x-privacy-checkbox />
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Отмена</button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#4BAE37] text-white rounded-md hover:bg-[#3c952a]">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('contactModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('contactModal').classList.add('hidden');
    }

    document.getElementById('messenger').addEventListener('change', function() {
        const container = document.getElementById('messengerContactContainer');
        const input = document.getElementById('messengerContact');
        
        if (this.value) {
            container.classList.remove('hidden');
            input.required = true;
            
            // Устанавливаем плейсхолдер в зависимости от выбранного мессенджера
            switch(this.value) {
                case 'telegram':
                    input.placeholder = '@username';
                    break;
                case 'whatsapp':
                    input.placeholder = '+xxxxxxxxxxxx';
                    break;
                case 'viber':
                    input.placeholder = '+xxxxxxxxxxxx';
                    break;
                case 'instagram':
                    input.placeholder = '@username';
                    break;
            }
        } else {
            container.classList.add('hidden');
            input.required = false;
        }
    });

    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Проверка чекбокса согласия
        const privacyCheckbox = this.querySelector('input[name="privacy_agreement"]');
        if (!privacyCheckbox || !privacyCheckbox.checked) {
            alert('Необходимо согласие на обработку персональных данных.');
            return;
        }
        
        const formData = new FormData(this);
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Отправка...';
        
        try {
            const response = await fetch('{{ route_locale("contact.send") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            const data = await response.json();
            
            if (response.ok) {
                alert('Спасибо! Мы свяжемся с вами в ближайшее время.');
                closeModal();
                this.reset();
            } else {
                console.error('Server error:', data);
                alert('Произошла ошибка: ' + (data.message || 'Пожалуйста, попробуйте позже.'));
            }
        } catch (error) {
            console.error('Network error:', error);
            alert('Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = 'Отправить';
        }
    });
</script> 