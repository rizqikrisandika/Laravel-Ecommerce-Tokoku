@extends('layouts.app2')

@section('title','Ubah Kategori Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Ubah Kategori Produk
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <img style="width: 100%" src="{{ url('/storage/'.$kategori->image) }}" alt="">
                <form action="{{ route('updatekategori.admin', ['slug'=>$kategori->slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tambah Kategori</label>
                        <input type="text" name="name" class="form-control" value="{{$kategori->name}}" id="" aria-describedby="">
                    </div>
                    <label for="exampleInputEmail1">Gambar Kategori</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                                <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                              </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
