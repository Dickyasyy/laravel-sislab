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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('pasiens_id');
            $table->string('type'); // Darah Lengkap, Urine dan Fases, dll.
            $table->string('satuan')->nullable; // Darah Lengkap, Urine dan Fases, dll.
            $table->string('rujukan')->nullable; // Hasil pemeriksaan
            $table->timestamps();

            // Foreign key
            // $table->foreign('pasiens_id')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
