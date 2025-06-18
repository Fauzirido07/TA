<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasiTable extends Migration
{
    public function up(): void 
    {
        Schema::create('notifikasi', function (Blueprint $table) 
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('pesan');
            $table->enum('status', ['belum dibaca', 'dibaca'])->default('belum dibaca');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
}
