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
        Schema::create('market_collection_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('market_collection_id')->constrained('market_collections')->cascadeOnDelete();

        $table->foreignId('reason_id')->constrained('market_collection_report_reasons')->cascadeOnDelete();
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
        Schema::dropIfExists('market_collection_reports');
    }
};
