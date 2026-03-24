<?php

test('root redirects to default locale', function () {
    $response = $this->get('/');

    $response->assertRedirect('/ru');
});