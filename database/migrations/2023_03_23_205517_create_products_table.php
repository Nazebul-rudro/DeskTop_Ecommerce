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
            $table->id();
            $table->string('ProductName');
            $table->string('ProductCode');
            $table->string('categoriesId');
            $table->integer('ProductPrice');
            $table->integer('DiscountPrice');
            $table->integer('AfterDiscount');
            $table->string('ShortDescription')->nullable();
            $table->longText('LongDescription')->nullable();
            $table->longText('ProductQuantity');
            $table->string('ProductImage')->nullable();
            $table->boolean('is_active')->default(0);
            $table->softDeletes();
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
