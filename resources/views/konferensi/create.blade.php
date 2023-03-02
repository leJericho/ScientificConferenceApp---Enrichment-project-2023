@extends('layout/aplikasi')

@section('konten')
<form method="post" action="/konferensi" >
  @csrf 
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Konferensi</label>
    <input type="text" class="form-control" name='nama' id="nama">
  </div>
  <div class="mb-3">
    <label for="singkatan" class="form-label">Singkatan Konferensi</label>
    <input type="text" class="form-control"  name='singkatan' id="singkatan">
  </div>
  <div class="mb-3">
    <label for="website" class="form-label">Website</label>
    <input type="url" class="form-control" placeholder="http://www.example.com" name='website' id="website">
  </div>
  <div class="mb-3">
    <label for="tempat" class="form-label">Tempat</label>
    <input type="text" class="form-control" name='tempat' id="tempat">
  </div>
  <div class="mb-3">
    <!-- <label for="tanggal" class="form-label">Bulan terjadi Konferensi</label> -->
    <!-- <input type="month" class="form-control" id="tanggal"> -->
    <label for="tanggal">Bulan Terjadi Konferensi</label>
    <select id="tanggal" name="tanggal">
        <option value="" selected disabled hidden>Choose here</option>
        <option value="Januari">Januari</option>
        <option value="saab">Febuari</option>
        <option value=  "Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="November">November</option>
        <option value="December">December</option>

    </select>
    
  </div>

  <div class="mb-3">
    <label for="topik" class="form-label">Topik Konferensi</label>
    <input type="textarea" class="form-control" name='topik' id="topik">
  </div>
  <div class="mb-3">
    <label for="penyelenggara" class="form-label">Penyelenggara</label>
    <input type="text" class="form-control" name='penyelenggara' id="penyelenggara">
  </div>
  <div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
  </div>
</form>


@endsection