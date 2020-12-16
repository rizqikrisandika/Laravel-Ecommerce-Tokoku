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
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="" value="{{ old('name') }}" aria-describedby="" placeholder="Nama produk">
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select class="form-control" name="category_id" id="">
                          <option selected>Pilih Produk</option>
                            @foreach ($kategori as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}" id="rupiah2" aria-describedby="" placeholder="Rp.">
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="string" name="quantity" class="form-control" value="{{ old('quantity') }}" id="" aria-describedby="" placeholder="Jumlah Produk">
                      </div>
                </div>
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea type="" name="desc" class="form-control" rows="5" aria-describedby="" placeholder="Deskripsi Produk">{{ old('desc') }}</textarea>
              </div>
              <label for="exampleInputEmail1">Gambar Produk</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih Foto</label>
              </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Tambah</button>
          </form>

    </div>
</div>
@endsection
