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
        Schema::create('market_product_images', function (Blueprint $table) {
            $table->id();

               // Relation to product
            $table->foreignId('market_product_id')->constrained('market_products')->cascadeOnDelete();

            $table->string('path'); // Path or URL of the image
            $table->boolean('is_default')->default(false); // Default image

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_product_images');
    }
};
