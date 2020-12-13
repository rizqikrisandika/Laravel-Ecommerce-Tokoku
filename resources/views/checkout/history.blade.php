@extends('layouts.app')
@section('title','Riwayat Belanja')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    Riwayat Belanja
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $order->order_date->format('d/m/Y') }}</td>
                                <td>{{ $order->order_date->format('h:i:s') }}</td>
                                <td>
                                    @if ($order->status == 'checkout')
                                        Belum Dibayar
                                    @else
                                        Sudah Dibayar
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($order->total_price) }}</td>
                                <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('historydetail.index',['slug'=>$order->slug]) }}">
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
    </div>
</div>

@endsection
