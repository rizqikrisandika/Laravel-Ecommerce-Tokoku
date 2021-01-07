@extends('layouts.app')
@section('title','Profil')

@section('content')

<div class="container mt-4">
    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>
    <div class="col-8 mx-auto">
        <h3 class="text-center mb-5"><strong>Profil</strong></h3>

        <form action="{{ route('updateprofile.index')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="No Hp" maxlength="12">
            </div>
            <div class="form-group">
                <label for="">Alamat Lengkap/Tujuan Pengiriman</label>
                <textarea class="form-control" name="address" name="" id="" rows="3" placeholder="Alamat Lengkap">{{ $user->address }}</textarea>
            </div>
            <div class="form-group">
                <label>Kota/Kabupaten</label>
                <input type="text" name="city" value="{{ $user->city }}" class="form-control" placeholder="Kota/Kabupaten">
            </div>
            <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" name="zipcode" value="{{ $user->zipcode }}" class="form-control" placeholder="Kode Pos">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3 mb-3">Simpan</button>
        </form>
    </div>
</div>

@endsection
