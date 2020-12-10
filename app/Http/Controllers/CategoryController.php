<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Category::paginate(5);
        return view('admin.category',compact('kategori'));
    }

    public function tambahCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $imageExtension = $request->image->extension();
        $imageName = 'img_'.time().'.'.$imageExtension;
        $imagePath = $request->image->storeAs('images',$imageName,'public');

        $kategori = new Category();
        $kategori->name = $request->name;
        $kategori->image = $imagePath;
        $kategori->save();

        alert()->success('Tambah Kategori', 'Sukses');

        return redirect()->route('tampilkategori.admin');
    }

    public function editForm($id)
    {
        $kategori = Category::findOrfail($id);

        return view('admin.editCategory',compact('kategori'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $kategori = Category::findOrfail($id);

        if($request->image)
        {

            $imageExtension = $request->image->extension();
            $imageName = 'img_'.time().'.'.$imageExtension;
            $imagePath = $request->image->storeAs('images',$imageName,'public');

            Storage::disk('public')->delete($kategori->image);

            $kategori->name = $request->name;
            $kategori->image = $imagePath;

            $kategori->save();

        }else{

            $kategori->name = $request->name;

            $kategori->save();
        }


        alert()->success('Ubah Kategori', 'Sukses');

        return redirect()->route('tampilkategori.admin');
    }

    public function hapusCategory($id)
    {
        $kategori = Category::where('id',$id)->first();
        Storage::disk('public')->delete($kategori->image);

        Category::where('id',$id)->delete();

        alert()->error('Hapus Kategori', 'Sukses');

        return redirect()->route('tampilkategori.admin');
    }

}
