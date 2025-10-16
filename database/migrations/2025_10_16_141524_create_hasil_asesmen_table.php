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
        Schema::create('hasil_asesmen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesmen_id');
            $table->unsignedBigInteger('form_asesmen_id');
            $table->text('jawaban');
            $table->foreign('asesmen_id')->references('id')->on('asesmen')->onDelete('cascade');
            $table->foreign('form_asesmen_id')->references('id')->on('form_asesmen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_asesmen');
    }
};
