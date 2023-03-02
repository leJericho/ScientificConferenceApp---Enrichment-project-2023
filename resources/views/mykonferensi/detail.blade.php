@extends('layout/aplikasi')

@section('konten')
    <div>
    <a href='/mykonferensi/index' class="btn btn-secondary mb-3">Kembali</a>
    
    
        @csrf
        <div class="card mb-5" style="width: 70rem;">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold border-bottom  pb-3">{{ $data->conference->nama }} ({{ $data->conference->singkatan }})</h3>

                        <h5 class="card-title font-weight-bold">Website</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary"><a href="{{$data->website}}">{{$data->conference->website}}</a></p>

                        <h5 class="card-title font-weight-bold ">Tempat</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->conference->tempat}}</p>
            

                        <h5 class="card-title font-weight-bold ">Bulan Pelaksanaan</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->conference->tanggal}}</p>

                        <h5 class="card-title font-weight-bold ">Topik</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->conference->topik}}</p>

                        <h5 class="card-title font-weight-bold ">Penyelenggara</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->conference->penyelenggara}}</p>

                        <td><form onsubmit="return confirm('Apakah yakin mau hapus data?')" class='d-inline'action="{{ '/mykonferensi/'.$data->id }}" method='post'>
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger btn-sm" type="submit">Del</button>

                    </form></td>
                                             
                    </div>
                </div>
            </div>
         
        </div>
    
    </div>
    

@endsection
    