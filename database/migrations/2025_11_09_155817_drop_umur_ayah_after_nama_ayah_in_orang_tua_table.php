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
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->dropColumn('umur_ayah');
            $table->dropColumn('agama_ayah');
            $table->dropColumn('status_ayah');
            $table->dropColumn('alamat_ayah');
            $table->dropColumn('umur_ibu');
            $table->dropColumn('agama_ibu');
            $table->dropColumn('status_ibu');
            $table->dropColumn('alamat_ibu');
            $table->dropColumn('umur_wali');
            $table->dropColumn('agama_wali');
            $table->dropColumn('status_perkawinan_wali');
            $table->dropColumn('hubungan_wali');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->integer('umur_ayah')->after('penghasilan_ibu');
            $table->string('agama_ayah')->after('umur_ayah');
            $table->string('status_ayah')->after('agama_ayah');
            $table->string('alamat_ayah')->after('status_ayah');
            $table->integer('umur_ibu')->after('nama_ibu');
            $table->string('agama_ibu')->after('umur_ibu');
            $table->string('status_ibu')->after('agama_ibu');
            $table->string('alamat_ibu')->after('status_ibu');
            $table->integer('umur_wali')->after('penghasilan_wali');
            $table->string('agama_wali')->after('umur_wali');
            $table->string('status_perkawinan_wali')->after('agama_wali');
            $table->string('hubungan_wali')->after('status_perkawinan_wali');
        });
    }
};
