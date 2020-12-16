@extends('layouts.app2')

@section('title','Pengguna')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Pengguna
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <a name="" id="" class="btn btn-primary mb-3" href="{{ route('tampiltambahpengguna.admin') }}" role="button">+ Tambah
                    Pengguna</a>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <form action="{{ route('cariuser.admin') }}" method="get">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari Pengguna..." value{{ old('cari') }}>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $no => $data)
                <tr>
                    <th scope="row">{{ $pengguna->firstItem() + $no }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->address }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('detailuser.admin',['slug'=>$data->slug]) }}" role="button"><i class="fa fa-search"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pengguna->onEachSide(2)->links() }}
    </div>
</div>

@endsection
