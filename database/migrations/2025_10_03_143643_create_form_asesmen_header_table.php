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
        Schema::create('form_asesmen_header', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->timestamps();
        });

         Schema::create('form_asesmen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_asesmen_header_id');
            $table->string('question');
            $table->integer('question_type');
            $table->timestamps();

            $table->foreign('form_asesmen_header_id')->on('form_asesmen_header')->references('id')->restrictOnDelete()->cascadeOnUpdate();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_asesmen_header');
    }
};
