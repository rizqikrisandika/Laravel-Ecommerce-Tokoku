<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\Role;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {


        $user = User::role('user')->get();
        $usercount = count($user);

        $produk = Product::get();
        $produkcount = count($produk);

        $order_total = Order::where('status','lunas')->sum('total_price');

        $order = Order::where('status','=','checkout')->orderBy('order_date','desc')->take(4)->get();



        return view('admin.index',compact(['usercount','produkcount','order_total','order']));
    }
}
