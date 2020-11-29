@extends('layouts.app')
@section('title','Produk')

@section('content')

<div class="container">
    <div class="wrapper-produk">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <h3>Kategori</h3>
                <div class="wrapper-kategori mt-5">
                    <div class="card" style="width: 12rem;">
                        <div class="card-header">
                          Kategori
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($kategori as $kategori)
                            <li class="list-group-item">
                                <a href="">{{ $kategori->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                      </div>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <h3>Produk</h3>
                <div class="row">
                    @foreach ($produk as $produk)
                    <div class="col-12 col-lg-4 col-md-4 col-sm-6 mt-5">
                        <div class="card shadow-sm" style="width: 15rem;padding-top:2rem; border:none;">
                            <a href="{{ route('detailproduk.index',['id'=>$produk->id]) }}">
                                <img src="{{ url('/storage/'.$produk->image) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('detailproduk.index',['id'=>$produk->id]) }}">
                                    <h5 class="card-title">{{ $produk->name }}</h5>
                                </a>
                                <p class="card-text">Rp. {{number_format($produk->price,0)}}</p>
                                <p class="card-text">{{$produk->category['name']}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
