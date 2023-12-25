<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs'; // Nama tabel di database
    protected $primaryKey = 'id_barang'; // Nama kolom primary key

    protected $fillable = [
        'id_user',
        'nama_barang',
        'stock_barang',
        'jenis_barang',
        // Tambahkan kolom lain yang ingin Anda masukkan secara massal
    ];

    // Relasi ke model User (asumsi nama model User adalah User)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke model Riwayat (asumsi nama model Riwayat adalah Riwayat)
    public function riwayats()
    {
        return $this->hasMany(Riwayatbarang::class, 'id_barang', 'id_barang');
    }
}
