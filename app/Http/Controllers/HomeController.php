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
        $kategori = Category::withCount('product')->get();

        return view('produk.index',compact('produk','kategori'));
    }

    public function show($slug)
    {
        $produk = Product::where('slug',$slug)->first();

        return view('produk.detail', compact('produk'));
    }

    public function kategori($slug)
    {
        $all = Category::all()->count();
        $kategori = Category::withCount('product')->get();

        $produk = Category::where('slug',$slug)->first()->product()->orderBy('created_at','desc')->paginate(12);

        return view('produk.index',compact('produk','kategori','all'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $produk = Product::where('name','like',"%".$cari."%")->paginate(12);
        $kategori = Category::withCount('product')->get();

        // if($cari !== $produk)
        // {
        //     alert()->error('Tidak Ditemukan!', 'Produk');

        //     return redirect()->route('produk.admin');
        // }

        return view('produk.index',compact('produk','kategori'));
    }
}
