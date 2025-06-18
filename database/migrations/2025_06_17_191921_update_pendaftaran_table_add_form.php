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
            // Data tambahan dari revisi form pendaftaran

            // Jenis kelamin, tempat lahir, agama, anak ke, jumlah saudara
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('status');
            $table->string('tempat_lahir')->nullable()->after('jenis_kelamin');
            $table->string('agama')->nullable()->after('tempat_lahir');
            $table->integer('anak_ke')->nullable()->after('agama');
            $table->integer('jumlah_saudara')->nullable()->after('anak_ke');

            // Pendidikan asal dan kelas
            $table->string('nama_sekolah_asal')->nullable()->after('jumlah_saudara');
            $table->string('kelas')->nullable()->after('nama_sekolah_asal');

            // Riwayat kelahiran (form B)
            $table->text('perkembangan_kehamilan')->nullable()->after('kelas');
            $table->text('penyakit_kehamilan')->nullable()->after('perkembangan_kehamilan');
            $table->integer('usia_kandungan')->nullable()->after('penyakit_kehamilan');
            $table->string('proses_kelahiran')->nullable()->after('usia_kandungan');
            $table->string('tempat_kelahiran')->nullable()->after('proses_kelahiran');
            $table->string('penolong_kelahiran')->nullable()->after('tempat_kelahiran');
            $table->text('gangguan_bayi')->nullable()->after('penolong_kelahiran');
            $table->decimal('berat_bayi', 5, 2)->nullable()->after('gangguan_bayi');
            $table->decimal('panjang_bayi', 5, 2)->nullable()->after('berat_bayi');
            $table->text('tanda_kelainan')->nullable()->after('panjang_bayi');

            // Status gizi
            $table->string('status_gizi')->nullable()->after('tanda_kelainan');

            // Perkembangan pendidikan (form G)
            $table->integer('masuk_tk_umur')->nullable()->after('status_gizi');
            $table->integer('lama_pendidikan_tk')->nullable()->after('masuk_tk_umur');
            $table->string('kesulitan_tk')->nullable()->after('lama_pendidikan_tk');
            $table->integer('masuk_sd_umur')->nullable()->after('kesulitan_tk');
            $table->string('kesulitan_sd')->nullable()->after('masuk_sd_umur');
            $table->enum('pernah_tidak_naik', ['ya', 'tidak'])->nullable()->after('kesulitan_sd');
            $table->string('mapel_sulit')->nullable()->after('pernah_tidak_naik');
            $table->string('mapel_disukai')->nullable()->after('mapel_sulit');

            // Perkembangan sosial (form F)
            $table->string('hubungan_saudara')->nullable()->after('mapel_disukai');
            $table->string('hubungan_teman')->nullable()->after('hubungan_saudara');
            $table->string('hubungan_orangtua')->nullable()->after('hubungan_teman');
            $table->string('hobi')->nullable()->after('hubungan_orangtua');

            // Data orang tua/wali (form H)
            $table->string('nama_ayah')->nullable()->after('hobi');
            $table->integer('umur_ayah')->nullable()->after('nama_ayah');
            $table->string('agama_ayah')->nullable()->after('umur_ayah');
            $table->string('status_ayah')->nullable()->after('agama_ayah');
            $table->string('pendidikan_ayah')->nullable()->after('status_ayah');
            $table->string('pekerjaan_ayah')->nullable()->after('pendidikan_ayah');
            $table->text('alamat_ayah')->nullable()->after('pekerjaan_ayah');

            $table->string('nama_ibu')->nullable()->after('alamat_ayah');
            $table->integer('umur_ibu')->nullable()->after('nama_ibu');
            $table->string('agama_ibu')->nullable()->after('umur_ibu');
            $table->string('status_ibu')->nullable()->after('agama_ibu');
            $table->string('pendidikan_ibu')->nullable()->after('status_ibu');
            $table->string('pekerjaan_ibu')->nullable()->after('pendidikan_ibu');
            $table->text('alamat_ibu')->nullable()->after('pekerjaan_ibu');

            $table->string('nama_wali')->nullable()->after('alamat_ibu');
            $table->integer('umur_wali')->nullable()->after('nama_wali');
            $table->string('agama_wali')->nullable()->after('umur_wali');
            $table->string('status_perkawinan_wali')->nullable()->after('agama_wali');
            $table->string('pendidikan_wali')->nullable()->after('status_perkawinan_wali');
            $table->string('pekerjaan_wali')->nullable()->after('pendidikan_wali');
            $table->text('alamat_wali')->nullable()->after('pekerjaan_wali');
            $table->string('hubungan_wali')->nullable()->after('alamat_wali');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn([
                'jenis_kelamin', 'tempat_lahir', 'agama', 'anak_ke', 'jumlah_saudara',
                'nama_sekolah_asal', 'kelas', 'perkembangan_kehamilan', 'penyakit_kehamilan', 'usia_kandungan',
                'proses_kelahiran', 'tempat_kelahiran', 'penolong_kelahiran', 'gangguan_bayi',
                'berat_bayi', 'panjang_bayi', 'tanda_kelainan', 'status_gizi',
                'masuk_tk_umur', 'lama_pendidikan_tk', 'kesulitan_tk', 'masuk_sd_umur', 'kesulitan_sd',
                'pernah_tidak_naik', 'mapel_sulit', 'mapel_disukai',
                'hubungan_saudara', 'hubungan_teman', 'hubungan_orangtua', 'hobi',
                'nama_ayah', 'umur_ayah', 'agama_ayah', 'status_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'alamat_ayah',
                'nama_ibu', 'umur_ibu', 'agama_ibu', 'status_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'alamat_ibu',
                'nama_wali', 'umur_wali', 'agama_wali', 'status_perkawinan_wali', 'pendidikan_wali', 'pekerjaan_wali', 'alamat_wali', 'hubungan_wali'
            ]);
        });
    }
};
