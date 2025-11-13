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
            $table->string('penghasilan_ayah')->after('pendidikan_ibu');
            $table->string('penghasilan_ibu')->after('penghasilan_ayah');
            $table->string('alamat_ortu')->after('nama_ibu');
            $table->string('no_ortu')->after('alamat_ortu');
            $table->string('no_wali')->after('alamat_wali');
            $table->string('penghasilan_wali')->after('pekerjaan_wali');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->dropColumn('penghasilan_ayah');
            $table->dropColumn('penghasilan_ibu');
            $table->dropColumn('alamat_ortu');
            $table->dropColumn('no_ortu');
            $table->dropColumn('alamat_wali');
            $table->dropColumn('no_wali');
            $table->dropColumn('penghasilan_wali'); 
        });
    }
};
