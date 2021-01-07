@extends('layouts.app')
@section('title','Checkout')

@section('content')

<div class="container mt-4">
    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
          <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
      </nav>

            {{-- @if(!empty($order && $order->total_price !== 0) && Auth::user()->id) --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_detail as $order_detail)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ route('detailproduk.index',['slug'=>$order_detail->product['slug']]) }}">
                                <img style="width: 10rem" src="{{ url('/storage/'.$order_detail->product['image']) }}"
                                alt="">
                            </a>
                        </td>
                        <td>{{ $order_detail->product['name'] }}</td>
                        <td>{{ $order_detail->total }} unit</td>
                        <td>Rp. {{ number_format($order_detail->product['price'],0,",",".") }}</td>
                        <td>
                            <strong>
                                Rp. {{ number_format($order_detail->total_price,0,",",".") }}
                            </strong>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><Strong>Total</Strong></td>
                        <td><strong>Rp. {{ number_format($order->total_price,0,",",".") }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right"><Strong>Kode Unik</Strong></td>
                        <td><strong>Rp. {{ number_format($order->code) }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right"><Strong>Total yang harus dibayar</Strong></td>
                        <td><strong>Rp. {{ number_format($order->total_price + $order->code,0,",",".") }}</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <h2 class="mt-3 mb-5 font-weight-bold">Identitas Pengiriman</h2>

            <form action="{{ route('checkout.index') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="No Hp" maxlength="12">
                </div>
                <div class="form-group">
                    <label for="">Alamat Lengkap/Tujuan Pengiriman</label>
                    <textarea class="form-control" name="address" name="" id="" rows="3" placeholder="Alamat Lengkap">{{ $user->address }}</textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Kota/Kabupaten</label>
                            <input type="text" name="city" value="{{ $user->city }}" class="form-control" placeholder="Kota/Kabupaten">
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="zipcode" value="{{ $user->zipcode }}" class="form-control" placeholder="Kode Pos">
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-3 mb-3">Checkout</button>
            </form>

        {{-- @else
        <div class="row mt-5">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center empty-cart">
                <div>
                    <i class="fa fa-shopping-cart fa-10x" aria-hidden="true"></i>
                </div>
                <div>
                    <h3>Keranjang Anda Kosong</h3>
                </div>
                <div>
                    <a href="{{ route('produk.index') }}">Silahkan Belanja</a>
                </div>
            </div>
        </div>
        @endif --}}
</div>

@endsection
