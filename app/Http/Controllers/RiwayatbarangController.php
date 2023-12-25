<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayatbarang;

class RiwayatbarangController extends Controller
{
    /**
     * Menampilkan semua riwayat barang.
     */
    public function index()
    {
        $riwayats = Riwayatbarang::all();
        //return view('riwayat.index', ['riwayats' => $riwayats]);
        return response()->json(['data'=> $riwayats]);
    }

    /**
     * Menampilkan formulir untuk membuat riwayat barang baru.
     */
    public function create()
    {
        // Logic untuk menampilkan formulir pembuatan riwayat barang baru
    }

    /**
     * Menyimpan riwayat barang baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Proses penyimpanan riwayat barang baru ke database
        Riwayatbarang::create([
            'id_user' => $request->input('id_user'),
            'nama_user' => $request->input('nama_user'),
            'id_barang' => $request->input('id_barang'),
            'nama_barang' => $request->input('nama_barang'),
            'jenis_barang' => $request->input('jenis_barang'),
            'stock_barang' => $request->input('stock_barang'),
            'date' => now(), // Set waktu saat ini
        ]);

        // Redirect atau kembalikan response sesuai kebutuhan
    }

    /**
     * Menampilkan detail riwayat barang.
     */
    public function show($id)
    {
        $riwayat = Riwayatbarang::findOrFail($id);
        return view('riwayat.show', ['riwayat' => $riwayat]);
    }

    /**
     * Menampilkan formulir untuk mengedit riwayat barang.
     */
    public function edit($id)
    {
        $riwayat = Riwayatbarang::findOrFail($id);
        // Logic untuk menampilkan formulir pengeditan riwayat barang
    }

    /**
     * Memperbarui riwayat barang yang ada di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari formulir
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Proses pembaruan riwayat barang di database
        $riwayat = Riwayatbarang::findOrFail($id);
        $riwayat->update([
            // Atur kolom yang akan diperbarui sesuai kebutuhan
        ]);

        // Redirect atau kembalikan response sesuai kebutuhan
    }

    /**
     * Menghapus riwayat barang dari database.
     */
    public function destroy($id)
    {
        $riwayat = Riwayatbarang::findOrFail($id);
        $riwayat->delete();

        // Redirect atau kembalikan response sesuai kebutuhan
    }
}
