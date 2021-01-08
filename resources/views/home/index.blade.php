@extends('layouts.app')
@section('title','Tokoku')
@section('content')


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-14 col-lg-6">
                <div class="wrapper-top mt-5">
                    <h2 class="font-weight-bold">SELAMAT DATANG DI TOKOKU.</h2>
                    <h5>Belanja Handphone Lebih Murah dan Mudah</h5>
                    <a name="" id="" class="btn btn-primary btn-top mt-3"
                        href="{{ route('produk.index') }}" role="button">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="owl-carousel owl-theme">
    <div class="item"><h4>1</h4></div>
    <div class="item"><h4>2</h4></div>
    <div class="item"><h4>3</h4></div>
    <div class="item"><h4>4</h4></div>
    <div class="item"><h4>5</h4></div>
    <div class="item"><h4>6</h4></div>
    <div class="item"><h4>7</h4></div>
    <div class="item"><h4>8</h4></div>
    <div class="item"><h4>9</h4></div>
    <div class="item"><h4>10</h4></div>
    <div class="item"><h4>11</h4></div>
    <div class="item"><h4>12</h4></div>
</div> --}}
<div class="container">
    <h2 class="mt-5 font-weight-bold">Kategori</h2>
    <div class="row">
        @foreach($kategori as $kategori)
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-4">
                <a
                    href="{{ route('produkkategori.index',['slug'=>$kategori->slug]) }}">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ url('/storage/'.$kategori->image) }}"
                                class="card-img-top" alt="...">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <h2 class="mt-5 font-weight-bold">Produk Terbaru</h2>
    <div class="content-produk-terbaru">
        <div class="row">
            @foreach($produk as $produk)
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-5 card-product">
                    <a
                        href="{{ route('detailproduk.index',['slug'=>$produk->slug]) }}">
                        <div class="card" style="">
                            <div class="card-body card-img p-2">
                                <img src="{{ url('/storage/'.$produk->image) }}"
                                    class="card-img-top img-responsive" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $produk->name }}</strong></h5>

                                <p class="card-text">Rp.
                                    {{ number_format($produk->price,0,",",".") }}
                                </p>
                                <p class="card-text">{{ $produk->category['name'] }}</p>
                                <p class="card-text">{{ $produk->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>







    <h2 class="mt-5 font-weight-bold">Layanan Kami</h2>
    <div class="content-layanan mt-5">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-7x fa-shipping-fast p-3"></i>
                        <h5 class="card-title font-weight-bold mt-2">Bebas Ongkir</h5>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-7x fa-check p-3"></i>
                        <h5 class="card-title font-weight-bold mt-2">Produk Original</h5>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-7x fa-user-shield p-3"></i>
                        <h5 class="card-title font-weight-bold mt-2">24/7 Keluhan Layanan</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
