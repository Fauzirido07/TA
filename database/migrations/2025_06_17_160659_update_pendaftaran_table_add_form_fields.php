<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('status');
            $table->string('tempat_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('nama_sekolah_asal')->nullable();
            $table->string('kelas')->nullable();
            $table->text('perkembangan_kehamilan')->nullable();
            $table->text('proses_kelahiran')->nullable();
            $table->decimal('berat_bayi', 4, 2)->nullable();
            $table->decimal('panjang_bayi', 4, 2)->nullable();
            $table->string('status_gizi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::table('pendaftaran', function (Blueprint $table)
        {
            $table->dropColumn([
                'jenis_kelamin', 'tempat_lahir', 'agama', 'anak_ke', 'jumlah_saudara',
                'nama_sekolah_asal', 'kelas', 'perkembangan_kehamilan', 'proses_kelahiran',
                'berat_bayi', 'panjang_bayi', 'status_gizi'
            ]);
        });
    }
};
