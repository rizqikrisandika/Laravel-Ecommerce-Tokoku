@extends('layouts.app')
@section('title','Detail Riwayat Belanja')

@section('content')

<div class="container mt-5">
    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('history.index') }}">Riwayat Belanja</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </nav>
      <div>
          <a href="{{ route('cetakhistorydetail.index',['slug'=>$order->slug]) }}" class="btn btn-primary">Cetak</a>
      </div>
            <div class="card mt-5">
                <div class="card-body">
                    <h4>Pemesanan Sukses</h4>
                    <h6>Pemesanan anda sukses selanjutnya untuk melakukan pembayaran melalui transfer
                        <br>
                        di rekening <strong>Bank BRI Nomer Rekening : 31212-7533545-200</strong>
                        dengan nominal <strong>Rp. {{ number_format($order->total_price + $order->code,0,",",".") }}</strong>
                    </h6>
                </div>
            </div>

            <div class="card mt-3">
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
                        </tbody>
                      </table>
                </div>
            </div>
</div>

@endsection
