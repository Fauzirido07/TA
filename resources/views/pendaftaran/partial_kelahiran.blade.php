<fieldset class="border rounded p-4 mb-4 shadow-sm">
    <legend class="w-auto px-3 fw-bold">B. Riwayat Kelahiran</legend>

    <div class="mb-3">
        <label>Perkembangan Masa Kehamilan</label>
        <textarea name="perkembangan_kehamilan" class="form-control" rows="2">{{ old('perkembangan_kehamilan', optional($pendaftaran)->perkembangan_kehamilan) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Penyakit pada Masa Kehamilan</label>
        <textarea name="penyakit_kehamilan" class="form-control" rows="2">{{ old('penyakit_kehamilan', optional($pendaftaran)->penyakit_kehamilan) }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Usia Kandungan saat Lahir (minggu)</label>
            <input type="number" name="usia_kandungan" value="{{ old('usia_kandungan', optional($pendaftaran)->usia_kandungan) }}" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Proses Kelahiran</label>
            <input type="text" name="proses_kelahiran" value="{{ old('proses_kelahiran', optional($pendaftaran)->proses_kelahiran) }}" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Tempat Kelahiran</label>
            <input type="text" name="tempat_kelahiran" value="{{ old('tempat_kelahiran', optional($pendaftaran)->tempat_kelahiran) }}" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Penolong Kelahiran</label>
            <input type="text" name="penolong_kelahiran" value="{{ old('penolong_kelahiran', optional($pendaftaran)->penolong_kelahiran) }}" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label>Gangguan saat Bayi Lahir</label>
        <textarea name="gangguan_bayi" class="form-control" rows="2">{{ old('gangguan_bayi', optional($pendaftaran)->gangguan_bayi) }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Berat Bayi (kg)</label>
            <input type="text" name="berat_bayi" value="{{ old('berat_bayi', optional($pendaftaran)->berat_bayi) }}" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Panjang Bayi (cm)</label>
            <input type="text" name="panjang_bayi" value="{{ old('panjang_bayi', optional($pendaftaran)->panjang_bayi) }}" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label>Tanda-tanda Kelainan pada Bayi</label>
        <textarea name="tanda_kelainan" class="form-control" rows="2">{{ old('tanda_kelainan', optional($pendaftaran)->tanda_kelainan) }}</textarea>
    </div>
</fieldset>
