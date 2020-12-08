@extends('layouts.app2')

@section('title','Pemesanan')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Pemesanan
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
                    <td>Rp. {{ number_format($order->total_price += $order->code) }}</td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="{{ route('pemesananDetail.admin',['id'=>$order->id]) }}" role="button">
                            <i class="fa fa-search"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
