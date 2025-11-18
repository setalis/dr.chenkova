<div class="p-6 max-w-3xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-center mb-4">Результаты теста</h2>
        <div class="text-center text-2xl font-semibold text-blue-600 mb-6">
            Ваш тип кожи: {{ $session->result_code }}
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-4">Расшифровка результатов:</h3>
            
            <div class="space-y-4">
                <div>
                    <span class="font-semibold">D/O:</span>
                    <p class="mt-1">
                        @if(str_contains($session->result_code, 'D'))
                            D - Сухая кожа
                        @else
                            O - Жирная кожа
                        @endif
                    </p>
                </div>

                <div>
                    <span class="font-semibold">S/R:</span>
                    <p class="mt-1">
                        @if(str_contains($session->result_code, 'S'))
                            S - Чувствительная кожа
                        @else
                            R - Устойчивая кожа
                        @endif
                    </p>
                </div>

                <div>
                    <span class="font-semibold">N/P:</span>
                    <p class="mt-1">
                        @if(str_contains($session->result_code, 'N'))
                            N - Непигментированная кожа
                        @else
                            P - Пигментированная кожа
                        @endif
                    </p>
                </div>

                <div>
                    <span class="font-semibold">T/W:</span>
                    <p class="mt-1">
                        @if(str_contains($session->result_code, 'T'))
                            T - Подтянутая кожа
                        @else
                            W - Морщинистая кожа
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-4">Рекомендации по уходу:</h3>
            <div class="prose max-w-none">
                @if(str_contains($session->result_code, 'D'))
                    <p>Для сухой кожи рекомендуется:</p>
                    <ul>
                        <li>Использовать увлажняющие кремы с маслами</li>
                        <li>Избегать средств с спиртом</li>
                        <li>Применять питательные маски</li>
                    </ul>
                @else
                    <p>Для жирной кожи рекомендуется:</p>
                    <ul>
                        <li>Использовать легкие увлажняющие средства</li>
                        <li>Применять матирующие продукты</li>
                        <li>Регулярно очищать кожу</li>
                    </ul>
                @endif

                @if(str_contains($session->result_code, 'S'))
                    <p>Для чувствительной кожи рекомендуется:</p>
                    <ul>
                        <li>Использовать гипоаллергенные средства</li>
                        <li>Избегать агрессивных компонентов</li>
                        <li>Применять успокаивающие продукты</li>
                    </ul>
                @endif

                @if(str_contains($session->result_code, 'P'))
                    <p>Для пигментированной кожи рекомендуется:</p>
                    <ul>
                        <li>Использовать солнцезащитные средства</li>
                        <li>Применять осветляющие продукты</li>
                        <li>Избегать прямого солнца</li>
                    </ul>
                @endif

                @if(str_contains($session->result_code, 'W'))
                    <p>Для кожи с морщинами рекомендуется:</p>
                    <ul>
                        <li>Использовать антивозрастные средства</li>
                        <li>Применять продукты с ретинолом</li>
                        <li>Увлажнять кожу</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route_locale('test') }}" class="inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Пройти тест заново
        </a>
    </div>
</div> 