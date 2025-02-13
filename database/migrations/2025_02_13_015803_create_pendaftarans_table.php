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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('training_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->dateTime('tgl_daftar');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
