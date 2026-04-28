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

    public function update($id)
    {
       
        $product = \App\Models\Product::find($id);
        if ($product) {
            $product->name = 'Produk Update Dummy';
            $product->price = 75000;
            $product->save();
            return "Data produk dengan ID {$id} berhasil diupdate!";
        }
        return "Data produk dengan ID {$id} tidak ditemukan.";
    }

    public function delete($id)
    {
        
        $product = \App\Models\Product::find($id);
        if ($product) {
            $product->delete();
            return "Data produk dengan ID {$id} berhasil dihapus dari database!";
        }
        return "Data produk dengan ID {$id} tidak ditemukan.";
    }
}
