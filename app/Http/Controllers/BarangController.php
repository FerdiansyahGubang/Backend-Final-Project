<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Menampilkan semua data barang
    public function index()
    {
        $barangs = Barang::all();
        //return view('barangs.index', compact('barangs'));
        return response()->json(['data'=> $barangs]);
    }

    // Menampilkan formulir untuk menambahkan barang baru
    public function create()
    {
        return view('barangs.create');
    }

    // Menyimpan barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'nama_barang' => 'required',
            'stock_barang' => 'required|integer',
            'jenis_barang' => 'required',
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    // Menampilkan detail barang
    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    // Menampilkan formulir untuk mengedit barang
    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    // Mengupdate barang di database
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'id_user' => 'required',
            'nama_barang' => 'required',
            'stock_barang' => 'required|integer',
            'jenis_barang' => 'required',
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        $barang->update($request->all());

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil diperbarui!');
    }

    // Menghapus barang dari database
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil dihapus!');
    }
}
