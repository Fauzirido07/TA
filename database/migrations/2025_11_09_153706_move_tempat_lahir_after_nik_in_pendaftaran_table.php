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
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('tempat_lahir')->after('nik')->change();
            $table->string('tanggal_lahir')->after('tempat_lahir')->change();
            $table->string('jenis_kelamin')->after('tanggal_lahir')->change();
            $table->string('alamat')->after('jenis_kelamin')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('tempat_lahir')->change();
            $table->string('tanggal_lahir')->change();
            $table->string('jenis_kelamin')->change();
            $table->string('alamat')->change();
        });
    }
};
