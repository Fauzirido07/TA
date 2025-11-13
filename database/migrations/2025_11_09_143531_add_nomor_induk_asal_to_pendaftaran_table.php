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
            $table->string('nomor_induk_asal')->after('nama_lengkap');
            $table->string('nisn')->after('nomor_induk_asal');
            $table->string('nik')->after('nisn');
            $table->string('telepon_siswa')->after('alamat');
            $table->string('tamatan_dari')->after('telepon_siswa');
            $table->string('tgl_sttb')->after('tamatan_dari');
            $table->string('no_sttb')->after('tgl_sttb');
            $table->string('lama_belajar')->after('no_sttb');
            $table->string('pindahan_dari')->after('lama_belajar');
            $table->string('alasan')->after('pindahan_dari');
            $table->string('foto')->after('alasan');
            $table->dropColumn('dokumen_pendukung');
            $table->dropColumn('agama');
            $table->dropColumn('anak_ke');
            $table->dropColumn('jumlah_saudara');
            $table->dropColumn('perkembangan_kehamilan');
            $table->dropColumn('penyakit_kehamilan');
            $table->dropColumn('usia_kandungan');
            $table->dropColumn('proses_kelahiran');
            $table->dropColumn('tempat_kelahiran');
            $table->dropColumn('penolong_kelahiran');
            $table->dropColumn('gangguan_lahir');
            $table->dropColumn('berat_bayi');
            $table->dropColumn('panjang_bayi');
            $table->dropColumn('tanda_kelainan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('dokumen_pendukung')->after('alamat');
            $table->string('agama')->after('jenis_kelamin');
            $table->integer('anak_ke')->after('agama');
            $table->integer('jumlah_saudara')->after('anak_ke');
            $table->string('perkembangan_kehamilan')->after('jumlah_saudara');
            $table->string('penyakit_kehamilan')->after('perkembangan_kehamilan');
            $table->string('usia_kandungan')->after('penyakit_kehamilan');
            $table->string('proses_kelahiran')->after('usia_kandungan');
            $table->string('tempat_kelahiran')->after('proses_kelahiran');
            $table->string('penolong_kelahiran')->after('tempat_kelahiran');
            $table->string('gangguan_lahir')->after('penolong_kelahiran');
            $table->integer('berat_bayi')->after('gangguan_lahir');
            $table->integer('panjang_bayi')->after('berat_bayi');
            $table->string('tanda_kelainan')->after('panjang_bayi');
        });
    }
};
