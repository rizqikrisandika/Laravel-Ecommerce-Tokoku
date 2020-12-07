@extends('layouts.app')
@section('title','Keranjang')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    Keranjang
                </div>
                <div class="card-body">
                    @if(!empty($order))
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_detail as $order_detail)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img style="width: 70px" src="{{ url('/storage/'.$order_detail->product['image']) }}" alt=""></td>
                                <td>{{ $order_detail->product['name'] }}</td>
                                <td>{{ $order_detail->total }} unit</td>
                                <td>Rp. {{ number_format($order_detail->product['price']) }}</td>
                                <td>Rp. {{ number_format($order_detail->total_price) }}</td>
                                <td>
                                    <form action="{{ route('hapuskeranjang.index',['id'=>$order_detail->id]) }}" method="post">
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
                                <td colspan="5" class="text-center"><Strong>Total</Strong></td>
                                <td><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                            </tr>
                        </tbody>
                      </table>


                      @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card" style="height: 18rem;">
                <div class="card-header">
                    Pesan Sekarang
                </div>
                <div class="card-body">
                    <a name="" id="" class="btn btn-primary w-100" href="{{ route('checkout.index') }}" role="button"><i class="fa fa-shopping-cart"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
