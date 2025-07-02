@extends('layouts.template')

@section('title', 'Data Promo')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Promo</h2>
        @auth
            <a href="{{ route('promo.create') }}" class="btn btn-primary">➕ Tambah Promo</a>
        @endauth
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul Promo</th>
                <th>Tempat Makan</th>
                <th>Periode</th>
                <th>Deskripsi</th>
                @auth
                    <th>Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($promos as $index => $promo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $promo->judul_promo }}</td>
                    <td>{{ $promo->tempatMakan->nama_tempat ?? '-' }}</td>
                    <td>{{ $promo->mulai_promo }} s/d {{ $promo->akhir_promo }}</td>
                    <td>{{ $promo->deskripsi_promo }}</td>
                    @auth
                        <td>
                            <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-sm btn-warning"
                                onclick="event.preventDefault(); document.getElementById('edit-form-{{ $promo->id }}').submit();">
                                Edit
                            </a>

                            <form id="edit-form-{{ $promo->id }}" action="{{ route('promo.edit', $promo->id) }}" method="GET" style="display: none;"></form>

                            <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus promo ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="@auth 6 @else 5 @endauth" class="text-center">Belum ada data promo.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
