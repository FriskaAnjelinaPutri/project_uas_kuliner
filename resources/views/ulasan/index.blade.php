@extends('layouts.template')

@section('title', 'Data Ulasan')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Ulasan</h2>
        <a href="{{ route('ulasan.create') }}" class="btn btn-primary">➕ Tambah Ulasan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tempat Makan</th>
                <th>Nama Pengulas</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Tanggal Ulasan</th>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($ulasans as $index => $ulasan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ulasan->tempatMakan->nama_tempat ?? '-' }}</td>
                    <td>{{ $ulasan->nama_pengulas }}</td>
                    <td>{{ $ulasan->rating }}</td>
                    <td>{{ $ulasan->komentar }}</td>
                    <td>{{ \Carbon\Carbon::parse($ulasan->tanggal_ulasan)->translatedFormat('d F Y') }}</td>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <td>
                                <a href="{{ route('ulasan.edit', $ulasan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        @endif
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="@auth {{ Auth::user()->role === 'admin' ? 7 : 6 }} @else 6 @endauth" class="text-center">Belum ada data ulasan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
