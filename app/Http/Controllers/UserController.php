<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $pengguna = User::all();

        return view('admin.pengguna',compact('pengguna'));
    }
}
