<div class="space-y-6">
    <div>
        <label class="font-semibold">1. У вас есть морщины на лице?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.1" value="1"> А - Нет, даже при мимике</label><br>
            <label><input type="radio" wire:model="answers.1" value="2"> Б - Только при мимике</label><br>
            <label><input type="radio" wire:model="answers.1" value="3"> В - И при мимике, и в покое</label><br>
            <label><input type="radio" wire:model="answers.1" value="4"> Г - Морщины есть даже без мимики</label>
        </div>
    </div>

    <div>
        <label class="font-semibold">2. Насколько старой кожа вашей матери выглядит (выглядела)?</label>
        <div class="space-y-1 mt-2">
            <label><input type="radio" wire:model="answers.2" value="1"> А - На 5–10 лет моложе</label><br>
            <label><input type="radio" wire:model="answers.2" value="2"> Б - На свой возраст</label><br>
            <label><input type="radio" wire:model="answers.2" value="3"> В - На 5 лет старше</label><br>
            <label><input type="radio" wire:model="answers.2" value="4"> Г - Более чем на 5 лет старше</label><br>
            <label><input type="radio" wire:model="answers.2" value="2.5"> Д - Не могу ответить</label>
        </div>
    </div>

    {{-- Добавь оставшиеся 18 вопросов по аналогии --}}
</div>

