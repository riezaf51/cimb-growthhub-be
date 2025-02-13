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
        Schema::create('trainings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('nama_trainer');
            $table->integer('kapasitas');
            $table->enum('tipe', ['private', 'public']);
            $table->text('deskripsi');
            $table->dateTime('tanggal');
            $table->integer('durasi');
            $table->enum('status', ['on progress', 'done']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
