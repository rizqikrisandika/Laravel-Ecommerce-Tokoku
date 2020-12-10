<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $produk = Product::orderBy('created_at','desc')->take(8)->get();
        $kategori = Category::all();

        return view('home.index',compact('produk','kategori'));
    }

    public function produk()
    {
        $produk =  Product::orderBy('created_at','desc')->paginate(12);
        $kategori = Category::all();

        return view('produk.index',compact('produk','kategori'));
    }

    public function show($id)
    {
        $produk = Product::findOrFail($id);

        return view('produk.detail', compact('produk'));
    }
}
