<fieldset class="border p-3 mb-4">
    <legend class="w-auto px-2">D. Perkembangan Fisik</legend>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="umur_berdiri" class="form-label">Berdiri pada umur (bulan)</label>
            <input type="number" id="umur_berdiri" name="umur_berdiri" class="form-control" required
                value="{{ old('umur_berdiri', optional($pendaftaran)->umur_berdiri) }}">
        </div>
        <div class="col-md-6">
            <label for="umur_berjalan" class="form-label">Berjalan pada umur (bulan)</label>
            <input type="number" id="umur_berjalan" name="umur_berjalan" class="form-control" required
                value="{{ old('umur_berjalan', optional($pendaftaran)->umur_berjalan) }}">
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6">
            <label for="umur_sepeda_roda_tiga" class="form-label">Naik sepeda roda tiga umur (tahun)</label>
            <input type="number" id="umur_sepeda_roda_tiga" name="umur_sepeda_roda_tiga" class="form-control" required
                value="{{ old('umur_sepeda_roda_tiga', optional($pendaftaran)->umur_sepeda_roda_tiga) }}">
        </div>
        <div class="col-md-6">
            <label for="umur_sepeda_roda_dua" class="form-label">Naik sepeda roda dua umur (tahun)</label>
            <input type="number" id="umur_sepeda_roda_dua" name="umur_sepeda_roda_dua" class="form-control" required
                value="{{ old('umur_sepeda_roda_dua', optional($pendaftaran)->umur_sepeda_roda_dua) }}">
        </div>
    </div>

    <div class="mb-3 mt-3">
        <label for="umur_bicara_kalimat" class="form-label">Bicara dengan kalimat lengkap umur (tahun)</label>
        <input type="number" id="umur_bicara_kalimat" name="umur_bicara_kalimat" class="form-control" required
            value="{{ old('umur_bicara_kalimat', optional($pendaftaran)->umur_bicara_kalimat) }}">
    </div>

    <div class="mb-3">
        <label for="kesulitan_gerak" class="form-label">Kesulitan gerakan yang dialami</label>
        <input type="text" id="kesulitan_gerak" name="kesulitan_gerak" class="form-control" required
            value="{{ old('kesulitan_gerak', optional($pendaftaran)->kesulitan_gerak) }}">
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="status_gizi" class="form-label">Status gizi balita</label>
            <select id="status_gizi" name="status_gizi" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="baik" {{ old('status_gizi', optional($pendaftaran)->status_gizi) == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="kurang" {{ old('status_gizi', optional($pendaftaran)->status_gizi) == 'kurang' ? 'selected' : '' }}>Kurang</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="riwayat_kesehatan" class="form-label">Riwayat kesehatan</label>
            <select id="riwayat_kesehatan" name="riwayat_kesehatan" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="baik" {{ old('riwayat_kesehatan', optional($pendaftaran)->riwayat_kesehatan) == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="kurang" {{ old('riwayat_kesehatan', optional($pendaftaran)->riwayat_kesehatan) == 'kurang' ? 'selected' : '' }}>Kurang</option>
            </select>
        </div>
    </div>
</fieldset>
