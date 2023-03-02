@extends('layout/aplikasi')

@section('konten')
    <div class="form-group mx-sm-3 mb-2">
    @if (Auth::user()->isAdmin == 1)
    <a href="/konferensi/create" class="btn btn-primary mb-3">+Tambah data konferensi</a>
    @endif
    </div>
    <form action="/konferensi" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="search" class="form-control" id="search" name="search">
        </div>
    </form>
    <table class="table" style="table-layout: fixed">
        <thead>
            <tr>
                <!-- <th>Nama</th> -->
                <th style="width:10%;">Nama</th>
                <!-- <th>Website</th> -->
                <th style="width:10%;">Lokasi</th>
                <th style="width:10%;">Tanggal</th>
                <th style="width:50%;">Topik</th>
                <!-- <th>Penyelenggara</th> -->
                <th style="width:7%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <!-- <td>{{ $item->nama }}</td> -->
                    <td>{{ $item->singkatan }}</td>
                    <!-- <td>{{ $item->website }}</td> -->
                    <td>{{ $item->tempat }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->topik }}</td>
                    <!-- <td>{{ $item->penyelenggara }}</td> -->
                    <td><a class='btn btn-secondary btn-sm' href='{{ url('/konferensi/'.$item->id) }}'>Detail</td>
                    @if (Auth::user()->isAdmin == 1)
                    <td><a class='btn btn-warning btn-sm' href='{{ url('/konferensi/'.$item->id.'/edit') }}'>Edit</td>
                    <td><form onsubmit="return confirm('Apakah yakin mau hapus data?')" class='d-inline'action="{{ '/konferensi/'.$item->id }}" method='post'>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Del</button>

                    </form></td>
                    @endif
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

    @endsection