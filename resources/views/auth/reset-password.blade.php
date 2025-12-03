@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="min-height: 70vh;">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-3">Buat Password Baru</h4>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            
            <label>Email</label>
            <input type="email" name="email" class="form-control mb-3" required>

            <label>Password Baru</label>
            <input type="password" name="password" class="form-control mb-3" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control mb-4" required>

            <button class="btn btn-primary w-100">Reset Password</button>
        </form>
    </div>
</div>
@endsection
