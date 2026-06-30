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
            $table->string('id', 20)->primary()->comment('Unique id for the order');
            $table->timestamp('created_at')->comment('Order creation date');
            $table->string('phone_number', 20)->comment('Phone number of the buyer');
            $table->string('country_iso_code', 2)->comment('Country ISO code of the buyer');
            $table->string('email')->comment('Email of the buyer');
            $table->string('name')->comment('Name of the buyer');
            $table->string('first_line')->nullable()->comment('Buyer address first line');
            $table->string('second_line')->nullable()->comment('Buyer address second line');
            $table->string('city')->nullable()->comment('City of the buyer');
            $table->string('state')->nullable()->comment('State of the buyer');
            $table->string('zip', 20)->comment('Zip code of the buyer');
            $table->string('message')->nullable()->comment('Message from the buyer');
            $table->string('currency_code', 3)->comment('Currency code of the order');
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
