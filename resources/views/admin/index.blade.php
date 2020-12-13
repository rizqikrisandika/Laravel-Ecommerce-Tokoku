@extends('layouts.app2')

@section('title','Dashboard Admin')

@section('content')

<div class="row">
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                User
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>{{ $usercount }}</h4>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                Produk
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>{{ $produkcount }}</h4>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                Pendapatan
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>Rp. {{ number_format($order_total,0,",",".") }}</h4>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="wrapper-order mt-5">
    <div class="card">
        <div class="card-header">
            Pemesanan Terbaru
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal/Waktu</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->user['name'] }}</td>
                        <td>
                            @if ($order->status == 'checkout')
                                Belum Dibayar
                            @else
                                Sudah Dibayar
                            @endif
                        </td>
                        <td>Rp. {{ number_format($order->total_price += $order->code,0,",",".") }}</td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="{{ route('pemesananDetail.admin',['slug'=>$order->slug]) }}" role="button">
                                <i class="fa fa-search"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
