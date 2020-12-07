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
            <thead class="thead-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($produk as $produk)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img style="width: 70px" src="{{ url('/storage/'.$produk->image) }}" alt=""></td>
                    <td>{{ $produk->name }}</td>
                    <td>{{ $produk->quantity }}</td>
                    <td>{{ $produk->category['name'] }}</td>
                    <td>Rp. {{ $produk->price }}</td>
                    <td>
                        <a name="" id="" class="btn btn-sm btn-primary" href="{{ route('detailproduk.admin',['id'=>$produk->id]) }}" role="button"><i class="fa fa-search"></i></a>
                        <a name="" id="" class="btn btn-sm btn-warning" href="{{ route('tampilubahproduk.admin',['id'=>$produk->id]) }}" role="button"><i class="fa fa-pen"></i></a>
                        <form class="d-inline" action="{{ route('hapusproduk.admin',['id'=>$produk->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="" class="btn btn-sm btn-danger"  role="button"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
