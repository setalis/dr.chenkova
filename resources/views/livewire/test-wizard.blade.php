<div class="mt-16 bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen">
    <div class="p-6 max-w-3xl mx-auto">
        
        <div class="mb-4 flex flex-row justify-between">
            <h2 class="text-2xl font-semibold">Тест {{ $step }} из 4</h2>
            <div class="mt-2 text-gray-600">
                Вопрос {{ $currentQuestion }} из {{ $totalQuestions }}
            </div>
        </div>

        @if (session()->has('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="space-y-6">
            @if ($step === 1)
                
                @if($currentQuestion === 1)
                    <div>
                        <label class="font-semibold">После умывания водой не используйте крем, тоник, пудру или какой-либо другой продукт. Два или три часа спустя посмотрите в зеркало под ярким светом. Ваш лоб и щеки выглядят, или ощущаются:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="1" class="mr-2">
                                <span>А - шершавыми, шелушащимися или потрескавшимися</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="2" class="mr-2">
                                <span>Б - стянутыми</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="3" class="mr-2">
                                <span>В - хорошо увлажненными без какого-либо отражения света (матовыми)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="4" class="mr-2">
                                <span>Г - блестящими, отражающими свет</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 2)
                    <div>
                        <label class="font-semibold">На фотографиях ваше лицо выглядит блестящим:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="1" class="mr-2">
                                <span>А - никогда, я никогда не замечала блеск</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 3)
                    <div>
                        <label class="font-semibold">Два или три часа после нанесения тональной основы, но не пудры, ваш макияж выглядит:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="1" class="mr-2">
                                <span>А - шелушащимся или высохшим и подчеркивающим морщинки</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="2" class="mr-2">
                                <span>Б - ровным и гладким</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="3" class="mr-2">
                                <span>В - блестящим</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="4" class="mr-2">
                                <span>Г - поплывшим и блестящим</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="2.5" class="mr-2">
                                <span>Д - я не пользуюсь тональными основами</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 4)
                    <div>
                        <label class="font-semibold">В окружении с низкой влажностью, если вы не используете крем, ваша кожа на лице:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="1" class="mr-2">
                                <span>А - ощущается очень сухой или потрескавшейся</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="2" class="mr-2">
                                <span>Б - ощущается стянутой</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="3" class="mr-2">
                                <span>В - ощущается нормальной</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="4" class="mr-2">
                                <span>Г - выглядит блестящей, или я никогда не чувствую потребность в креме</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="2.5" class="mr-2">
                                <span>Д - не знаю</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 5)
                    <div>
                        <label class="font-semibold">Посмотрите в зеркало с увеличением. Как много у вас больших пор, размером с кончик булавки или больше?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="2" class="mr-2">
                                <span>Б - несколько в Т-зоне (лоб и нос)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="3" class="mr-2">
                                <span>В - много</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="4" class="mr-2">
                                <span>Г - тонны!</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="2.5" class="mr-2">
                                <span>Д - я не знаю</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 6)
                    <div>
                        <label class="font-semibold">Как бы вы охарактеризовали свою кожу:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="1" class="mr-2">
                                <span>А - сухая</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="2" class="mr-2">
                                <span>Б - нормальная</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="3" class="mr-2">
                                <span>В - комбинированная</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="4" class="mr-2">
                                <span>Г - жирная</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 7)
                    <div>
                        <label class="font-semibold">Если вы используете мыло которое пениться и дает пышную пену, кожа на вашем лице:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="1" class="mr-2">
                                <span>А - ощущается сухой и потрескавшейся</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="2" class="mr-2">
                                <span>Б - ощущается небольшая сухость, но не потрескавшаяся</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="3" class="mr-2">
                                <span>В - ощущается нормальной</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="4" class="mr-2">
                                <span>Г - ощущается жирной</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="2.5" class="mr-2">
                                <span>Д - я не использую мыло или другие пенящиеся очищающие средства</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 8)
                    <div>
                        <label class="font-semibold">Если вашу кожу на лице не увлажнить, вы чувствуете стянутость:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="1" class="mr-2">
                                <span>А - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="3" class="mr-2">
                                <span>В - редко</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="4" class="mr-2">
                                <span>Г - никогда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 9)
                    <div>
                        <label class="font-semibold">У вас есть забитые поры (черные точки и элементы с белым гноем):</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="2" class="mr-2">
                                <span>Б - редко</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="3" class="mr-2">
                                <span>В - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 10)
                    <div>
                        <label class="font-semibold">Ваше лицо жирное только в Т-зоне (лоб и нос):</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 11)
                    <div>
                        <label class="font-semibold">Два или три часа после применения крема ваши щеки:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="1" class="mr-2">
                                <span>А - шершавые, шелушащиеся или потрескавшиеся</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="2" class="mr-2">
                                <span>Б - гладкие</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="3" class="mr-2">
                                <span>В - немного блестят</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="4" class="mr-2">
                                <span>Г - блестят и лоснятся, или я не использую кремы</span>
                            </label>
                        </div>
                    </div>
                @endif
            @elseif ($step === 2)
                @if($currentQuestion === 1)
                    <div>
                        <label class="font-semibold">Как ваша кожа реагирует на новые средства?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - Часто появляется раздражение</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - Иногда появляется раздражение</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - Редко появляется раздражение</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - Никогда не раздражается</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 2)
                    <div>
                        <label class="font-semibold">Есть ли у вас аллергия на косметику?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - Часто возникает аллергия</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - Иногда возникает аллергия</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - Редко возникает аллергия</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - Никогда не было аллергии</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 3)
                    <div>
                        <label class="font-semibold">Как ваша кожа реагирует на стресс?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - Сильно краснеет и раздражается</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - Умеренно краснеет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - Слегка краснеет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - Не реагирует</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 4)
                    <div>
                        <label class="font-semibold">Есть ли у вас розацеа или купероз?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - Сильно выражены</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - Умеренно выражены</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - Слабо выражены</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - Отсутствуют</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 5)
                    <div>
                        <label class="font-semibold">Если вы носите украшения не из 14-каратного золота, как часто у вас на них сыпь?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="2" class="mr-2">
                                <span>Б - редко</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="2.5" class="mr-2">
                                <span>Д - не уверен</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 6)
                    <div>
                        <label class="font-semibold">Солнцезащитные кремы вызывают у вас зуд, жжение, высыпания или покраснение:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="2" class="mr-2">
                                <span>Б - редко</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="2.5" class="mr-2">
                                <span>Д - я никогда не использую солнцезащитные средства</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 7)
                    <div>
                        <label class="font-semibold">Ставили ли вам когда-либо диагноз атопический дерматит, экзема, контактные дерматит (или аллергическая сыпь)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="2" class="mr-2">
                                <span>Б - друзья говорили у меня есть эти проблемы</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="3" class="mr-2">
                                <span>В - да</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="4" class="mr-2">
                                <span>Г - да, тяжелую стадию</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="2.5" class="mr-2">
                                <span>Д - не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 8)
                    <div>
                        <label class="font-semibold">Как часто у вас сыпь под кольцами?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="2" class="mr-2">
                                <span>Б - редко</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="2.5" class="mr-2">
                                <span>Д - я не ношу колец</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 9)
                    <div>
                        <label class="font-semibold">Ароматизированная пенная ванная, массажное масло, или лосьон для тела вызывают у вас зуд, высыпания, покраснение или сильное ощущение сухости:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="2" class="mr-2">
                                <span>Б - редко</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="2.5" class="mr-2">
                                <span>Д - я никогда не использую эти типы продуктов</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 10)
                    <div>
                        <label class="font-semibold">Можете ли вы пользоваться мылом из отелей (других общественных мест) на вашем теле или лице без каких-либо проблем?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="1" class="mr-2">
                                <span>А - да</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="2" class="mr-2">
                                <span>Б - большую часть времени у меня не возникает проблем</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="3" class="mr-2">
                                <span>В - нет, моя кожа чешется, становится красной, или на ней появляются высыпания</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="4" class="mr-2">
                                <span>Г - я предпочитаю не использовать их, слишком много было проблем в прошлом!</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="2.5" class="mr-2">
                                <span>Д - я беру косметику с собой, так что я не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 11)
                    <div>
                        <label class="font-semibold">У кого-нибудь в вашей семье был диагностирован атопический дерматит, экзема, астма, и/или аллергия?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="2" class="mr-2">
                                <span>Б - вроде один член семьи</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="3" class="mr-2">
                                <span>В - несколько членов семьи</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="4" class="mr-2">
                                <span>Г - много членов моей семьи болеют дерматитом, экземой, астмой, и/или аллергией</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="2.5" class="mr-2">
                                <span>Д - не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 12)
                    <div>
                        <label class="font-semibold">Что случается если вы пользуетесь сильно ароматизированным стиральный порошком и/или ополаскивателем для белья?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="1" class="mr-2">
                                <span>А - с моей кожей все хорошо</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="2" class="mr-2">
                                <span>Б - я чувствую, что моя кожа немного сухая</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="3" class="mr-2">
                                <span>В - моя кожа чешется</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="4" class="mr-2">
                                <span>Г - моя кожа чешется и появляется сыпь</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="2.5" class="mr-2">
                                <span>Д - не уверен(а), я никогда их не использую</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 13)
                    <div>
                        <label class="font-semibold">Как часто ваше лицо или шея становятся красными после умеренной нагрузки, и/или от стресса или сильных эмоций, к примеру как гнев?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 14)
                    <div>
                        <label class="font-semibold">Как часто вы вспыхиваете и краснеете от употребления алкоголя?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="4" class="mr-2">
                                <span>Г - всегда, я стараюсь не пить из-за этой проблемы</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="2.5" class="mr-2">
                                <span>Д - я не пью алкоголь</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 15)
                    <div>
                        <label class="font-semibold">Как часто вы вспыхиваете и краснеете от острой или горячей еды или напитков?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="2.5" class="mr-2">
                                <span>Д - я никогда не ем острую еду</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 16)
                    <div>
                        <label class="font-semibold">Как много у вас видимых красных или синих сосудов или сосудистых звездочек на лице и носу (если была коррекция то укажите состояние до нее)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="2" class="mr-2">
                                <span>Б - мало (одна или три на все лицо, включая нос)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="3" class="mr-2">
                                <span>В - несколько (четыре или шесть на все лицо, включая нос)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="4" class="mr-2">
                                <span>Г - много (больше семи на все лицо, включая нос)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 17)
                    <div>
                        <label class="font-semibold">Ваше лицо выглядит красным на фото:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="1" class="mr-2">
                                <span>А - никогда, я никогда этого не замечаю</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 18)
                    <div>
                        <label class="font-semibold">Люди спрашивают не сгорели-ли вы на солнце, в то время как вы не загорали:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - я всегда как будто я сгорел(а) на солнце</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 19)
                    <div>
                        <label class="font-semibold">Если вам когда-нибудь ДЕРМАТОЛОГ ставил диагноз акне (угревая болезнь), розацеа, контактный дерматит, или экзема — добавьте к своим баллам 5. Если такой диагноз ставил терапевт — добавьте к своим баллам 2.</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="5" class="mr-2">
                                <span>А - Да, диагноз ставил дерматолог</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - Да, диагноз ставил терапевт</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="0" class="mr-2">
                                <span>В - Нет, таких диагнозов не ставили</span>
                            </label>
                        </div>
                    </div>
                @endif
            @elseif ($step === 3)
                @if($currentQuestion === 1)
                    <div>
                        <label class="font-semibold">После прыщика или вросшего волоса остается-ли темноватое/тёмное пятно?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - иногда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - всегда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - у меня нет прыщиков или вросших волос</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 2)
                    <div>
                        <label class="font-semibold">После того как вы порезались, как долго коричневый (не розовый) след остается на коже?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - у меня не остается коричневого следа</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - неделю</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - несколько недель</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - месяц</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 3)
                    <div>
                        <label class="font-semibold">Как много тёмных пятен у вас появилась на лице во время беременности, приема оральных контрацептивов или гормональной заместительной терапии?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - ни одного</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - одно</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - несколько</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - много</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - вопрос не применим ко мне</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 4)
                    <div>
                        <label class="font-semibold">У вас есть тёмные пятна или точки над вашей верхней губой, щеках или были-ли они у вас раньше, но вы их удалили?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - я не уверена</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - да они есть (были) но едва заметные</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - да они есть (были) и они очень заметны</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 5)
                    <div>
                        <label class="font-semibold">Темнеют-ли ваши пигментные пятна, когда вы загораете?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - у меня нет пигментных пятен</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - не уверена</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - немного темнеют</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - сильно темнеют</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - я ношу солнцезащитный крем каждый день и никогда не загораю</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 6)
                    <div>
                        <label class="font-semibold">У вас когда-нибудь диагностировали мелазму, светлые, тёмные или серые пятна на лице?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - однажды, но я от них избавилась</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - да</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - да, тяжелую форму</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 7)
                    <div>
                        <label class="font-semibold">У вас есть, или когда-нибудь были, маленькие коричневые пятнышки (веснушки или солнечные пятнышки) на лице, груди, спине или руках?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - да, несколько (одно или пять)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - да, много (6 или 15)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - да, очень много (16 и более)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 8)
                    <div>
                        <label class="font-semibold">Вы впервые за несколько месяцев попадаете под солнце, ваша кожа:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - только сгорает</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - сначала сгорает, но потом загорает</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - загорает</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - моя кожа уже темная, поэтому тяжело понять загорает-ли она</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 9)
                    <div>
                        <label class="font-semibold">Если случается, что вы много дней постоянно находитесь под солнцем:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - я сгораю и облажу, но моя кожа не изменяется цвет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - моя кожа становится немного темнее</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - моя кожа становится намного темнее</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - моя кожа уже тёмная, поэтому непонятно становится-ли она темнее</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - я не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 10)
                    <div>
                        <label class="font-semibold">Когда вы находитесь под солнцем у вас появляются веснушки?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - нет, никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - у меня появляется несколько маленьких новых веснушек каждый год</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - у меня часто появляются веснушки</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - моя кожа уже тёмная, поэтому не видно есть-ли там веснушки</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - я не нахожусь под солнцем</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 11)
                    <div>
                        <label class="font-semibold">У кого-либо из ваших родителей есть веснушки? Если так, пожалуйста отметьте сколько. Если ни у кого из ваших родителей нет веснушек, просто дайте ответ на вопрос. Если у обоих ваших родителей есть веснушки — отвечайте про того, у кого их больше.</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - несколько на лице</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - много на лице</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - много на лице, груди, шее, и плечах</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 12)
                    <div>
                        <label class="font-semibold">Какой ваш натуральный цвет волос? (Если вы седая (седой), укажите цвет до того, как вы поседели)</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - блонд</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - коричневый</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - черный</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - рыжий</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 13)
                    <div>
                        <label class="font-semibold">Есть ли у вас в истории жизни меланома, либо у кого-либо из ваших кровных родственников?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="1" class="mr-2">
                                <span>А - нет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2" class="mr-2">
                                <span>Б - один человек в моей семье</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="3" class="mr-2">
                                <span>В - более чем один человек в моей семье</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="4" class="mr-2">
                                <span>Г - у меня была меланома</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="currentAnswers.{{ $currentQuestion }}" value="2.5" class="mr-2">
                                <span>Д - не уверен(а)</span>
                            </label>
                        </div>
                    </div>
                @endif
            @elseif ($step === 4)
                @if($currentQuestion === 1)
                    <div>
                        <label class="font-semibold">У вас есть морщины на лице?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="1" class="mr-2">
                                <span>А - нет, даже когда я улыбаюсь, хмурюсь или подымаю брови</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="2" class="mr-2">
                                <span>Б - только во время мимических движений, когда я улыбаюсь, хмурюсь или подымаю брови</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="3" class="mr-2">
                                <span>В - да, в движении и несколько в покое, без движения</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.1" value="4" class="mr-2">
                                <span>Г - морщины есть даже когда я не улыбаюсь, хмурюсь или подымаю брови</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 2)
                    <div>
                        <label class="font-semibold">Насколько старой кожа вашей матери выглядит (выглядела)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="3" class="mr-2">
                                <span>В - на пять лет старше ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="4" class="mr-2">
                                <span>Г - на более чем пять лет старше ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.2" value="2.5" class="mr-2">
                                <span>Д - не могу ответить, я был(а) удочерена (усыновлен) или я не могу вспомнить</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 3)
                    <div>
                        <label class="font-semibold">Насколько старой кожа вашего отца выглядит (выглядела)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="3" class="mr-2">
                                <span>В - на пять лет старше его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="4" class="mr-2">
                                <span>Г - на более чем пять лет старше его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.3" value="2.5" class="mr-2">
                                <span>Д - не могу ответить, я был(а) удочерена (усыновлен) или я не могу вспомнить</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 4)
                    <div>
                        <label class="font-semibold">Насколько старой кожа вашей бабушки по линии матери выглядит (выглядела)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="3" class="mr-2">
                                <span>В - на пять лет старше ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="4" class="mr-2">
                                <span>Г - на более чем пять лет старше ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.4" value="2.5" class="mr-2">
                                <span>Д - не могу ответить, я был(а) удочерена (усыновлен), я не знаю ее, я не могу вспомнить</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 5)
                    <div>
                        <label class="font-semibold">Насколько старой кожа вашего дедушки по линии матери выглядит (выглядела)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="3" class="mr-2">
                                <span>В - на пять лет старше его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="4" class="mr-2">
                                <span>Г - на более чем пять лет старше его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.5" value="2.5" class="mr-2">
                                <span>Д - не могу ответить, я был(а) удочерена (усыновлен), я не знаю его, я не могу вспомнить</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 6)
                    <div>
                        <label class="font-semibold">Насколько старой кожа вашей бабушки по линии отца выглядит (выглядела)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="3" class="mr-2">
                                <span>В - на пять лет старше ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="4" class="mr-2">
                                <span>Г - на более чем пять лет старше ее возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.6" value="2.5" class="mr-2">
                                <span>Д - не могу ответить, я был(а) удочерена (усыновлен), я не знаю ее, я не могу вспомнить</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 7)
                    <div>
                        <label class="font-semibold">Насколько старой кожа вашего дедушки по линии отца выглядит (выглядела)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="3" class="mr-2">
                                <span>В - на пять лет старше его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="4" class="mr-2">
                                <span>Г - на более чем пять лет старше его возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.7" value="2.5" class="mr-2">
                                <span>Д - не могу ответить, я был(а) удочерена (усыновлен), я не знаю его, я не могу вспомнить</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 8)
                    <div>
                        <label class="font-semibold">На протяжении вашей жизни, вы когда-либо загорали на постоянной основе более чем две недели в год?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="2" class="mr-2">
                                <span>Б - от одного до пяти лет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="3" class="mr-2">
                                <span>В - от пяти до десяти лет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.8" value="4" class="mr-2">
                                <span>Г - более десяти лет</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 9)
                    <div>
                        <label class="font-semibold">На протяжении вашей жизни, увлекались ли вы сезонным загаром по две недели за сезон или реже?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="2" class="mr-2">
                                <span>Б - от одного до пяти лет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="3" class="mr-2">
                                <span>В - от пяти до десяти лет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.9" value="4" class="mr-2">
                                <span>Г - более десяти лет</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 10)
                    <div>
                        <label class="font-semibold">Основываясь на месте, где вы жили, как много ежедневного солнечного облучения вы получали в жизни?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="1" class="mr-2">
                                <span>А - мало; я в основном жил(а) в местах где серо и пасмурно</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="2" class="mr-2">
                                <span>Б - немного; я жила как в климате где мало солнца, так и там, где солнце более-менее часто</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="3" class="mr-2">
                                <span>В - умеренно; я жил(а) в местах с достаточным количеством солнечного излучения</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.10" value="4" class="mr-2">
                                <span>Г - много; я жил(а) в тропиках, на Юге, или в очень солнечных местах</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 11)
                    <div>
                        <label class="font-semibold">На какой возраст как вы думаете вы выглядите?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="1" class="mr-2">
                                <span>А - на пять-десять лет моложе вашего возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="2" class="mr-2">
                                <span>Б - на свой возраст</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="3" class="mr-2">
                                <span>В - на пять лет старше вашего возраста</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.11" value="4" class="mr-2">
                                <span>Г - более чем на пять лет старше вашего возраста</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 12)
                    <div>
                        <label class="font-semibold">В течении последних пяти лет, как часто вы разрешали вашей коже загорать, намеренно или ненамеренно во время пребывания под открытым воздухом?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="2" class="mr-2">
                                <span>Б - один раз в месяц</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="3" class="mr-2">
                                <span>В - один раз в неделю</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.12" value="4" class="mr-2">
                                <span>Г - ежедневно</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 13)
                    <div>
                        <label class="font-semibold">Как часто, или если когда-либо, вы сгорали под солнцем?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="1" class="mr-2">
                                <span>А - никогда</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="2" class="mr-2">
                                <span>Б - один или пять раз</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="3" class="mr-2">
                                <span>В - пять или десять раз</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.13" value="4" class="mr-2">
                                <span>Г - много раз</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 14)
                    <div>
                        <label class="font-semibold">В течении вашей жизни, как много сигарет вы выкуриваете (выкурили)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="1" class="mr-2">
                                <span>А - ни одной</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="2" class="mr-2">
                                <span>Б - немного пачек</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="3" class="mr-2">
                                <span>В - несколькими много пачек</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="4" class="mr-2">
                                <span>Г - я курю каждый день</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.14" value="2.5" class="mr-2">
                                <span>Д - я никогда не курю, но я живу, работаю или я рос(ла) с людьми, которые регулярно курили в моем присутствии</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 15)
                    <div>
                        <label class="font-semibold">Пожалуйста опишите уровень загрязнения воздуха в месте, где вы живете</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="1" class="mr-2">
                                <span>А - воздух свежий и чистый</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="2" class="mr-2">
                                <span>Б - какую-то часть года, но не весь год, я живу в месте с чистым воздухом</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="3" class="mr-2">
                                <span>В - воздух немного загрязнен</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.15" value="4" class="mr-2">
                                <span>Г - воздух очень загрязнен</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 16)
                    <div>
                        <label class="font-semibold">Пожалуйста укажите какой период времени вы используете кремы для лица с ретиноидами, к примеру Renova, Retin-A, Tazorac, Differin, или Avage:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="1" class="mr-2">
                                <span>А - много лет</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="2" class="mr-2">
                                <span>Б - от случая к случаю</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="3" class="mr-2">
                                <span>В - один раз от акне, когда я был(а) моложе</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.16" value="4" class="mr-2">
                                <span>Г - никогда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 17)
                    <div>
                        <label class="font-semibold">Как часто вы сейчас едите фрукты и овощи?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="1" class="mr-2">
                                <span>А - с каждым приемом пищи</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="2" class="mr-2">
                                <span>Б - один раз в день</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="3" class="mr-2">
                                <span>В - от случая к случаю</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.17" value="4" class="mr-2">
                                <span>Г - никогда</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 18)
                    <div>
                        <label class="font-semibold">На протяжении вашей жизни какой процент вашего каждодневного рациона состоял из овощей и фруктов?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.18" value="1" class="mr-2">
                                <span>А - 75 – 100 %</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.18" value="2" class="mr-2">
                                <span>Б - 25 – 75 %</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.18" value="3" class="mr-2">
                                <span>В - 10 – 25 %</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.18" value="4" class="mr-2">
                                <span>Г - 0 – 10 %</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 19)
                    <div>
                        <label class="font-semibold">Какой ваш натуральный цвет кожи (без загара или автозагара)?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.19" value="1" class="mr-2">
                                <span>А - темный</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.19" value="2" class="mr-2">
                                <span>Б - средний (прим. ред. смуглый)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.19" value="3" class="mr-2">
                                <span>В - светлый</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.19" value="4" class="mr-2">
                                <span>Г - очень светлый</span>
                            </label>
                        </div>
                    </div>
                @elseif($currentQuestion === 20)
                    <div>
                        <label class="font-semibold">Какая ваша этническая принадлежность?</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.20" value="1" class="mr-2">
                                <span>А - афро-американская</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.20" value="2" class="mr-2">
                                <span>Б - азиатская/индусская/средиземноморская/другая</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.20" value="3" class="mr-2">
                                <span>В - латиноамериканская/испанская</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="currentAnswers.20" value="4" class="mr-2">
                                <span>Г - европейская</span>
                            </label>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="flex justify-between mt-6 p-6 max-w-3xl mx-auto">
        @if($currentQuestion > 1)
            <button wire:click="previousQuestion" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Назад
            </button>
        @else
            <div></div>
        @endif

        @if($currentQuestion < $totalQuestions)
            <button wire:click="nextQuestion" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Далее
            </button>
        @else
            <button wire:click="nextQuestion" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                Завершить
            </button>
        @endif
    </div>

    @if($showResultModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-lg mx-auto">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                    <div class="w-full">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                @if($step === 5)
                                    Финальный результат
                                @else
                                    Результат теста {{ $step }}
                                @endif
                            </h3>
                            <div class="mt-4">
                                @if($step === 1)
                                    <p class="text-base text-gray-700">Ваш тип кожи: <span class="font-semibold">{{ $stepOneResult === 'D' ? 'Сухая' : 'Жирная' }}</span></p>
                                @elseif($step === 2)
                                    <p class="text-base text-gray-700">Ваша кожа: <span class="font-semibold">{{ $stepTwoResult === 'S' ? 'Чувствительная' : 'Резистентная' }}</span></p>
                                @elseif($step === 3)
                                    <p class="text-base text-gray-700">Ваша кожа: <span class="font-semibold">{{ $stepThreeResult['type'] === 'N' ? 'Непигментированная' : 'Пигментированная' }}</span></p>
                                @elseif($step === 4)
                                    <p class="text-base text-gray-700">Ваша кожа: <span class="font-semibold">{{ $stepFourResult === 'T' ? 'Упругая' : 'Морщинистая' }}</span></p>
                                @elseif($step === 5)
                                    <div class="space-y-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Результаты по каждому параметру:</h4>
                                            <div class="space-y-2">
                                                <p class="text-base text-gray-700">Тип кожи: <span class="font-semibold">{{ $stepOneResult === 'D' ? 'Сухая' : 'Жирная' }}</span></p>
                                                <p class="text-base text-gray-700">Чувствительность: <span class="font-semibold">{{ $stepTwoResult === 'S' ? 'Чувствительная' : 'Резистентная' }}</span></p>
                                                <p class="text-base text-gray-700">Пигментация: <span class="font-semibold">{{ $stepThreeResult['type'] === 'N' ? 'Непигментированная' : 'Пигментированная' }}</span></p>
                                                <p class="text-base text-gray-700">Упругость: <span class="font-semibold">{{ $stepFourResult === 'T' ? 'Упругая' : 'Морщинистая' }}</span></p>
                                            </div>
                                        </div>
                                        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                                            <p class="text-lg font-bold text-gray-900">Ваш финальный код типа кожи:</p>
                                            <p class="text-3xl font-bold text-blue-600 mt-2 text-center">{{ $session->skin_type_code }}</p>
                                            <p class="text-sm text-gray-600 mt-2 text-center">Этот код поможет определить оптимальный уход за вашей кожей</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="closeResultModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        @if($step === 5)
                            Завершить
                        @else
                            Продолжить
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
</div>


