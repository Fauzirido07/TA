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
        Schema::dropIfExists('masa_balita');
        Schema::dropIfExists('perkembangan_bahasa');
        Schema::dropIfExists('perkembangan_fisik');
        Schema::dropIfExists('perkembangan_sosial');
        Schema::dropIfExists('riwayat_pendidikan');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
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
    }
};
