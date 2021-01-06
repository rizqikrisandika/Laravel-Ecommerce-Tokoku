@extends('layouts.app')
@section('title','Produk')

@section('content')

<div class="container">
    <div class="wrapper-produk">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <h3 class="font-weight-bold">Kategori</h3>
                    <div class="card mt-5">
                        <form action="{{ route('cariproduk.index') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari Produk..." id="">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        @php
                            $all = App\Product::all()->count();
                        @endphp
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('produk.index') }}">Semua</a>
                                <span class="badge badge-dark float-right">{{ $all }}</span>
                            </li>
                            @foreach ($kategori as $kat)
                            <li class="list-group-item">
                                <a href="{{ route('produkkategori.index',['slug'=>$kat->slug]) }}">{{ $kat->name }}</a>
                                <span class="badge badge-dark float-right">{{ $kat->product_count }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <h3 class="font-weight-bold">{{ $prod->name }}</h3>
                <div class="row mt-5">
                    @foreach ($produk as $no => $data)
                    <div class="col-12 col-lg-4 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <a href="{{ route('detailproduk.index',['slug'=>$data->slug]) }}">
                                <img src="{{ url('/storage/'.$data->image) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('detailproduk.index',['slug'=>$data->slug]) }}">
                                    <h5 class="card-title">{{ $data->name }}</h5>
                                </a>
                                <p class="card-text">Rp. {{number_format($data->price,0,",",".")}}</p>
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
