@extends('layout/aplikasi')
@section('konten')
    @if (Auth::user()->isAdmin == 1)
    <!-- <a href="/user/create" class="btn btn-primary form-group mx-sm-3 mb-2" >+Tambah data</a> -->
    @endif
    <form action="/user" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="search" class="form-control" id="search" name="search">
        </div>
    </form>
    <table class="table" style="table-layout: fixed">
        <thead>
            <tr>
                <th style="width:15%;">Nama</th>
                <th style="width:55%;">Email</th>
                <th style="width:8%;">Role</th>
                <th style="width:8%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    @if ($item->isAdmin == 0)
                    <!-- <td>{{ $item->nama }}</td> -->
                    <td>{{ $item->name }}</td>
                    <!-- <td>{{ $item->website }}</td> -->
                    <td>{{ $item->email }}</td>
                    @if ($item->isAdmin == 1)
                    <td>Admin</td>
                    @endif
                    @if ($item->isAdmin == 0)
                    <td>User</td>
                    @endif
                    <!-- <td><a class='btn btn-secondary btn-sm' href='{{ url('/user/'.$item->id) }}'>Detail</td> -->
                    @if (Auth::user()->isAdmin == 1)
                    <!-- <td><a class='btn btn-warning btn-sm' href='{{ url('/user/'.$item->id.'/edit') }}'>Edit</td> -->
                    <td><form onsubmit="return confirm('Apakah yakin mau hapus data?')" class='d-inline'action="{{ '/user/'.$item->id }}" method='post'>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Del</button>

                    </form></td>
                    @endif
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

    @endsection
    