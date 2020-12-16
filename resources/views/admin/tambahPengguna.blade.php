@extends('layouts.app2')

@section('title','Tambah Pengguna')

@section('content')

<div class="card">
    <div class="card-header">
        Tambah Pengguna
    </div>
    <div class="card-body">
        <form action="{{ route('tambahpengguna.admin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="" aria-describedby="" placeholder="Nama Pengguna">
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="" aria-describedby="" placeholder="Email Pengguna">
                      </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Hp</label>
                <input type="text" name="phone" class="form-control" id="" aria-describedby="" placeholder="No Hp">
              </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat Pengguna</label>
                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5" placeholder="Alamat Pengguna"></textarea>
              </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kota</label>
                        <input type="text" name="city" class="form-control" id="" aria-describedby="" placeholder="Kota">
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pos</label>
                        <input type="text" name="zipcode" class="form-control" id="" aria-describedby="" placeholder="Kode Pos">
                      </div>
                </div>
            </div>





            <button type="submit" class="btn btn-primary w-100 mt-3">Tambah</button>
          </form>

    </div>
</div>
@endsection
