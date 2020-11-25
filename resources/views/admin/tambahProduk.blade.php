@extends('layouts.app2')

@section('title','Tambah Produk')

@section('content')

<h3>Tambah Produk</h3>

<form>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" name="nama" class="form-control" id="" aria-describedby="">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <input type="number" name="harga" class="form-control" id="" aria-describedby="">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Kategori</label>
        <select class="form-control" id="">
          <option value="Handphone">Handphone</option>
          <option value="Laptop">Laptop</option>
          <option value="Komputer">Komputer</option>
          <option value="Aksesoris">Aksesoris</option>
          <option value="Lain-lain">Lain-lain</option>
        </select>
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Gambar</label>
      <input type="file" name="gambar" class="form-control" id="" >
    </div>
    <button type="submit" class="btn btn-primary w-100 mt-3">Tambah</button>
  </form>

@endsection
