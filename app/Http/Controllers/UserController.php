<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengguna = User::role('user')->paginate(5);

        return view('admin.pengguna',compact('pengguna'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pengguna = User::where('name','like',"%".$cari."%")->paginate(10);

        // if($cari !== $pengguna)
        // {
        //     alert()->error('Tidak Ditemukan!', 'Pengguna');

        //     return redirect()->route('user.admin');
        // }

        return view('admin.pengguna',compact('pengguna'));
    }

    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->first();

        return view('profile.index',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits:12',
            'city' => 'required|string',
            'address' => 'required|string|max:100',
            'zipcode' => 'required|string',
        ]);

            $user->email = $request->email;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->zipcode = $request->zipcode;

            $user->update();

        alert()->success('Ubah Profil', 'Sukses');

        return redirect()->route('profile.index');
    }

    public function detailUser($slug)
    {
        $user = User::where('slug',$slug)->first();

        return view('admin.detailPengguna',compact('user'));
    }

    public function tampilForm()
    {
        return view('admin.tambahPengguna');
    }

    public function tambahPengguna(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:12',
            'address' => 'required|string|max:100',
            'city' => 'required|string',
            'zipcode' => 'required|string',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->assignRole('user');

        $user->save();


        alert()->success('Tambah Pengguna', 'Sukses');

        return redirect()->route('user.admin');

    }
}
