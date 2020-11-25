@extends('layouts.app')
@section('title','Tokoku')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                    <div class="wrapper-top">
                        <h2>SELAMAT DATANG</h2>
                        <h2>DI TOKOKU.</h2>
                        <h4>Promo Akhir Tahun</h4>
                        <h4>Diskon 70%</h4>
                        <a name="" id="" class="btn btn-primary btn-top mt-3 w-100" href="{{ route('produk.index') }}"
                            role="button">Belanja Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h2 class="mt-5">Produk Terbaru</h2>
    <div class="content-produk-terbaru mt5">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card shadow" style="width: 15rem; border:none;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card shadow" style="width: 15rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card" style="width: 15rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card" style="width: 15rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-5">Layanan Kami</h2>
    <div class="content-layanan mt-5">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bebas Ongkir</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Produk Original</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">24/7 Keluhan Layanan</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
