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

    public function tambah()
    {

        $kategori = Category::all();

        return view('admin.tambahProduk',compact('kategori'));
    }

    public function tambahProduk(Request $request)
    {

        // if($request->hasFile('image'))
        // {
        //     if($request->file('image')->isValid())
        //     {
        //         $request->validate([
        //             'name'=>'required|string',
        //             'price'=>'required|numeric',
        //             'category_id'=>'required|numeric',
        //             'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        //             'quantity'=>'required|numeric',
        //             'desc'=>'required'
        //         ]);

        //         $uploader = Auth::user()->id;
        //         $extension = $request->image->extension();
        //         $imageName = 'img_'.date('dmyHis').'.'.$extension;
        //         $request->image->storeAs('public/images',$imageName);
        //         $imagePath =  Storage::url('public/images', $imageName);

        //         Product::create([
        //             'name' => $request->name,
        //             'price' => $request->price,
        //             'category_id' => $request->category_id,
        //             'image' => $imagePath,
        //             'quantity' => $request->quantity,
        //             'desc' => $request->desc,
        //             'user_id' => $uploader
        //         ]);

        //         return redirect()->route('produk.admin');
        //     }
        // }

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
}
