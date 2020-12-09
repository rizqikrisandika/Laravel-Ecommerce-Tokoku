<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Order_Detail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $order = Order::where('status','=','checkout')->paginate(5);

        return view('admin.pemesanan',compact('order'));
    }

    public function detail($id)
    {
        $order = Order::where('id',$id)->first();

        $order_detail = Order_Detail::where('order_id', $order->id)->get();

        return view('admin.pemesananDetail',compact('order','order_detail'));
    }

    public function checkout()
    {

        $user = User::where('id',Auth::user()->id)->first();

        if(empty($user->address or $user->city or $user->zipcode))
        {
            alert()->error('Identitas Mohon Dilengkapi ', 'Error');

            return redirect()->route('profile.index');
        }

        $tanggal = Carbon::now();

        $order = Order::where('user_id', Auth::user()->id)->where('status','=','keranjang')->first();
        $order->status = 'checkout';
        $order->order_date = $tanggal;
        $order->update();


        $order_detail = Order_Detail::where('order_id',$order->id)->get();
        foreach($order_detail as $order_detail)
        {
            $produk = Product::where('id',$order_detail->product_id)->first();
            $produk->quantity = $produk->quantity - $order_detail->total;
            $produk->update();
        }


        alert()->success('Checkout Produk', 'Sukses');

        return redirect()->route('historydetail.index',['id'=>$order->id]);

    }


}
