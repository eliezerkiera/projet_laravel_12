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
        Schema::create('market_collection_product', function (Blueprint $table) {
            $table->id();
            // Relation to collections
            $table->foreignId('market_collection_id')->constrained('market_collections')->cascadeOnDelete();

            // Relation to products
            $table->foreignId('market_product_id')->constrained('market_products')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_collection_product');
    }
};
