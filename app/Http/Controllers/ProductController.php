<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /*
    // Kodingan lama dari dosen (menginput data dummy otomatis)
    public function insert()
    {
        $product = new \App\Models\Product;
        $product->name = 'Produk Baru Dummy';
        $product->category_id = 1; 
        $product->price = 50000;
        $product->stock = 10;
        $product->description = 'Ini adalah deskripsi produk dummy percobaan insert.';
        $product->status = 'tersedia';
        $product->save();

        return "Data produk berhasil ditambahkan";
    }
    */

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:tersedia,habis',
        ]);

        \App\Models\Product::create($request->all());

        return redirect('/products')->with('success', 'Data produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'status'      => 'required|in:tersedia,habis',
        ]);

        $product->update($request->all());

        return redirect('/products')->with('success', "Data produk \"{$product->name}\" berhasil diperbarui!");
    }

    public function destroy(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $name = $product->name;
        $product->delete();

        return redirect('/products')->with('success', "Data produk \"{$name}\" berhasil dihapus!");
    }
    
    public function delete($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('products.delete', compact('product'));
    }
}
