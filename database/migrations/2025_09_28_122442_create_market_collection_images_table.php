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
        Schema::create('market_collection_images', function (Blueprint $table) {
            $table->id();
             // Relation to collection
            $table->foreignId('market_collection_id')->constrained('market_collections')->cascadeOnDelete();

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
        Schema::dropIfExists('market_collection_images');
    }
};
