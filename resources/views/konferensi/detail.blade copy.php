@extends('layout/aplikasi')

@section('konten')
    <div>
        <a href='/konferensi' class="btn btn-secondary">Kembali</a>
        <h1> {{ $data->nama }} ({{ $data->singkatan }}) </h1>
        <p>
            <b>Nama</b> {{$data->nama}}
        </p>
        <p>
            <b>Website</b> <a href="{{$data->website}}">{{$data->website}}</a> 
            
           
        </p>
        <p>
            <b>Tempat</b> {{$data->tempat}}
        </p>
        <p>
            <b>Bulan Pelaksanaan</b> {{$data->tanggal}}
        </p>
        <p>
            <b>Topik</b> {{$data->topik}}
        </p>
        <p>
            <b>Penyelenggara</b> {{$data->penyelenggara}}
        </p>

    </div>
    

@endsection
    