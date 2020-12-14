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
                @foreach ($order as $no => $data)
                <tr>
                    <th scope="row">{{ $order->firstItem()+$no }}</th>
                    <td>{{ $data->order_date }}</td>
                    <td>{{ $data->user['name'] }}</td>
                    <td>
                        @if ($data->status == 'checkout')
                            Belum Dibayar
                        @else
                            Sudah Dibayar
                        @endif
                    </td>
                    <td>Rp. {{ number_format($data->total_price += $data->code,0,",",".") }}</td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="{{ route('pemesananDetail.admin',['slug'=>$data->slug]) }}" role="button">
                            <i class="fa fa-search"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $order->onEachSide(2)->links() }}
    </div>
</div>

@endsection
