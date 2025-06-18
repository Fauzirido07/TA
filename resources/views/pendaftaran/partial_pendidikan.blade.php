<fieldset class="border rounded p-4 mb-4 shadow-sm">
    <legend class="w-auto px-3 fw-bold">G. Perkembangan Pendidikan</legend>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="masuk_tk_umur">Masuk TK umur (tahun)</label>
            <input type="number" id="masuk_tk_umur" name="masuk_tk_umur" value="{{ old('masuk_tk_umur', optional($pendaftaran)->masuk_tk_umur) }}" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lama_pendidikan_tk">Lama pendidikan di TK (tahun)</label>
            <input type="number" id="lama_pendidikan_tk" name="lama_pendidikan_tk" value="{{ old('lama_pendidikan_tk', optional($pendaftaran)->lama_pendidikan_tk) }}" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="kesulitan_tk">Kesulitan selama TK</label>
        <textarea id="kesulitan_tk" name="kesulitan_tk" class="form-control" required>{{ old('kesulitan_tk', optional($pendaftaran)->kesulitan_tk) }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="masuk_sd_umur">Masuk SD umur (tahun)</label>
            <input type="number" id="masuk_sd_umur" name="masuk_sd_umur" value="{{ old('masuk_sd_umur', optional($pendaftaran)->masuk_sd_umur) }}" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="kesulitan_sd">Kesulitan selama SD</label>
            <textarea id="kesulitan_sd" name="kesulitan_sd" class="form-control" required>{{ old('kesulitan_sd', optional($pendaftaran)->kesulitan_sd) }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="pernah_tidak_naik">Pernah tidak naik kelas</label>
            <select id="pernah_tidak_naik" name="pernah_tidak_naik" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="ya" {{ old('pernah_tidak_naik', optional($pendaftaran)->pernah_tidak_naik) == 'ya' ? 'selected' : '' }}>Ya</option>
                <option value="tidak" {{ old('pernah_tidak_naik', optional($pendaftaran)->pernah_tidak_naik) == 'tidak' ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="mapel_sulit">Mata Pelajaran Sulit</label>
            <input type="text" id="mapel_sulit" name="mapel_sulit" value="{{ old('mapel_sulit', optional($pendaftaran)->mapel_sulit) }}" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="mapel_disukai">Mata Pelajaran Disenangi</label>
        <input type="text" id="mapel_disukai" name="mapel_disukai" value="{{ old('mapel_disukai', optional($pendaftaran)->mapel_disukai) }}" class="form-control" required>
    </div>
</fieldset>
