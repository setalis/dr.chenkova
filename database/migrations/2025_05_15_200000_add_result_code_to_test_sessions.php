<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('test_sessions', 'result_code')) {
            return;
        }

        Schema::table('test_sessions', function (Blueprint $table) {
            $table->string('result_code')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('test_sessions', function (Blueprint $table) {
            $table->dropColumn('result_code');
        });
    }
};
