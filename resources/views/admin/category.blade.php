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
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $kategori)
                <tr>
                    <th scope="row">{{ $kategori->id }}</th>
                    <td>{{ $kategori->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
