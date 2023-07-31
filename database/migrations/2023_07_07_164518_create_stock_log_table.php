<?php

use App\Models\Product;
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
        Schema::create('stock_log', function (Blueprint $table) {
            $table->id();
            $table->enum('in_out', ['in', 'out']);
            $table->float('quantity');
            $table->foreignIdFor(Product::class,'id_product');
            $table->foreignId('id_metric');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_log');
    }
};
