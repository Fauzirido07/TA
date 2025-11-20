@extends('layouts.apps')

@section('title', 'Manajemen Guru & Staff')

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="mb-4 text-end">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                     ➕ Tambah Guru
                </a>

         </div> 
         
         <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">List</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                                <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th style="width: 25%;">Nama</th>
                        <th style="width: 25%;">Email</th>
                        <th style="width: 25%;">Peran</th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">{{ ucfirst($user->role) }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                {{-- Ubah Peran --}}
                                <form action="{{ route('admin.updateRole') }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <select name="role" class="form-select form-select-sm me-2">
                                        <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                                        <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                                    </select>
                                    <button class="btn btn-sm btn-success">Simpan</button>
                                </form>

                                {{-- Hapus User --}}
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                                 </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                 </div>
    
            </div>
        </div>
    </div>

</div>
@endsection
