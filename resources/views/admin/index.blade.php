@extends('layout.main2')

@section('title','Dashboard Admin')

@section('body')

<div class="row">
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                User
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>2</h4>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                Pengguna
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>2</h4>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card" style="height: 10rem;">
            <div class="card-header">
                Total Pemesanan
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h4>2</h4>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="wrapper-order mt-5">
    <div class="card" style="height: 18rem;">
        <div class="card-header">
            Pemesanan Terbaru
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                        Title</cite></footer>
            </blockquote>
        </div>
    </div>
</div>

@endsection
