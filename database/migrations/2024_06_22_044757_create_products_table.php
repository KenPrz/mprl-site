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
            $table->string('name');
            $table->foreignId('category_id')
                ->constrained('product_categories')
                ->onDelete('cascade');
            $table->string('power_out')->nullable();
            $table->string('efficiency')->nullable();
            $table->string('dimension')->nullable();
            $table->string('weight')->nullable();
            $table->string('type')->nullable();
            $table->string('voltage')->nullable();
            $table->string('current')->nullable();
            $table->string('temp_coeff')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('warranty')->nullable();
            $table->string('stock_level')->nullable();
            $table->string('supplier')->nullable();
            $table->string('certification')->nullable();
            $table->text('desciption');
            $table->string('img_path')->nullable();
            $table->string('datasheet')->nullable();
            $table->boolean('is_displayed')
                    ->default(false);
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