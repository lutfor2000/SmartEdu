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
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('country_name');
            $table->string('city_name');
            $table->string('customer_address');
            $table->string('customer_note');
            
            $table->integer('order_package_price');
            $table->text('order_package_date');
            $table->integer('order_package_email');
            $table->text('order_package_storage');
            $table->integer('order_package_database');
            $table->integer('order_package_domain');
            $table->text('order_package_support');

            $table->integer('payment_option')->comment('1=credit card, 2=mobile');
            $table->integer('payment_status')->comment('1=pending, 2=done');
            $table->timestamps();
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
