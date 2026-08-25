<?php

declare(strict_types=1);

test('ukrainian book page shows reader reviews', function () {
    $response = $this->get('/uk/book');

    $response->assertOk();
    $response->assertSee('Відгуки та рецензії');
    $response->assertSee('кілька разів доля намагалася', false);
    $response->assertSee('ідеальне доповнення до моєї відпустки вийшло', false);
    $response->assertSee('Вам треба написати автобіографію, мемуари', false);
    $response->assertSee('Окреме спасибі за закладку з вашим підписом', false);
    $response->assertSee('Хотіла відзначити роботу адміністратора', false);
    $response->assertDontSee('Testimonials');
    $response->assertDontSee('Bonnie Green');
    $response->assertDontSee('Flowbite Pro');
});
