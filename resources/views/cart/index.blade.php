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
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
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
                                <td colspan="4" class="text-center"><h5>Total</h3></td>
                                <td>Rp. {{ number_format($order->total_price) }}</td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card" style="height: 18rem;">
                <div class="card-header">
                    Pesan Sekarang
                </div>
                <div class="card-body">
                    <a name="" id="" class="btn btn-primary w-100" href="#" role="button">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
