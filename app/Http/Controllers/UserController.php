<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;

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
            'phone' => 'required|string|max:12',
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
}
