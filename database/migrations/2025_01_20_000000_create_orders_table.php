<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'paper' или 'ebook'
            $table->string('invoice_id')->unique(); // ID инвойса от Monobank
            
            // Данные для бумажной книги
            $table->string('name')->nullable();
            $table->string('messenger')->nullable(); // telegram, instagram, whatsapp
            $table->string('contact')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            
            // Данные для электронной книги
            $table->string('email')->nullable();
            
            // Общие данные платежа
            $table->integer('amount');
            $table->string('currency', 3)->default('UAH');
            $table->json('currency_info')->nullable();
            $table->string('product_name');
            
            // Статус и флаги
            $table->string('payment_status')->nullable(); // success, failure, processing, expired
            $table->boolean('email_sent')->default(false); // Флаг отправки письма менеджеру
            $table->timestamp('email_sent_at')->nullable();
            
            $table->timestamps();
            
            // Индексы для быстрого поиска
            $table->index('invoice_id');
            $table->index('type');
            $table->index('payment_status');
            $table->index('email_sent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};








