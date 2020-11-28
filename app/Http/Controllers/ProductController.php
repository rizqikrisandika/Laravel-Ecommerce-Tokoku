<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $produk = Product::all();

        return view('admin.produk',compact('produk'));
    }

    public function tambahForm()
    {

        $kategori = Category::all();

        return view('admin.tambahProduk',compact('kategori'));
    }

    public function detailProduk($id)
    {
        $produk = Product::findOrFail($id);

        return view('admin.detailProduk',compact('produk'));
    }

    public function tambahProduk(Request $request)
    {

        $request->validate([
            'name'=>'required|string',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'quantity'=>'required',
            'desc'=>'required'
        ]);


        $imageExtension = $request->image->extension();
        $imageName = 'img_'.time().'.'.$imageExtension;
        $imagePath = $request->image->storeAs('images',$imageName,'public');

        $user_id = Auth::user()->id;

        $produk = new Product();
        $produk->name = $request->name;
        $produk->price = $request->price;
        $produk->category_id = $request->category_id;
        $produk->image = $imagePath;
        $produk->quantity = $request->quantity;
        $produk->desc = $request->desc;
        $produk->user_id = $user_id;

        $produk->save();

        return redirect()->route('produk.admin');

    }

    public function editForm($id)
    {
        $produk = Product::findOrfail($id);
        $kategori = Category::all();

        return view('admin.editProduk',compact('produk','kategori'));
    }

    public function updateProduk(Request $request,$id)
    {

        $request->validate([
            'name'=>'required|string',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'',
            'quantity'=>'required',
            'desc'=>'required'
        ]);

        $produk = Product::findOrFail($id);

        if($request->image)
        {

            $imageExtension = $request->image->extension();
            $imageName = 'img_'.time().'.'.$imageExtension;
            $imagePath = $request->image->storeAs('images',$imageName,'public');

            $produk->name = $request->name;
            $produk->price = $request->price;
            $produk->category_id = $request->category_id;
            $produk->image = $imagePath;
            $produk->quantity = $request->quantity;
            $produk->desc = $request->desc;

            $produk->save();

        }else{

            $produk->name = $request->name;
            $produk->price = $request->price;
            $produk->category_id = $request->category_id;
            $produk->quantity = $request->quantity;
            $produk->desc = $request->desc;

            $produk->save();
        }

        return redirect()->route('produk.admin');
    }

    public function hapusProduk($id)
    {
        $produk = Product::where('id',$id)->first();
        Storage::disk('public')->delete($produk->image);

        Product::where('id',$id)->delete();

        return redirect()->route('produk.admin');
    }
}
