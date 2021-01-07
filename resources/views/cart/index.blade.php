@extends('layouts.app')
@section('title','Keranjang')

@section('content')

<div class="container mt-4">
    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
        </ol>
      </nav>

            @if(!empty($order && $order->total_price !== 0) && Auth::user()->id)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col"></th>
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
                        <td>
                            <form action="{{ route('hapuskeranjang.index',['slug'=>$order_detail->slug]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
                    <tr>
                        <td colspan="4"></td>
                        <td><a name="" id="" class="btn btn-primary w-100" href="{{ route('produk.index') }}" role="button">Kembali Belanja</a></td>
                        <td>
                            <a name="" id="" class="btn btn-success w-100" href="{{ route('tampilcheckout.index') }}" role="button"><i class="fa fa-shopping-cart"></i> Checkout</a>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        @else
        <div class="row mt-5">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center empty-cart">
                <div>
                    <i class="fa fa-shopping-cart fa-10x" aria-hidden="true"></i>
                </div>
                <div class="mt-5">
                    <h3>Keranjang Anda Kosong</h3>
                </div>
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{ route('produk.index') }}">Silahkan Belanja</a>
                </div>
            </div>
        </div>
        @endif
</div>

@endsection
