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
            alert()->error('Pemesanan Melebihi Stok Produk', 'Gagal');

            return redirect()->route('detailproduk.index',$id);
        }

        $cek_order = Order::where('user_id',Auth::user()->id)->where('status','=','keranjang')->first();

        if(empty($cek_order))
        {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->order_date = $tanggal;
            $order->status = 'keranjang';
            $order->total_price = 0;
            $order->save();
        }

        $new_order = Order::where('user_id', Auth::user()->id)->where('status','=','keranjang')->first();

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

        $order = Order::where('user_id', Auth::user()->id)->where('status','=','keranjang')->first();

        $order->total_price = $order->total_price + $produk->price * $request->total;
        $order->update();

        alert()->success('Tambah Produk Ke Keranjang', 'Sukses');

        return redirect()->route('produk.index');
    }

    public function keranjang()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status','=','keranjang')->first();
        $order_detail = Order_Detail::where('order_id',$order->id)->get();

        return view('cart.index',compact('order','order_detail'));
    }

    public function hapusKeranjang($id)
    {
        $order_detail = Order_Detail::where('id',$id)->first();
        $order = Order::where('id',$order_detail->order_id)->first();

        $order->total_price =  $order->total_price - $order_detail->total_price;
        $order->update();

        $order_detail->delete();

        alert()->error('Keranjang Produk Dihapus', 'Sukses');

        return redirect()->route('keranjang.index');
    }

    public function checkout()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status','=','keranjang')->first();
        $order->status = 'checkout';
        $order->update();

        // $cek_order = Order::where('user_id', Auth::user()->id)->where('status','=','checkout')->first();
        // $order_detail = Order_Detail::where('order_id',$cek_order->id)->get();


        alert()->success('Checkout Produk', 'Sukses');

        return redirect()->route('home.index');

        // return view('checkout.index',compact('cek_order','order_detail'));
    }


}
