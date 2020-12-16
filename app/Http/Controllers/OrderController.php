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

    public function detail($slug)
    {
        $order = Order::where('slug',$slug)->first();

        $order_detail = Order_Detail::where('order_id', $order->id)->get();

        return view('admin.pemesananDetail',compact('order','order_detail'));
    }

    public function tampilCheckout()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $order = Order::where('user_id', Auth::user()->id)->where('status','=','keranjang')->first();
        $order_detail = Order_Detail::where('order_id',$order->id)->get();

        return view('checkout.index',compact('order_detail','user','order'));
    }

    public function checkout(Request $request)
    {

        // $user = User::where('id',Auth::user()->id)->first();

        // if(empty($user->address or $user->city or $user->zipcode))
        // {
        //     alert()->error('Identitas Mohon Dilengkapi ', 'Error');

        //     return redirect()->route('checkout.index');
        // }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits:12',
            'city' => 'required|string',
            'address' => 'required|string|max:100',
            'zipcode' => 'required|string',
        ]);

        $user = User::where('id',Auth::user()->id)->first();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;

        $user->update();

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

        return redirect()->route('historydetail.index',['slug'=>$order->slug]);

    }


}
