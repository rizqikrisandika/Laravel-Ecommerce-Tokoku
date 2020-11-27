@extends('layouts.app2')

@section('title','Kategori Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Kategori Produk
    </div>
    <div class="card-body">
        <form action="{{ route('tambahkategori.admin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tambah Kategori</label>
                <input type="text" name="name" class="form-control" id="" aria-describedby="">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
        </form>

        <table class="table mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $kategori)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $kategori->name }}</td>
                    <td>
                        <a name="" id="" class="btn btn-warning" href="{{ route('tampilubahkategori.admin',['id'=>$kategori->id]) }}" role="button">Ubah</a>
                        <form class="d-inline" action="{{ route('hapuskategori.admin',['id'=>$kategori->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button  type="submit" class="btn btn-danger" role="button">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
