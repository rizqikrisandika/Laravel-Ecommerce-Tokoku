@extends('layouts.app')
@section('title','Profil')

@section('content')

<div class="container">
    <div class="col-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Profil
            </div>
            <div class="card-body">
                <form action="{{ route('updateprofile.index')}}" method="POST" >
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
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <input type="text" name="city" value="{{ $user->city }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <textarea class="form-control" name="address" name="" id="" rows="3">{{ $user->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" name="zipcode" value="{{ $user->zipcode }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3 mb-3">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection