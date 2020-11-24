@extends('layout.main')

@section('title','Daftar Akun')

@section('body')

<div class="container">
    <div class="card w-50 mx-auto">
        <div class="wrapper-form p-5">
            <div class="title-form text-center pb-2">
                <h3>Daftar</h3>
            </div>
            <form action="{{ route('daftar.akun') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Masukkan Nama">
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" name="repassword" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password">
                  </div>
                <button type="submit" class="btn btn-primary mt-2">Daftar</button>
              </form>
        </div>
    </div>
</div>

@endsection
