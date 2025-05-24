<div class="space-y-6">
    <div>
        <label class="font-semibold">1. Насколько легко вы загораете?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.1" value="1"> А - Очень легко</label><br>
            <label><input type="radio" wire:model="answers.1" value="2"> Б - Довольно легко</label><br>
            <label><input type="radio" wire:model="answers.1" value="3"> В - С трудом</label><br>
            <label><input type="radio" wire:model="answers.1" value="4"> Г - Почти никогда</label>
        </div>
    </div>

    <div>
        <label class="font-semibold">2. Насколько легко вы сгораете?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.2" value="1"> А - Очень легко</label><br>
            <label><input type="radio" wire:model="answers.2" value="2"> Б - Довольно легко</label><br>
            <label><input type="radio" wire:model="answers.2" value="3"> В - С трудом</label><br>
            <label><input type="radio" wire:model="answers.2" value="4"> Г - Никогда</label>
        </div>
    </div>

    {{-- Добавь оставшиеся 11 вопросов по аналогии --}}
</div>

