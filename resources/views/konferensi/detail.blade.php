@extends('layout/aplikasi')

@section('konten')
    <div>
    <a href='/konferensi' class="btn btn-secondary mb-3">Kembali</a>
    
    <form action="{{ route("addToCart",['id'=>$data->id]) }}" method="POST">
        @csrf
        <div class="card mb-5" style="width: 70rem;">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold border-bottom  pb-3">{{ $data->nama }} ({{ $data->singkatan }})</h3>

                        <h5 class="card-title font-weight-bold">Website</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary"><a href="{{$data->website}}">{{$data->website}}</a></p>

                        <h5 class="card-title font-weight-bold ">Tempat</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->tempat}}</p>
            

                        <h5 class="card-title font-weight-bold ">Bulan Pelaksanaan</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->tanggal}}</p>

                        <h5 class="card-title font-weight-bold ">Topik</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->topik}}</p>

                        <h5 class="card-title font-weight-bold ">Penyelenggara</h5>
                        <p class="card-text border-bottom  pb-3 text-secondary">{{$data->penyelenggara}}</p>
                        
                      
                        @if (auth()->user()->isAdmin == 0)
                        <div class="form-group row">
                            <div class="col col-lg-2">
                                <input type="submit" class="btn" style="background-color: #ffc107" value="Save Conference">
                            </div>
                        </div>
                        @endif
                       
                     
                        
                    </div>
                </div>
            </div>
         
        </div>
    </form>
    </div>
    

@endsection
    