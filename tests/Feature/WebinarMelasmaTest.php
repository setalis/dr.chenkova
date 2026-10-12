<?php

declare(strict_types=1);

test('webinar page shows the melasma recording first', function (string $locale, string $title, string $duration, string $nextTitle) {
    $response = $this->get("/{$locale}/webinar");

    $response->assertOk();
    $response->assertSee($duration, false);
    $response->assertSee('storage/images/webinar-4.jpg', false);
    $response->assertSeeInOrder([$title, $nextTitle], false);
})->with([
    'ru' => ['ru', 'Мелазма: от патогенеза к эффективной терапии', '180 минут', 'PRO Akne'],
    'en' => ['en', 'Melasma: From Pathogenesis to Effective Therapy', '180 minutes', 'PRO Acne'],
    'uk' => ['uk', 'Мелазма: від патогенезу до ефективної терапії', '180 хвилин', 'PRO Akne'],
    'ka' => ['ka', 'მელაზმა: პათოგენეზიდან ეფექტურ თერაპიამდე', '180 წუთი', 'PRO Akne'],
]);
