@extends('layouts.template')

@section('title', 'Data Tempat Makan')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Tempat Makan</h2>
        @auth
            <a href="{{ route('tempat-makan.create') }}" class="btn btn-primary">➕ Tambah Tempat Makan</a>
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
                <th>Nama Tempat</th>
                <th>Kategori</th>
                <th>Alamat</th>
                <th>Jam Operasional</th>
                <th>No Telepon</th>
                @auth
                    <th>Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($tempatMakans as $index => $tm)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tm->nama_tempat }}</td>
                    <td>{{ $tm->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $tm->alamat }}</td>
                    <td>{{ $tm->jam_buka }} - {{ $tm->jam_tutup }}</td>
                    <td>{{ $tm->no_telepon }}</td>
                    @auth
                        <td>
                            {{-- Semua user bisa lihat tombol edit & hapus --}}
                            <a href="{{ route('tempat-makan.edit', $tm->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tempat-makan.destroy', $tm->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="@auth 7 @else 6 @endauth" class="text-center">Belum ada data tempat makan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
