<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index()
    {
        return view('products');
    }

    public function create()
    {
        return view('master-data.product-master.product-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:0',
            'producer' => 'required|string|max:255',
        ]);

       
        Product::create($validatedData);

        return redirect()->route('product-create')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        return view('products-show', ['id' => $id]);
    }

    public function edit(string $id)
    {
        return view('products-edit', ['id' => $id]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        return back()->with('success', "Produk dengan ID $id berhasil diupdate!");
    }

    public function destroy(string $id)
    {
        return back()->with('success', "Produk dengan ID $id berhasil dihapus!");
    }
}
