<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $produk = Product::orderBy('created_at','desc')->take(4)->get();

        return view('home.index',compact('produk'));
    }
}
