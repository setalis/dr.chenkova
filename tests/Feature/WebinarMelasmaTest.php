<?php

declare(strict_types=1);

test('webinar page shows the lips recording first', function (string $locale, string $title, string $programItem, string $nextTitle) {
    $response = $this->get("/{$locale}/webinar");

    $response->assertOk();
    $response->assertSee('storage/images/webinar-5.jpg', false);
    $response->assertSee('$100', false);
    $response->assertSee($programItem, false);
    $response->assertSeeInOrder([$title, $nextTitle], false);
})->with([
    'ru' => ['ru', 'RE: Lips - Растворение и восстановление', 'УЗИ губ в клинической практике.', 'Мелазма: от патогенеза к эффективной терапии'],
    'en' => ['en', 'RE: Lips — Dissolution and Restoration', 'Lip ultrasound in clinical practice.', 'Melasma: From Pathogenesis to Effective Therapy'],
    'uk' => ['uk', 'RE: Lips — Розчинення та відновлення', 'УЗД губ у клінічній практиці.', 'Мелазма: від патогенезу до ефективної терапії'],
    'ka' => ['ka', 'RE: Lips — დაშლა და აღდგენა', 'ტუჩების ულტრაბგერითი კვლევა კლინიკურ პრაქტიკაში.', 'მელაზმა: პათოგენეზიდან ეფექტურ თერაპიამდე'],
]);
