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
        Schema::create('market_products', function (Blueprint $table) {
            $table->id();
             // User relation (owner of the product)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Location
            $table->string('city')->nullable();
            $table->string('state')->nullable(); // region or province
            $table->foreignId('country_id')->constrained('countries');

            // Contact information
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            // Product details
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->unsignedTinyInteger('condition_percentage')->nullable(); // product condition in %

            // Market relations
            $table->foreignId('market_product_type_id')->constrained('market_product_types');
            $table->foreignId('market_product_category_id')->constrained('market_product_categories');
            $table->foreignId('market_product_payment_method_id')->constrained('market_product_payment_methods');
            $table->foreignId('currency_id')->constrained('currencies');

            // SEO & management
            $table->string('slug')->unique();
            $table->enum('status', ['active', 'inactive', 'sold'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_products');
    }
};
