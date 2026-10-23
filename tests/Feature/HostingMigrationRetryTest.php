<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;

test('result code migration skips when the column already exists', function () {
    expect(Schema::hasColumn('test_sessions', 'result_code'))->toBeTrue();

    $migration = include database_path('migrations/2025_05_15_200000_add_result_code_to_test_sessions.php');
    $migration->up();

    expect(Schema::hasColumn('test_sessions', 'result_code'))->toBeTrue();
});

test('locale migration skips adding locale when the column already exists', function () {
    expect(Schema::hasColumn('orders', 'locale'))->toBeTrue();

    $migration = include database_path('migrations/2026_09_14_190412_add_locale_and_payment_status_default_to_orders_table.php');
    $migration->up();

    expect(Schema::hasColumn('orders', 'locale'))->toBeTrue();
});
