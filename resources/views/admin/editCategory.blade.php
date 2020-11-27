@extends('layouts.app2')

@section('title','Ubah Kategori Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Ubah Kategori Produk
    </div>
    <div class="card-body">
        <form action="{{ route('updatekategori.admin', ['id'=>$kategori->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tambah Kategori</label>
                <input type="text" name="name" class="form-control" value="{{$kategori->name}}" id="" aria-describedby="">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
        </form>
    </div>
</div>

@endsection
