<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatMakan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'friska_tempat_makans';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'kategori_id',
        'nama_tempat',
        'deskripsi',
        'alamat',
        'jam_buka',
        'jam_tutup',
        'no_telepon',
        'user_id',
    ];

    // Relasi ke tabel kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke user (pemilik)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke promo
    public function promos()
    {
        return $this->hasMany(Promo::class);
    }

    // Relasi ke ulasan
    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
}
