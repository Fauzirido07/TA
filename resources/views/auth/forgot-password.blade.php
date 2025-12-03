@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="min-height: 70vh;">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-3">Reset Password</h4>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" class="form-control mb-3" name="email" required>

            <button class="btn btn-primary w-100">Kirim Link Reset</button>
        </form>
    </div>
</div>
@endsection
