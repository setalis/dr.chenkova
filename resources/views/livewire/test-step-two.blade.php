<div class="space-y-6">
    <div>
        <label class="font-semibold">1. Как часто вы замечаете покраснение кожи (временами или постоянно)?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.1" value="4"> А - Очень часто</label><br>
            <label><input type="radio" wire:model="answers.1" value="3"> Б - Часто</label><br>
            <label><input type="radio" wire:model="answers.1" value="2"> В - Иногда</label><br>
            <label><input type="radio" wire:model="answers.1" value="1"> Г - Никогда</label>
        </div>
    </div>

    <div>
        <label class="font-semibold">2. Как часто у вас возникает ощущение жжения/покалывания при нанесении средств на лицо?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.2" value="4"> А - Очень часто</label><br>
            <label><input type="radio" wire:model="answers.2" value="3"> Б - Часто</label><br>
            <label><input type="radio" wire:model="answers.2" value="2"> В - Иногда</label><br>
            <label><input type="radio" wire:model="answers.2" value="1"> Г - Никогда</label>
        </div>
    </div>

    {{-- Добавь оставшиеся 16 вопросов по образцу --}}
</div>

