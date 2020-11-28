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
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($produk as $produk) --}}
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="" role="button">Detail</a>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
