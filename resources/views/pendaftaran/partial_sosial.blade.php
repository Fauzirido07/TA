<fieldset class="border p-4 mb-4">
    <legend class="w-auto px-2">F. Perkembangan Sosial</legend>

    <div class="mb-3">
        <label for="hubungan_saudara">Hubungan dengan saudara</label>
        <input type="text" id="hubungan_saudara" name="hubungan_saudara" class="form-control" required
            value="{{ old('hubungan_saudara', optional($pendaftaran)->hubungan_saudara) }}">
    </div>

    <div class="mb-3">
        <label for="hubungan_teman">Hubungan dengan teman</label>
        <input type="text" id="hubungan_teman" name="hubungan_teman" class="form-control" required
            value="{{ old('hubungan_teman', optional($pendaftaran)->hubungan_teman) }}">
    </div>

    <div class="mb-3">
        <label for="hubungan_orangtua">Hubungan dengan orang tua</label>
        <input type="text" id="hubungan_orangtua" name="hubungan_orangtua" class="form-control" required
            value="{{ old('hubungan_orangtua', optional($pendaftaran)->hubungan_orangtua) }}">
    </div>

    <div class="mb-3">
        <label for="hobi">Hobi</label>
        <input type="text" id="hobi" name="hobi" class="form-control" required
            value="{{ old('hobi', optional($pendaftaran)->hobi) }}">
    </div>
</fieldset>
