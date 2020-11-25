@extends('layouts.app2')

@section('title','Produk Dashboard')

@section('content')

    <div class="card h-100">
        <div class="card-header">
            Produk
        </div>
        <div class="card-body">
            <a name="" id="" class="btn btn-primary mb-3" href="{{ route('tampiltambah.admin') }}" role="button">Tambah Produk</a>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
        </div>
    </div>

@endsection
