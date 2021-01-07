@extends('layouts.app')
@section('title','Riwayat Belanja')

@section('content')

<div class="container mt-4">
    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat Belanja</li>
        </ol>
    </nav>

    <table class="table">
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
            @foreach ($order as $no => $data)
            <tr>
                <th scope="row">{{ $order->firstItem()+$no }}</th>
                <td>{{ $data->order_date->format('d/m/Y') }}</td>
                <td>{{ $data->order_date->format('h:i:s') }}</td>
                <td>
                    @if ($data->status == 'checkout')
                    Belum Dibayar
                    @else
                    Sudah Dibayar
                    @endif
                </td>
                <td>Rp. {{ number_format($data->total_price,0,",",".") }}</td>
                <td>
                    <a class="text-blue" href="{{ route('historydetail.index',['slug'=>$data->slug]) }}">
                        <i class="fa fa-search"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $order->links() }}
</div>

@endsection
