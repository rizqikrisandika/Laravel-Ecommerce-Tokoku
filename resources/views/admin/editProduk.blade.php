@extends('layouts.app2')

@section('title','Ubah Produk')

@section('content')

<div class="card">
    <div class="card-header">
        Ubah Produk
    </div>
    <div class="card-body">
        <form action="{{ route('updateproduk.admin',['slug'=>$produk->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="name" class="form-control" id="" aria-describedby="" value="{{ $produk->name }}" placeholder="Nama produk">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Kategori</label>
              <select class="form-control" name="category_id" id="">
                <option value="{{ $produk->category_id }}" selected>{{ $produk->category['name'] }}</option>
                  @foreach ($kategori as $kategori)
                  <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="number" name="price" class="form-control" id="" aria-describedby="" value="{{ $produk->price }}" placeholder="Rp.">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Jumlah</label>
                <input type="number" name="quantity" class="form-control" id="" aria-describedby="" value="{{ $produk->quantity }}" placeholder="Jumlah Produk">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea type="" name="desc" class="form-control" id="summernote" aria-describedby="">{{ $produk->desc }}</textarea>
              </div>
            <div class="form-group">
                <img src="{{ url('/storage/'.$produk->image) }}" style="width: 10rem" alt="">
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Gambar</label>
              <input type="file" name="image" class="form-control" id="" >
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
          </form>

    </div>
</div>
@endsection
