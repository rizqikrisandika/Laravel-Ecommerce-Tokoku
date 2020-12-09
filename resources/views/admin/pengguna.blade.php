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
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $no => $data)
                <tr>
                    <th scope="row">{{ $pengguna->firstItem() + $no }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="" role="button"><i class="fa fa-search"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pengguna->links() }}
    </div>
</div>

@endsection
