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
        Schema::create('log_statuses', function (Blueprint $table) {
            $table->id('id_log_status');
            $table->string('aktivitas');
            $table->unsignedBigInteger('id_entitas');
            $table->enum('status', ['Menunggu Verifikasi', 'Terverifikasi', 'Ditolak']);
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id_user')->on('users');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_statuses');
    }
};
