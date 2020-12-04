@extends('layouts.app')
@section('title',$produk->name)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ url('/storage/'.$produk->image) }}" class="card-img-top h-100" alt="...">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5">
            <div class="card" style="height: 18rem;">
                <div class="card-header">
                    Detail Produk
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->name }}</h5>
                    <h5 class="card-title">{{ $produk->price }}</h5>
                    <h5 class="card-title">{{ $produk->quantity }}</h5>
                    <h5 class="card-title">{{ $produk->category['name'] }}</h5>
                    <p class="card-text">{{stripslashes($produk->desc)}}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card" style="height: 18rem;">
                <div class="card-header">
                    Pesan Sekarang
                </div>
                <div class="card-body">
                    <form action="{{ route('keranjang.index',['id'=>$produk->id]) }}" method="post">
                        @csrf
                        <input type="text" class="form-control" name="total" value="1">
                        <button type="submit" class="btn btn-primary w-100 mt-2">Tambah Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
