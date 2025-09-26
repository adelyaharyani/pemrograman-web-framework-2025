<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        // view untuk daftar produk
        return view('product'); 
    }

    /**
     * Menampilkan form tambah produk baru.
     */
    public function create()
    {
        return view('products-create');
    }

    /**
     * Simpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        // sementara hanya return, nanti bisa disimpan ke database
        return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail produk berdasarkan ID.
     */
    public function show($id)
    {
        // view detail produk
        return view('products-show', ['id' => $id]);
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(string $id)
    {
        return view('products-edit', ['id' => $id]);
    }

    /**
     * Update produk berdasarkan ID.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        return back()->with('success', "Produk dengan ID $id berhasil diupdate!");
    }

    /**
     * Hapus produk berdasarkan ID.
     */
    public function destroy(string $id)
    {
        return back()->with('success', "Produk dengan ID $id berhasil dihapus!");
    }
}
