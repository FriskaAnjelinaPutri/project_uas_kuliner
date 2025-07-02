@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
    <h1 class="fw-bold text-primary">
        Selamat Datang di KulinerApp! 🎉
    </h1>
        <p class="lead">Nikmati pilihan tempat makan dan nongkrong terbaik!</p>
    </div>

    <div class="row">
        <!-- Gambar 1 -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/cafe1.jpg') }}" class="card-img-top" alt="Cafe 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Cafe Kopi Kita</h5>
                </div>
            </div>
        </div>

        <!-- Gambar 2 -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/cafe2.jpg') }}" class="card-img-top" alt="Cafe 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Tempat Nongkrong Hits</h5>
                </div>
            </div>
        </div>

        <!-- Gambar 3 -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/cafe3.jpg') }}" class="card-img-top" alt="Cafe 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Kedai Santai</h5>
                </div>
            </div>
        </div>
        <!-- Gambar 4 -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/cafe4.jpg') }}" class="card-img-top" alt="Cafe 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Kedai Santai</h5>
                </div>
            </div>
        </div>
        <!-- Gambar 5 -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/cafe5.jpg') }}" class="card-img-top" alt="Cafe 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Kedai Makan</h5>
                </div>
            </div>
        </div>
        <!-- Gambar 5 -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('images/cafe6.jpg') }}" class="card-img-top" alt="Cafe 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Kedai Santai</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
