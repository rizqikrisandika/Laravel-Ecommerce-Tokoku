<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Category::all();
        return view('admin.category',compact('kategori'));
    }

    public function tambahCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create($request->all());

        return redirect()->route('tampilkategori.admin');
    }

    public function editForm($id)
    {
        $product = Product::findOrfail($id);

        return view('');
    }
}
