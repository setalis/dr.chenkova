<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('test_sessions', function (Blueprint $table) {
            $table->id();
            $table->json('test_one_answers')->nullable();   // Сухая/Жирная
            $table->json('test_two_answers')->nullable();   // Чувствительная/Резистентная
            $table->json('test_three_answers')->nullable(); // Пигментированная/Непигментированная
            $table->json('test_four_answers')->nullable();  // Морщинистая/Упругая

            $table->integer('test_one_score')->nullable();
            $table->integer('test_two_score')->nullable();
            $table->integer('test_three_score')->nullable();
            $table->integer('test_four_score')->nullable();

            $table->string('skin_type_code')->nullable(); // Например: DRNT

            $table->string('email')->nullable(); // для отправки результата
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('test_sessions');
    }
};
