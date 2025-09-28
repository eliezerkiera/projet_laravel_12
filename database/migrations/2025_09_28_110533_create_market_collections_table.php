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
        Schema::create('market_collections', function (Blueprint $table) {
            $table->id();
             // User relation (owner of the collection)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Location
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->foreignId('country_id')->constrained('countries');

            // Contact information
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            // Collection details
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();

            // Market relations
            $table->foreignId('market_type_id')->constrained('market_types');
            $table->foreignId('market_category_id')->constrained('market_categories');

            // SEO & management
            $table->string('slug')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_collections');
    }
};
