<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $user = User::get();
        $usercount = count($user);

        $produk = Product::get();
        $produkcount = count($produk);

        return view('admin.index',compact(['usercount','produkcount']));
    }
}
