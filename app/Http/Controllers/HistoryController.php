<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Order;
use App\Order_Detail;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $order = Order::where('user_id',Auth::user()->id)->where('status','=','checkout')->paginate(5);

        return view('checkout.history',compact('order'));
    }

    public function detail($slug)
    {
        $order = Order::where('slug',$slug)->first();

        $order_detail = Order_Detail::where('order_id', $order->id)->get();

        return view('checkout.detailHistory',compact('order','order_detail'));
    }
}
