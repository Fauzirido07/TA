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

        });

         Schema::create('masa_balita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');

            $table->string('asi_hingga')->nullable();
            $table->string('susu_tambahan_hingga')->nullable();
            $table->string('imunisasi')->nullable();
            $table->string('penimbangan_rutin')->nullable();
            $table->string('kualitas_makanan')->nullable();
            $table->string('kuantitas_makan')->nullable();
            $table->string('kesulitan_makan')->nullable();

            $table->timestamps();
        });

        Schema::create('perkembangan_fisik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');

            $table->string('umur_berdiri')->nullable();
            $table->string('umur_berjalan')->nullable();
            $table->string('umur_sepeda_roda_tiga')->nullable();
            $table->string('umur_sepeda_roda_dua')->nullable();
            $table->string('umur_bicara_kalimat')->nullable();
            $table->string('kesulitan_gerak')->nullable();
            $table->string('status_gizi')->nullable();
            $table->string('riwayat_kesehatan')->nullable();

            $table->timestamps();
        });

        Schema::create('perkembangan_bahasa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');

            $table->string('umur_celoteh')->nullable();
            $table->string('umur_suku_kata')->nullable();
            $table->string('umur_kata_bermakna')->nullable();
            $table->string('umur_kalimat_sederhana')->nullable();

            $table->timestamps();
        });

        Schema::create('perkembangan_sosial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');

            $table->string('hubungan_saudara')->nullable();
            $table->string('hubungan_teman')->nullable();
            $table->string('hubungan_orangtua')->nullable();
            $table->string('hobi')->nullable();

            $table->timestamps();
        });

        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');

            $table->string('masuk_tk_umur')->nullable();
            $table->string('lama_pendidikan_tk')->nullable();
            $table->string('kesulitan_tk')->nullable();
            $table->string('masuk_sd_umur')->nullable();
            $table->string('kesulitan_sd')->nullable();
            $table->string('pernah_tidak_naik')->nullable();
            $table->string('mapel_sulit')->nullable();
            $table->string('mapel_disukai')->nullable();

            $table->timestamps();
        });

        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');

            // Ayah
            $table->string('nama_ayah')->nullable();
            $table->string('umur_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();

            // Ibu
            $table->string('nama_ibu')->nullable();
            $table->string('umur_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat_ibu')->nullable();

            // Wali
            $table->string('nama_wali')->nullable();
            $table->string('umur_wali')->nullable();
            $table->string('agama_wali')->nullable();
            $table->string('status_perkawinan_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->text('alamat_wali')->nullable();
            $table->string('hubungan_wali')->nullable();

            $table->timestamps();
        });

        Schema::create('dokumen_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $table->string('dokumen_pendukung'); // misalnya path file
            $table->string('status')->default('menunggu'); // atau sesuai logika: diterima, ditolak, dsb.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            // Kalau rollback migration, hapus kolom-kolom di atas
            $table->dropColumn([
                'tempat_lahir', 'jenis_kelamin', 'agama', 'anak_ke', 'jumlah_saudara',
                'perkembangan_kehamilan', 'penyakit_kehamilan', 'usia_kandungan', 'proses_kelahiran',
                'tempat_kelahiran', 'penolong_kelahiran', 'gangguan_lahir', 'berat_bayi',
                'panjang_bayi', 'tanda_kelainan'
            ]);
        });

        Schema::dropIfExists('masa_balita');

        Schema::dropIfExists('perkembangan_fisik');

        Schema::dropIfExists('perkembangan_bahasa');

        Schema::dropIfExists('perkembangan_sosial');

        Schema::dropIfExists('riwayat_pendidikan');

        Schema::dropIfExists('orang_tua');

        Schema::dropIfExists('dokumen_pendaftaran');
    }
}
