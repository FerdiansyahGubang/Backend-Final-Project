<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatbarang extends Model
{
    use HasFactory;

    protected $table = 'riwayat'; // Sesuaikan dengan nama tabel yang Anda gunakan

    protected $fillable = [
        'id_user',
        'nama_user',
        'id_barang',
        'nama_barang',
        'jenis_barang',
        'stock_barang',
        'date',
    ];

    // Jika Anda tidak ingin menggunakan kolom created_at dan updated_at, Anda bisa menonaktifkannya
    public $timestamps = false;

    // Relasi dengan tabel Users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi dengan tabel Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
