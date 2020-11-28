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
                    <h4>2</h4>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="wrapper-order mt-5">
    <div class="card" style="height: 18rem;">
        <div class="card-header">
            Pemesanan Terbaru
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($pengguna as $pengguna) --}}
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
