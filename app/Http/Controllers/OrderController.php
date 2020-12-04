<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Order_Detail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.pemesanan');
    }


    //Keranjang
    public function order(Request $request, $id)
    {
    	$produk = Product::where('id', $id)->first();
        $tanggal = Carbon::now();

        if($request->total > $produk->quantity)
        {
            return redirect()->route('detailproduk.index',$id);
        }

        $cek_order = Order::where('user_id',Auth::user()->id)->where('status',0)->first();

        if(empty($cek_order))
        {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->order_date = $tanggal;
            $order->status = 0;
            $order->total_price = 0;
            $order->save();
        }

        $new_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        $cek_order_detail = Order_Detail::where('product_id',$produk->id)->where('order_id',$new_order->id)->first();

        if(empty($cek_order_detail))
        {
            $order_detail = new Order_Detail;
            $order_detail->product_id = $produk->id;
            $order_detail->order_id = $new_order->id;
            $order_detail->total = $request->total;
            $order_detail->total_price = $produk->price * $request->total;
            $order_detail->save();
        }else{
            $order_detail = Order_Detail::where('product_id',$produk->id)->where('order_id',$new_order->id)->first();

            $order_detail->total = $order_detail->total + $request->total;

            $new_price_order_detail = $produk->price * $request->total;
            $order_detail->total_price = $order_detail->total_price + $new_price_order_detail;
            $order_detail->update();
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        $order->total_price = $order->total_price + $produk->price * $request->total;
        $order->update();

        return redirect()->route('produk.index');
    }

}
