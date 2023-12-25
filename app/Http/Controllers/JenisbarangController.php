<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenisbarang;

class JenisbarangController extends Controller
{
    /**
     * Menampilkan daftar jenis barang.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
        {
            $jenisbarang = Jenisbarang::all();
            //return view('jenisbarang.index', ['jenisbarang' => $jenisbarang]);
            return response()->json(['data'=> $jenisbarang]);
        }

    /**
     * Menampilkan formulir untuk membuat jenis barang baru.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('jenisbarang.create');
    }

    /**
     * Menyimpan jenis barang yang baru dibuat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|unique:jenis_barangs|max:255',
        ]);

        Jenisbarang::create($request->all());

        return redirect()->route('jenisbarang.index')
            ->with('success', 'Jenis barang berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail jenis barang.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $jenisbarang = Jenisbarang::findOrFail($id);
        return view('jenisbarang.show', ['jenisbarang' => $jenisbarang]);
    }

    /**
     * Menampilkan formulir untuk mengedit jenis barang.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $jenisbarang = Jenisbarang::findOrFail($id);
        return view('jenisbarang.edit', ['jenisbarang' => $jenisbarang]);
    }

    /**
     * Menyimpan perubahan pada jenis barang yang diedit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|unique:jenis_barangs|max:255',
        ]);

        $jenisbarang = Jenisbarang::findOrFail($id);
        $jenisbarang->update($request->all());

        return redirect()->route('jenisbarang.index')
            ->with('success', 'Jenis barang berhasil diperbarui.');
    }

    /**
     * Menghapus jenis barang.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $jenisbarang = Jenisbarang::findOrFail($id);
        $jenisbarang->delete();

        return redirect()->route('jenisbarang.index')
            ->with('success', 'Jenis barang berhasil dihapus.');
    }
}
