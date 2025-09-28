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
        Schema::create('market_product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->json('label');

            // Self-referencing relationship for subcategories
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('market_product_categories')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_product_categories');
    }
};
