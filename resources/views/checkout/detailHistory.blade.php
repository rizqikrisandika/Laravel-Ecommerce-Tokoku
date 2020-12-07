@extends('layouts.app')
@section('title','Detail Riwayat Belanja')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4>Pemesanan Sukses</h4>
                    <h6>Pemesanan anda sukses selanjutnya untuk melakukan pembayaran melalui transfer
                        <br>
                        di rekening <strong>Bank BRI Nomer Rekening : 31212-7533545-200</strong>
                        dengan nominal <strong>Rp. {{ number_format($order->total_price + $order->code) }}</strong>
                    </h6>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    Detail Riwayat Belanja
                </div>

                <div class="card-body">
                    <table class="table table-hover">
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
                                <td><img style="width: 70px" src="{{ url('/storage/'.$order_detail->product['image']) }}" alt=""></td>
                                <td>{{ $order_detail->product['name'] }}</td>
                                <td>{{ $order_detail->total }} unit</td>
                                <td>Rp. {{ number_format($order_detail->product['price']) }}</td>
                                <td>Rp. {{ number_format($order_detail->total_price) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-right"><Strong>Total Harga</Strong></td>
                                <td><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><Strong>Kode Unik</Strong></td>
                                <td><strong>Rp. {{ number_format($order->code) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><Strong>Total yang harus ditransfer</Strong></td>
                                <td><strong>Rp. {{ number_format($order->total_price + $order->code) }}</strong></td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
