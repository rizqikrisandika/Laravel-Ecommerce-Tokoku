<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.produk');
    }

    public function tambah()
    {
        return view('admin.tambahProduk');
    }

    public function tambahProduk(Request $request, $produk)
    {
        $produk->validate([
            'nama'=>'required|string',
            'harga'=>'required|numeric',
            'kategori'=>'required|in:Handphone,Laptop,Komputer,Aksesoris,Lain-lain',
            'gambar'=>'required|image'
        ]);


    }
}
