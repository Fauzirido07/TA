<fieldset class="border rounded p-4 mb-4 shadow-sm">
    <legend class="w-auto px-3 fw-bold">H. Data Orang Tua/Wali</legend>

    <h5 class="fw-semibold">Data Ayah</h5>
    @foreach ([
        'nama_ayah' => ['label' => 'Nama Ayah', 'type' => 'text'],
        'umur_ayah' => ['label' => 'Umur Ayah', 'type' => 'number'],
        'agama_ayah' => ['label' => 'Agama Ayah', 'type' => 'text'],
        'status_ayah' => ['label' => 'Status Ayah', 'type' => 'text'],
        'pendidikan_ayah' => ['label' => 'Pendidikan Ayah', 'type' => 'text'],
        'pekerjaan_ayah' => ['label' => 'Pekerjaan Ayah', 'type' => 'text'],
        'alamat_ayah' => ['label' => 'Alamat Ayah', 'type' => 'textarea'],
    ] as $name => $data)
        <div class="mb-3">
            <label for="{{ $name }}">{{ $data['label'] }}</label>
            @if($data['type'] === 'textarea')
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control" required>{{ old($name, optional($pendaftaran)->$name) }}</textarea>
            @else
                <input
                    id="{{ $name }}"
                    type="{{ $data['type'] }}"
                    name="{{ $name }}"
                    value="{{ old($name, optional($pendaftaran)->$name) }}"
                    class="form-control"
                    {{ $name !== 'alamat_ayah' ? 'required' : '' }}>
            @endif
        </div>
    @endforeach

    <h5 class="fw-semibold">Data Ibu</h5>
    @foreach ([
        'nama_ibu' => ['label' => 'Nama Ibu', 'type' => 'text'],
        'umur_ibu' => ['label' => 'Umur Ibu', 'type' => 'number'],
        'agama_ibu' => ['label' => 'Agama Ibu', 'type' => 'text'],
        'status_ibu' => ['label' => 'Status Ibu', 'type' => 'text'],
        'pendidikan_ibu' => ['label' => 'Pendidikan Ibu', 'type' => 'text'],
        'pekerjaan_ibu' => ['label' => 'Pekerjaan Ibu', 'type' => 'text'],
        'alamat_ibu' => ['label' => 'Alamat Ibu', 'type' => 'textarea'],
    ] as $name => $data)
        <div class="mb-3">
            <label for="{{ $name }}">{{ $data['label'] }}</label>
            @if($data['type'] === 'textarea')
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control" required>{{ old($name, optional($pendaftaran)->$name) }}</textarea>
            @else
                <input
                    id="{{ $name }}"
                    type="{{ $data['type'] }}"
                    name="{{ $name }}"
                    value="{{ old($name, optional($pendaftaran)->$name) }}"
                    class="form-control"
                    {{ $name !== 'alamat_ibu' ? 'required' : '' }}>
            @endif
        </div>
    @endforeach

    <h5 class="fw-semibold">Data Wali (Jika Ada)</h5>
    @foreach ([
        'nama_wali' => ['label' => 'Nama Wali', 'type' => 'text'],
        'umur_wali' => ['label' => 'Umur Wali', 'type' => 'number'],
        'agama_wali' => ['label' => 'Agama Wali', 'type' => 'text'],
        'status_perkawinan_wali' => ['label' => 'Status Perkawinan Wali', 'type' => 'text'],
        'pendidikan_wali' => ['label' => 'Pendidikan Wali', 'type' => 'text'],
        'pekerjaan_wali' => ['label' => 'Pekerjaan Wali', 'type' => 'text'],
        'alamat_wali' => ['label' => 'Alamat Wali', 'type' => 'textarea'],
        'hubungan_wali' => ['label' => 'Hubungan dengan Anak', 'type' => 'text'],
    ] as $name => $data)
        <div class="mb-3">
            <label for="{{ $name }}">{{ $data['label'] }}</label>
            @if($data['type'] === 'textarea')
                <textarea id="{{ $name }}" name="{{ $name }}" class="form-control">{{ old($name, optional($pendaftaran)->$name) }}</textarea>
            @else
                <input
                    id="{{ $name }}"
                    type="{{ $data['type'] }}"
                    name="{{ $name }}"
                    value="{{ old($name, optional($pendaftaran)->$name) }}"
                    class="form-control">
            @endif
        </div>
    @endforeach
</fieldset>
