<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class DaftarController extends Controller
{
    public function index()
    {
        return view('login.daftar');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'min:8|required',
            'repassword' => 'min:8|required|same:password'
        ]);

        $daftar = new User();

        $daftar->name = $request->nama;
        $daftar->email = $request->email;
        $daftar->password = Hash::make($request->password);

        $daftar->save();

        return redirect('/masuk');
    }
}
