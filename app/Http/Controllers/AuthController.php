<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{

    public function tampilMasuk()
    {
        if(Auth::check())
        {
            if(Auth::user()->role == 'Admin')
            {
                return redirect('/dashboard');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return view('login.masuk');
        }
    }


    public function masuk(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        {
            if(Auth::user()->role == 'Admin')
            {
                return redirect('/dashboard');
            }
            else
            {
                return redirect('/');
            }
        }

        return view('login.masuk');
    }

    public function keluar()
    {
        Auth::logout();

        return redirect('/masuk');
    }
}
