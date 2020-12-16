@extends('layouts.app2')

@section('title','Detail Pengguna')

@section('content')

<div class="card h-100">
    <div class="card-header">
        Detail Pengguna
    </div>
    <div class="card-body">

                <table class="table mt-2">
                    <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>:</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kota</th>
                            <td>:</td>
                            <td>{{ $user->city }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kode Pos</th>
                            <td>:</td>
                            <td>{{ $user->zipcode }}</td>
                        </tr>
                    </tbody>
                </table>


                <a name="" id="" class="btn btn-warning" href="" role="button"><i class="fa fa-pen"></i></a>
                        <form class="d-inline" action="" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="" class="btn btn-danger"  role="button"><i class="fa fa-trash"></i></button>
                        </form>
            </div>


    </div>
</div>

@endsection
