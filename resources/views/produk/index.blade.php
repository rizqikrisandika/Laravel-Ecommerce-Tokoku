@extends('layouts.app')
@section('title','Produk')

@section('content')

<div class="container">
    <div class="wrapper-produk">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <h3 class="font-weight-bold">Kategori</h3>
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
                <h3 class="font-weight-bold">Produk</h3>
                <div class="row">
                    @foreach ($produk as $no => $data)
                    <div class="col-12 col-lg-4 col-md-4 col-sm-6 mt-5">
                        <div class="card">
                            <a href="{{ route('detailproduk.index',['slug'=>$data->slug]) }}">
                                <img src="{{ url('/storage/'.$data->image) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('detailproduk.index',['slug'=>$data->slug]) }}">
                                    <h5 class="card-title">{{ $data->name }}</h5>
                                </a>
                                <p class="card-text">Rp. {{number_format($data->price,0)}}</p>
                                <p class="card-text">{{$data->category['name']}}</p>
                                <p class="card-text">{{$data->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $produk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
