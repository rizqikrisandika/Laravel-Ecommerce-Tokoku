@extends('layouts.app2')

@section('title','Tambah Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Tambah Produk
    </div>
    <div class="card-body">
        <form action="{{ route('tambahproduk.admin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="name" class="form-control" id="" aria-describedby="" placeholder="Nama produk">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Kategori</label>
              <select class="form-control" name="category_id" id="">
                <option selected>Pilih Produk</option>
                  @foreach ($kategori as $kategori)
                  <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="number" name="price" class="form-control" id="" aria-describedby="" placeholder="Rp.">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Jumlah</label>
                <input type="number" name="quantity" class="form-control" id="" aria-describedby="" placeholder="Jumlah Produk">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea type="" name="desc" class="form-control" id="summernote" aria-describedby=""></textarea>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih file</label>
              </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Tambah</button>
          </form>

    </div>
</div>
@endsection
