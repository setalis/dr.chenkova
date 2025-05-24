<div class="space-y-6">
    <div>
        <label class="font-semibold">1. Если я умоюсь утром и не использую крем, как будет ощущаться моя кожа к обеду?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.1" value="1"> А - Стянутая, сухая</label><br>
            <label><input type="radio" wire:model="answers.1" value="2"> Б - Комфортная, немного сухая</label><br>
            <label><input type="radio" wire:model="answers.1" value="3"> В - Комфортная, немного жирная</label><br>
            <label><input type="radio" wire:model="answers.1" value="4"> Г - Очень жирная</label>
        </div>
    </div>

    <div>
        <label class="font-semibold">2. Какая кожа у вас на ощупь без крема?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.2" value="1"> А - Шершаво-сухая</label><br>
            <label><input type="radio" wire:model="answers.2" value="2"> Б - Мягкая, немного сухая</label><br>
            <label><input type="radio" wire:model="answers.2" value="3"> В - Мягкая, немного жирная</label><br>
            <label><input type="radio" wire:model="answers.2" value="4"> Г - Скользко-жирная</label>
        </div>
    </div>

    {{-- Добавь остальные вопросы по аналогии --}}
</div>
