@extends('layout/aplikasi')

@section('konten')
    <form action="/mykonferensi" method="GET" class="form-inline">
        <!-- <div class="form-group mx-sm-3 mb-2">
            <input type="search" class="form-control" id="search" name="search">
        </div> -->
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
                    <!-- <td>{{ $item->conference->nama }}</td> -->
                    <td>{{ $item->conference->singkatan }}</td>
                    <!-- <td>{{ $item->conference->website }}</td> -->
                    <td>{{ $item->conference->tempat }}</td>
                    <td>{{ $item->conference->tanggal }}</td>
                    <td>{{ $item->conference->topik }}</td>
                    <!-- <td>{{ $item->conference->penyelenggara }}</td> -->
                    <td><a class='btn btn-secondary btn-sm' href='{{ url('/mykonferensi/'.$item->id) }}'>Detail</td>
                    <td><form onsubmit="return confirm('Apakah yakin mau hapus data?')" class='d-inline'action="{{ '/mykonferensi/'.$item->id }}" method='post'>
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger btn-sm" type="submit">Del</button>

                    </form></td>

                    
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

@endsection