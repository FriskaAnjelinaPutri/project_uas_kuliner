@extends('layouts.template')

@section('title', 'Login')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Login Sistem</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <small>{{ $errors->first() }}</small>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">🔐 Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
