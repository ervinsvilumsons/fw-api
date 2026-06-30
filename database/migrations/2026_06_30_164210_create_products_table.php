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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary()->comment('Unique id for the product');
            $table->foreignId('order_id')->constrained()->cascadeOnDelete()->comment('Foreign key to the orders table');
            $table->string('sku')->nullable()->comment('SKU of the product');
            $table->string('title')->comment('Title of the product');
            $table->string('image', 2048)->nullable()->comment('Image URL of the product');
            $table->integer('quantity')->comment('Quantity of the product');
            $table->decimal('price', 10, 2)->comment('Price of the product');
            $table->json('variations')->nullable()->comment('Variations of the product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
