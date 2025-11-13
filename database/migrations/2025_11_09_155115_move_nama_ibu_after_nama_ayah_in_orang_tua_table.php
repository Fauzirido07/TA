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
            $table->string('nama_ibu')->after('nama_ayah')->change();
            $table->string('alamat_ortu')->after('nama_ibu')->change();
            $table->string('no_ortu')->after('alamat_ortu')->change();
            $table->string('pekerjaan_ayah')->after('no_ortu')->change();
            $table->string('pekerjaan_ibu')->after('pekerjaan_ayah')->change();
            $table->string('pendidikan_ayah')->after('pekerjaan_ibu')->change();
            $table->string('pendidikan_ibu')->after('pendidikan_ayah')->change();
            $table->string('penghasilan_ayah')->after('pendidikan_ibu')->change();
            $table->string('penghasilan_ibu')->after('penghasilan_ayah')->change();
            $table->string('alamat_wali')->after('nama_wali')->change();
            $table->string('no_wali')->after('alamat_wali')->change();
            $table->string('pendidikan_wali')->after('no_wali')->change();
            $table->string('pekerjaan_wali')->after('pendidikan_wali')->change();
            $table->string('penghasilan_wali')->after('pekerjaan_wali')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->string('nama_ibu')->change();
            $table->string('alamat_ortu')->change();
            $table->string('no_ortu')->change();
            $table->string('pekerjaan_ayah')->change();
            $table->string('pekerjaan_ibu')->change();
            $table->string('pendidikan_ayah')->change();
            $table->string('pendidikan_ibu')->change();
            $table->string('penghasilan_ayah')->change();
            $table->string('penghasilan_ibu')->change();
            $table->string('alamat_wali')->change();
            $table->string('no_wali')->change();
            $table->string('pendidikan_wali')->change();
            $table->string('pekerjaan_wali')->change();
            $table->string('penghasilan_wali')->change();
        });
    }
};
