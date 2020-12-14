@extends('layouts.app')
@section('title',$produk->name)

@section('content')

<div class="container">

    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Produk Detail</li>
        </ol>
      </nav>

    <div class="row mt-5">
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
                    <tr>
                        <th scope="row">Jumlah</th>
                        <td>:</td>
                        <td>
                            <form action="{{ route('tambahkeranjang.index',['slug'=>$produk->slug]) }}" method="post">
                                @csrf
                                <input type="text" class="form-control text-center" name="total" value="1">
                        </td>
                    </tr>
                </tbody>
            </table>
            @unlessrole('admin')
                <button type="submit" class="btn btn-primary w-100 mt-2"> <i class="fa fa-shopping-cart mr-2"></i> Tambah
                Keranjang</button>
            @endunlessrole
            </form>

            <nav class="mt-5">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
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
        </div>
    </div>

</div>

@endsection
