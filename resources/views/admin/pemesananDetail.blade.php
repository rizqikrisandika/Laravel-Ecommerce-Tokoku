@extends('layouts.app2')
@section('title','Detail Pemesanan')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h2 class="mb-5 float-right">Tokoku.</h2>
                    <h6>Nama : {{ $order->user['name'] }}</h6>
                    <h6>Alamat : {{ $order->user['address'] }}</h6>
                    <h6>Kota : {{ $order->user['city'] }}</h6>
                    <h6>Kodepos : {{ $order->user['zipcode'] }}</h6>
                    <h6>Status :
                        @if ($order->status == 'checkout')
                            Belum Dibayar
                        @else
                            Sudah Dibayar
                        @endif
                    </h6>
                    <h6>Total : Rp. {{ number_format($order->total_price + $order->code,0,",",".") }}</h6>
                    <h6>Tanggal/Waktu : {{ $order->order_date->format('d/m/Y h:i:s') }}</h6>
                </div>

                <div class="card-body">
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
                                <td><img style="width: 70px" src="{{ url('/storage/'.$order_detail->product['image']) }}" alt=""></td>
                                <td>{{ $order_detail->product['name'] }}</td>
                                <td>{{ $order_detail->total }} unit</td>
                                <td>Rp. {{ number_format($order_detail->product['price'],0,",",".") }}</td>
                                <td>Rp. {{ number_format($order_detail->total_price,0,",",".") }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-right"><Strong>Total</Strong></td>
                                <td><strong>Rp. {{ number_format($order->total_price,0,",",".") }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><Strong>Kode Unik</Strong></td>
                                <td><strong>Rp. {{ number_format($order->code,0,",",".") }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><Strong>Total yang harus ditransfer</Strong></td>
                                <td><strong>Rp. {{ number_format($order->total_price + $order->code,0,",",".") }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"></td>
                                <td><a href="{{ route('pemesanan.admin') }}" class="btn btn-primary">Kembali</a></td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
