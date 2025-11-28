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
        Schema::create('daftar_ulang', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('pendaftaran_id');
            $table->string('akta_path')->nullable();
            $table->string('kk_path')->nullable();
            $table->string('ktp_path')->nullable();
            $table->string('st_path')->nullable();
            $table->string('form_path')->nullable();
            $table->string('bukti_path')->nullable();
            $table->foreign('pendaftaran_id')
                ->references('id')
                ->on('pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_ulang');
    }
};
