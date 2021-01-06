@extends('layouts.app')
@section('title','Produk')

@section('content')

<div class="container mt-5">
    <div class="wrapper-produk">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <h3 class="font-weight-bold">Kategori</h3>
                <div class="card mt-5">
                    @php
                        $all = App\Product::all()->count();
                    @endphp
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a class="{{ set_active('produk.index') }}" href="{{ route('produk.index') }}">Semua</a>
                            <span class="badge badge-dark float-right">{{ $all }}</span>
                        </li>
                        @foreach($kategori as $kat)
                            <li class="list-group-item">
                                <a class="{{ set_active('produkkategori.index*') }}"
                                    href="{{ route('produkkategori.index',['slug'=>$kat->slug]) }}">{{ $kat->name }}</a>
                                <span class="badge badge-dark float-right">{{ $kat->product_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <h3 class="font-weight-bold">Produk</h3>

                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <form class="mr-auto" action="{{ route('cariproduk.index') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari Produk..." id="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($produk as $no => $data)
                        <div class="col-12 col-sm-6 col-lg-4 col-md-4 mb-4 card-product">
                            <a
                                href="{{ route('detailproduk.index',['slug'=>$data->slug]) }}">
                                <div class="card">
                                    <img src="{{ url('/storage/'.$data->image) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">

                                            <h5 class="card-title"><strong>{{ $data->name }}</strong></h5>

                                        <p class="card-text">Rp.
                                            {{ number_format($data->price,0,",",".") }}
                                        </p>
                                        <p class="card-text">{{ $data->category['name'] }}</p>
                                        <p class="card-text">{{ $data->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </a>
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
