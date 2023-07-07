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
            $table->float('price_cost');
            $table->float('price_sale');
            $table->float('quantity');
            $table->date('fabricated_at');
            $table->date('valid_until');
            $table->foreignId('id_metric');
            $table->foreignId('id_supplier');
            $table->foreignId('id_brand');
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
