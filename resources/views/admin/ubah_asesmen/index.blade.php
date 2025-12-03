@extends('layouts.apps')

@section('title', 'Ubah Form Asesmen')

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="mb-4">

    <a href="{{ route('admin.ubah_asesmen.create') }}" class="btn btn-primary mb-3">➕ Tambah Form Baru</a>
    <a href="{{ route('admin.ubah_asesmen.create_kategori') }}" class="btn btn-primary mb-3">➕ Tambah Kategori Baru</a>
    @foreach($headers->sortBy('order') as $header)
        <div class="card mb-3">
            <div class="card-header d-flex">
                <strong>{{ $header->title }}</strong>
                {{-- Tombol Hapus --}}
                <div class="ml-auto">
                <a href="{{ route('admin.ubah_asesmen.edit_kategori', $header->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                <form action="{{ route('admin.ubah_asesmen.destroy_kategori', $header->id) }}" method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" class="d-inline">
                    @csrf
                     @method('DELETE')
                    <button class="btn btn-sm btn-danger">🗑 Hapus</button>
                 </form>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered mb-3 align-middle dataTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Pertanyaan</th>
                            <th style="width: 150px;">Tipe</th>
                            <th>Order</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($header->formAsesmen->sortBy('order') as $index => $form)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $form->question }}</td>
                                <td class="text-center">
                                    @if($form->question_type === 1)
                                        Number
                                    @elseif($form->question_type === 2)
                                        Text Area
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">{{ $form->order }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('admin.ubah_asesmen.edit', $form->id) }}" class="btn btn-sm btn-primary">
                                            ✏️ Edit
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('admin.ubah_asesmen.destroy', $form->id) }}" method="POST" 
                                              onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">🗑 Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    </div>
</div>
</div>
@endsection
