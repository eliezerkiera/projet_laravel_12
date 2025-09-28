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
        Schema::create('market_product_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('market_product_id')->constrained('market_products')->cascadeOnDelete();

            $table->foreignId('reason_id')->constrained('market_product_report_reasons')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->enum('status', ['pending','resolved','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_product_reports');
    }
};
