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
            $table->unsignedBigInteger('jenjang_sekolah_id')->after('alasan')->nullable();

            $table->foreign('jenjang_sekolah_id')
                ->references('id')
                ->on('jenjang_sekolah')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropForeign(['jenjang_sekolah_id']);
            $table->dropColumn('jenjang_sekolah_id');
        });
    }
};
