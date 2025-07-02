<?php

namespace App\Http\Controllers;

use App\Models\TempatMakan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempatMakanController extends Controller
{
    // Tampilkan semua tempat makan
    public function index()
    {
        $tempatMakans = TempatMakan::with('kategori', 'user')->get();
        return view('tempat_makan.index', compact('tempatMakans'));
    }

    // Form tambah tempat makan
    public function create()
    {
        $kategoris = Kategori::all();
        return view('tempat_makan.create', compact('kategoris'));
    }

    // Simpan tempat makan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'no_telepon' => 'required',
            'kategori_id' => 'required|exists:friska_kategoris,id',
        ]);

        TempatMakan::create([
            'nama_tempat' => $request->nama_tempat,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'no_telepon' => $request->no_telepon,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tempat-makan.index')->with('success', 'Tempat makan berhasil ditambahkan.');
    }

    // Form edit tempat makan
    public function edit($id)
    {
        $tempatMakan = TempatMakan::findOrFail($id);

        if (Auth::user()->role === 'pemilik' && $tempatMakan->user_id !== Auth::id()) {
            return redirect()->route('tempat-makan.index')->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $kategoris = Kategori::all();
        return view('tempat_makan.edit', compact('tempatMakan', 'kategoris'));
    }

    // Update data tempat makan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'no_telepon' => 'required',
            'kategori_id' => 'required|exists:friska_kategoris,id',
        ]);

        $tempatMakan = TempatMakan::findOrFail($id);

        if (Auth::user()->role === 'pemilik' && $tempatMakan->user_id !== Auth::id()) {
            return redirect()->route('tempat-makan.index')->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $tempatMakan->update($request->all());

        return redirect()->route('tempat-makan.index')->with('success', 'Tempat makan berhasil diperbarui.');
    }
    public function show($id)
    {
        $tempatMakan = TempatMakan::with('kategori', 'user')->findOrFail($id);
        return view('tempat_makan.show', compact('tempatMakan'));
    }


    // Hapus data tempat makan
    public function destroy($id)
    {
        $tempatMakan = TempatMakan::findOrFail($id);

        if (Auth::user()->role === 'pemilik' && $tempatMakan->user_id !== Auth::id()) {
            return redirect()->route('tempat-makan.index')->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $tempatMakan->delete();

        return redirect()->route('tempat-makan.index')->with('success', 'Tempat makan berhasil dihapus.');
    }
}
