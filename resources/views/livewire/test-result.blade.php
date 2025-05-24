<div class="max-w-5xl mx-auto p-6 space-y-6 mt-16 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold">Ваш тип кожи</h2>

    <div class="text-4xl font-semibold text-center text-indigo-700">
        {{ $resultCode }}
    </div>

    <div class="text-sm text-gray-600">
        <p>D / O — Сухая или жирная</p>
        <p>S / R — Чувствительная или резистентная</p>
        <p>N / P — Непигментированная или пигментированная</p>
        <p>T / W — Упругая или морщинистая</p>
    </div>

    <div class="mt-8">
        <form wire:submit.prevent="sendEmail" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email для получения результатов</label>
                <input type="email" id="email" wire:model.defer="email" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="Ваш email" required>
            </div>

            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Отправить результаты
            </button>
        </form>
    </div>

    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>

