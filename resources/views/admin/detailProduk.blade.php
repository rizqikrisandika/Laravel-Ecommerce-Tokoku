@extends('layouts.app2')

@section('title','Detail Produk')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Detail Produk
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <img src="{{ url('/storage/'.$produk->image) }}" style="width: 100%; height: 30vw; padding: 0"
                    class="card-img-top" alt="...">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">


                <h3>{{ $produk->name }}</h3>
                <h5>Rp. {{ number_format($produk->price,0,",","." )}}</h5>

                <table class="table mt-2">
                    <tbody>
                        <tr>
                            <th scope="row">Dibuat</th>
                            <td>:</td>
                            <td>{{ $produk->user['name'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>:</td>
                            <td>
                                @if ($produk->quantity == 0)
                                <span class="badge badge-danger">Habis</span>
                                @else
                                <span class="badge badge-success">Tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Kategori</th>
                            <td>:</td>
                            <td>{{ $produk->category['name'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Stok</th>
                            <td>:</td>
                            <td>{{ $produk->quantity }}</td>
                        </tr>
                    </tbody>
                </table>

                <nav class="mt-5">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container">
                            <p class="pt-2">
                                {{ $produk->desc }}
                            </p>
                        </div>
                    </div>
                </div>

                <a name="" id="" class="btn btn-warning" href="{{ route('tampilubahproduk.admin',['slug'=>$produk->slug]) }}" role="button"><i class="fa fa-pen"></i></a>
                        <form class="d-inline" action="{{ route('hapusproduk.admin',['slug'=>$produk->slug]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="" class="btn btn-danger"  role="button"><i class="fa fa-trash"></i></button>
                        </form>
            </div>
        </div>


    </div>
</div>

@endsection
