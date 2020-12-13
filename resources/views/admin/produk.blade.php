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
                @foreach ($produk as $no => $data)
                <tr>
                    <th scope="row">{{ $produk->firstItem()+$no }}</th>
                    <td><img style="width: 70px" src="{{ url('/storage/'.$data->image) }}" alt=""></td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->category['name'] }}</td>
                    <td>Rp. {{ $data->price }}</td>
                    <td>
                        <a name="" id="" class="btn btn-sm btn-primary" href="{{ route('detailproduk.admin',['slug'=>$data->slug]) }}" role="button"><i class="fa fa-search"></i></a>
                        <a name="" id="" class="btn btn-sm btn-warning" href="{{ route('tampilubahproduk.admin',['slug'=>$data->slug]) }}" role="button"><i class="fa fa-pen"></i></a>
                        <form class="d-inline" action="{{ route('hapusproduk.admin',['slug'=>$data->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="" class="btn btn-sm btn-danger"  role="button"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $produk->links() }}
    </div>
</div>

@endsection
