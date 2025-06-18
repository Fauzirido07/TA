<fieldset class="border p-3 mb-4">
    <legend class="w-auto px-2">C. Perkembangan Masa Balita</legend>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="asi_hingga" class="form-label">Minum ASI hingga umur (bulan)</label>
            <input type="number" id="asi_hingga" name="asi_hingga" class="form-control" required
                value="{{ old('asi_hingga', optional($pendaftaran)->asi_hingga) }}">
        </div>
        <div class="col-md-6">
            <label for="susu_tambahan_hingga" class="form-label">Minum susu tambahan hingga umur (bulan)</label>
            <input type="number" id="susu_tambahan_hingga" name="susu_tambahan_hingga" class="form-control" required
                value="{{ old('susu_tambahan_hingga', optional($pendaftaran)->susu_tambahan_hingga) }}">
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6">
            <label for="imunisasi" class="form-label">Imunisasi</label>
            <select id="imunisasi" name="imunisasi" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="lengkap" {{ old('imunisasi', optional($pendaftaran)->imunisasi) == 'lengkap' ? 'selected' : '' }}>Lengkap</option>
                <option value="tidak" {{ old('imunisasi', optional($pendaftaran)->imunisasi) == 'tidak' ? 'selected' : '' }}>Tidak Lengkap</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="penimbangan_rutin" class="form-label">Pemeriksaan/penimbangan rutin</label>
            <select id="penimbangan_rutin" name="penimbangan_rutin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="ya" {{ old('penimbangan_rutin', optional($pendaftaran)->penimbangan_rutin) == 'ya' ? 'selected' : '' }}>Ya</option>
                <option value="tidak" {{ old('penimbangan_rutin', optional($pendaftaran)->penimbangan_rutin) == 'tidak' ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
    </div>

    <div class="mb-3 mt-3">
        <label for="kualitas_makanan" class="form-label">Kualitas Makanan</label>
        <input type="text" id="kualitas_makanan" name="kualitas_makanan" class="form-control" required
            value="{{ old('kualitas_makanan', optional($pendaftaran)->kualitas_makanan) }}">
    </div>

    <div class="mb-3">
        <label for="kuantitas_makan" class="form-label">Kuantitas Makanan</label>
        <input type="text" id="kuantitas_makan" name="kuantitas_makan" class="form-control" required
            value="{{ old('kuantitas_makan', optional($pendaftaran)->kuantitas_makan) }}">
    </div>

    <div class="mb-3">
        <label for="kesulitan_makan" class="form-label">Kesulitan Makan</label>
        <select id="kesulitan_makan" name="kesulitan_makan" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="ya" {{ old('kesulitan_makan', optional($pendaftaran)->kesulitan_makan) == 'ya' ? 'selected' : '' }}>Ya</option>
            <option value="tidak" {{ old('kesulitan_makan', optional($pendaftaran)->kesulitan_makan) == 'tidak' ? 'selected' : '' }}>Tidak</option>
        </select>
    </div>
</fieldset>
