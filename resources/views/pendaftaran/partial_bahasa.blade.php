<fieldset class="border p-3 mb-4">
    <legend class="w-auto px-2">E. Perkembangan Bahasa</legend>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="umur_celoteh" class="form-label">Mulai berceloteh umur (bulan)</label>
            <input type="number" id="umur_celoteh" name="umur_celoteh" class="form-control" required
                value="{{ old('umur_celoteh', optional($pendaftaran)->umur_celoteh) }}">
        </div>
        <div class="col-md-6">
            <label for="umur_suku_kata" class="form-label">Mengucapkan satu suku kata bermakna umur (bulan)</label>
            <input type="number" id="umur_suku_kata" name="umur_suku_kata" class="form-control" required
                value="{{ old('umur_suku_kata', optional($pendaftaran)->umur_suku_kata) }}">
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6">
            <label for="umur_kata_bermakna" class="form-label">Berbicara satu kata bermakna umur (bulan)</label>
            <input type="number" id="umur_kata_bermakna" name="umur_kata_bermakna" class="form-control" required
                value="{{ old('umur_kata_bermakna', optional($pendaftaran)->umur_kata_bermakna) }}">
        </div>
        <div class="col-md-6">
            <label for="umur_kalimat_sederhana" class="form-label">Berbicara kalimat lengkap sederhana umur (bulan)</label>
            <input type="number" id="umur_kalimat_sederhana" name="umur_kalimat_sederhana" class="form-control" required
                value="{{ old('umur_kalimat_sederhana', optional($pendaftaran)->umur_kalimat_sederhana) }}">
        </div>
    </div>
</fieldset>
