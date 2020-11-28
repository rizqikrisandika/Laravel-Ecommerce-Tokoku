@extends('layouts.app2')

@section('title','Pengguna')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Pengguna
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $pengguna)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pengguna->name }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="" role="button">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
