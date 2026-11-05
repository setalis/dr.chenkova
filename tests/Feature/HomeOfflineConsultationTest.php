<?php

declare(strict_types=1);

test('home page describes the offline consultation', function (string $locale, string $heading, string $text) {
    $response = $this->get("/{$locale}");

    $response->assertOk();
    $response->assertSeeInOrder(['Off Line', $heading, $text], false);
    $response->assertDontSee('дерматологическую консультацию', false);
})->with([
    'ru' => ['ru', 'консультация', 'После записи вы сможете получить косметологическую консультацию, а также, при необходимости, провести дерматоскопию и ультразвуковое исследование кожи. Запись возможна только через администратора.'],
    'en' => ['en', 'consultation', 'After booking, you will be able to receive a cosmetological consultation and, if needed, undergo dermoscopy and an ultrasound examination of the skin. Appointments are only possible through the administrator.'],
    'uk' => ['uk', 'консультація', 'Після запису ви зможете отримати косметологічну консультацію, а також, за потреби, провести дерматоскопію та ультразвукове дослідження шкіри. Запис можливий лише через адміністратора.'],
    'ka' => ['ka', 'კონსულტაცია', 'ჩაწერის შემდეგ შეძლებთ მიიღოთ კოსმეტოლოგიური კონსულტაცია და, საჭიროების შემთხვევაში, ჩაიტაროთ დერმატოსკოპია და კანის ულტრაბგერითი გამოკვლევა. ჩაწერა შესაძლებელია მხოლოდ ადმინისტრატორის მეშვეობით.'],
]);
