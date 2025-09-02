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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code',100)->unique();
            $table->string('local_name', 100)->nullable();
            $table->string('full_name',100)->nullable();
            $table->string('flag_img',100)->nullable();
            $table->string('phone_code',100)->nullable();

            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('language_id');

            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
