@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🧩 Ubah Form Asesmen</h2>

    <a href="{{ route('admin.ubah_asesmen.create') }}" class="btn btn-primary mb-3">➕ Tambah Form Baru</a>
    <a href="{{ route('admin.ubah_asesmen.create_kategori') }}" class="btn btn-primary mb-3">➕ Tambah Kategori Baru</a>
    @foreach($headers->sortBy('order') as $header)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $header->title }}</strong>
            </div>

            <div class="card-body">
                <table class="table table-bordered mb-3 align-middle">
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
                        @forelse($header->formAsesmen->sortBy('order') as $index => $form)
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
                                        <a href="{{ route('admin.ubah_asesmen.edit', $form->id) }}" class="btn btn-sm btn-warning">
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
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada pertanyaan pada kategori ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
@endsection
