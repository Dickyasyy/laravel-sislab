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
        Schema::create('pasien_pemeriksaan', function (Blueprint $table) {
            $table->unsignedBigInteger('pasiens_id');
            $table->unsignedBigInteger('pemeriksaans_id');

            $table->foreign('pasiens_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('pemeriksaans_id')->references('id')->on('pemeriksaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_pemeriksaan');
    }
};
