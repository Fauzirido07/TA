<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailToPendaftaranTable extends Migration
{
    public function up()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            // A. Identitas Anak
            $table->string('tempat_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('agama')->nullable();
            $table->string('status_anak')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();

            // B. Riwayat Kelahiran
            $table->text('perkembangan_kehamilan')->nullable();
            $table->text('penyakit_kehamilan')->nullable();
            $table->string('usia_kandungan')->nullable();
            $table->text('proses_kelahiran')->nullable();
            $table->string('tempat_kelahiran')->nullable();
            $table->string('penolong_kelahiran')->nullable();
            $table->text('gangguan_lahir')->nullable();
            $table->integer('berat_bayi')->nullable();
            $table->integer('panjang_bayi')->nullable();
            $table->text('tanda_kelainan')->nullable();

            // C. Masa Balita
            $table->integer('asi_hingga')->nullable();
            $table->integer('susu_tambahan_hingga')->nullable();
            $table->enum('imunisasi', ['lengkap', 'tidak'])->nullable();
            $table->enum('penimbangan_rutin', ['ya', 'tidak'])->nullable();
            $table->text('kualitas_makanan')->nullable();
            $table->text('kuantitas_makan')->nullable();
            $table->enum('kesulitan_makan', ['ya', 'tidak'])->nullable();

            // D. Perkembangan Fisik
            $table->integer('umur_berdiri')->nullable();
            $table->integer('umur_berjalan')->nullable();
            $table->integer('umur_sepeda_roda_tiga')->nullable();
            $table->integer('umur_sepeda_roda_dua')->nullable();
            $table->integer('umur_bicara_kalimat')->nullable();
            $table->text('kesulitan_gerak')->nullable();
            $table->enum('status_gizi', ['baik', 'kurang'])->nullable();
            $table->enum('riwayat_kesehatan', ['baik', 'kurang'])->nullable();

            // E. Perkembangan Bahasa
            $table->integer('umur_celoteh')->nullable();
            $table->integer('umur_suku_kata')->nullable();
            $table->integer('umur_kata_bermakna')->nullable();
            $table->integer('umur_kalimat_sederhana')->nullable();

            // F. Perkembangan Sosial
            $table->text('hubungan_saudara')->nullable();
            $table->text('hubungan_teman')->nullable();
            $table->text('hubungan_orangtua')->nullable();
            $table->text('hobi')->nullable();

            // G. Pendidikan
            $table->integer('masuk_tk_umur')->nullable();
            $table->integer('lama_pendidikan_tk')->nullable();
            $table->text('kesulitan_tk')->nullable();
            $table->integer('masuk_sd_umur')->nullable();
            $table->text('kesulitan_sd')->nullable();
            $table->enum('pernah_tidak_naik', ['ya', 'tidak'])->nullable();
            $table->text('mapel_sulit')->nullable();
            $table->text('mapel_disukai')->nullable();

            // H. Data Orang Tua / Wali
            $table->string('nama_ayah')->nullable();
            $table->integer('umur_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();

            $table->string('nama_ibu')->nullable();
            $table->integer('umur_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat_ibu')->nullable();

            $table->string('nama_wali')->nullable();
            $table->integer('umur_wali')->nullable();
            $table->string('agama_wali')->nullable();
            $table->string('status_perkawinan_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->text('alamat_wali')->nullable();
            $table->string('hubungan_wali')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            // Kalau rollback migration, hapus kolom-kolom di atas
            $table->dropColumn([
                'tempat_lahir', 'jenis_kelamin', 'agama', 'status_anak', 'anak_ke', 'jumlah_saudara',
                'perkembangan_kehamilan', 'penyakit_kehamilan', 'usia_kandungan', 'proses_kelahiran', 'tempat_kelahiran',
                'penolong_kelahiran', 'gangguan_lahir', 'berat_bayi', 'panjang_bayi', 'tanda_kelainan',
                'asi_hingga', 'susu_tambahan_hingga', 'imunisasi', 'penimbangan_rutin', 'kualitas_makanan', 'kuantitas_makan', 'kesulitan_makan',
                'umur_berdiri', 'umur_berjalan', 'umur_sepeda_roda_tiga', 'umur_sepeda_roda_dua', 'umur_bicara_kalimat',
                'kesulitan_gerak', 'status_gizi', 'riwayat_kesehatan',
                'umur_celoteh', 'umur_suku_kata', 'umur_kata_bermakna', 'umur_kalimat_sederhana',
                'hubungan_saudara', 'hubungan_teman', 'hubungan_orangtua', 'hobi',
                'masuk_tk_umur', 'lama_pendidikan_tk', 'kesulitan_tk', 'masuk_sd_umur', 'kesulitan_sd',
                'pernah_tidak_naik', 'mapel_sulit', 'mapel_disukai',
                'nama_ayah', 'umur_ayah', 'agama_ayah', 'status_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'alamat_ayah',
                'nama_ibu', 'umur_ibu', 'agama_ibu', 'status_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'alamat_ibu',
                'nama_wali', 'umur_wali', 'agama_wali', 'status_perkawinan_wali', 'pendidikan_wali', 'pekerjaan_wali', 'alamat_wali', 'hubungan_wali'
            ]);
        });
    }
}
