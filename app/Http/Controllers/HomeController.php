<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $produk = Product::all();

        return view('home.index',compact('produk'));
    }
}
