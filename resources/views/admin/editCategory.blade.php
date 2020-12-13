@extends('layouts.app2')

@section('title','Ubah Kategori Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Ubah Kategori Produk
    </div>
    <div class="card-body">
        <form action="{{ route('updatekategori.admin', ['slug'=>$kategori->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tambah Kategori</label>
                <input type="text" name="name" class="form-control" value="{{$kategori->name}}" id="" aria-describedby="">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih Gambar</label>
              </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
        </form>
    </div>
</div>

@endsection
