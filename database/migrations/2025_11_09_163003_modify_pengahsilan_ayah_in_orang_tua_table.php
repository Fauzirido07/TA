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
            $table->BigInteger('penghasilan_ayah')->change();
            $table->BigInteger('penghasilan_ibu')->change();
            $table->BigInteger('penghasilan_wali')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->BigInteger('penghasilan_ayah')->change();
            $table->BigInteger('penghasilan_ibu')->change();
            $table->BigInteger('penghasilan_wali')->change();
        });
    }
};
