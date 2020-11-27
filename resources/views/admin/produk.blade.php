@extends('layouts.app2')

@section('title','Produk Dashboard')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Produk
    </div>
    <div class="card-body">
        <a name="" id="" class="btn btn-primary mb-3" href="{{ route('tampiltambah.admin') }}" role="button">Tambah
            Produk</a>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $produk)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $produk->user['email'] }}</td>
                    <td>{{ $produk->name }}</td>
                    <td>{{ $produk->category['name'] }}</td>
                    <td>Rp. {{ $produk->price }}</td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Detail</a>
                        <a name="" id="" class="btn btn-warning" href="#" role="button">Ubah</a>
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
