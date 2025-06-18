<fieldset class="border p-3 mb-4">
    <legend class="w-auto px-2">A. Identitas Anak</legend>

    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" 
            value="{{ old('nama_lengkap', optional($pendaftaran)->nama_lengkap) }}" 
            class="form-control" required>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" 
                value="{{ old('tempat_lahir', optional($pendaftaran)->tempat_lahir) }}" 
                class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                value="{{ old('tanggal_lahir', optional($pendaftaran)->tanggal_lahir) }}" 
                class="form-control" required>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                <option value="L" {{ old('jenis_kelamin', optional($pendaftaran)->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', optional($pendaftaran)->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" id="agama" name="agama" 
                value="{{ old('agama', optional($pendaftaran)->agama) }}" 
                class="form-control" required>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6">
            <label for="anak_ke" class="form-label">Anak Ke-</label>
            <input type="number" id="anak_ke" name="anak_ke" 
                value="{{ old('anak_ke', optional($pendaftaran)->anak_ke) }}" 
                class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
            <input type="number" id="jumlah_saudara" name="jumlah_saudara" 
                value="{{ old('jumlah_saudara', optional($pendaftaran)->jumlah_saudara) }}" 
                class="form-control" required>
        </div>
    </div>

    <div class="mb-3 mt-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat', optional($pendaftaran)->alamat) }}</textarea>
    </div>
</fieldset>
