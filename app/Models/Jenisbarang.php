<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbarang extends Model
{
    use HasFactory;


    protected $fillable = [
        'id','jenis'
    ];

    protected $table = 'jenis_barangs'; // Tentukan nama tabel

    protected $primaryKey = 'id_jenis'; // Tentukan nama primary key

    // Jika tidak menggunakan timestamps (created_at dan updated_at)
    public $timestamps = false;


    // Jika ada kolom yang sebaiknya disembunyikan ketika menyertakan model ke dalam array atau JSON
    protected $hidden = [];

    // Jika ada mutator atau akses yang harus dilakukan terhadap kolom tertentu
    // Misalnya, untuk mengubah format tampilan kolom tertentu
    protected $casts = [];
}
