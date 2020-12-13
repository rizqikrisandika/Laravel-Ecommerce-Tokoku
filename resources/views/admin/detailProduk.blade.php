@extends('layouts.app2')

@section('title','Detail Produk')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Detail Produk
    </div>
    <div class="card-body">

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $produk->id }}</th>
                    <td>{{ $produk->user['email'] }}</td>
                    <td>{{ $produk->name }}</td>
                    <td>{{ $produk->category['name'] }}</td>
                    <td>Rp. {{ $produk->price }}</td>
                    <td>
                        <a name="" id="" class="btn btn-warning" href="{{ route('tampilubahproduk.admin',['slug'=>$produk->slug]) }}" role="button">Ubah</a>
                        <form class="d-inline" action="{{ route('hapusproduk.admin',['slug'=>$produk->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="" class="btn btn-danger"  role="button">Hapus</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
