<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Konferensi;
use App\Models\Konferensi as ModelsKonferensi;

class KonferensiController extends Controller
{
    //
    function index(Request $request)
    {

      if($request->has('search')){
        $data = ModelsKonferensi::where('singkatan','LIKE','%' .$request->search.'%')->orwhere('topik','LIKE','%' .$request->search.'%')->paginate(5);
      }  else{
       // $data = ModelsKonferensi::all();
       //$data = ModelsKonferensi::orderBy('nama', 'asc')->get();
       $data = ModelsKonferensi::orderBy('nama', 'asc')->paginate(5);
      }
        return view('konferensi/index')->with('data', $data);
     
    }

    function detail($id){
      $data = ModelsKonferensi::where('id', $id)->first();
      return view('konferensi/detail')->with('data', $data);
      //return "<h1>saya konferensi dari controller dengan nama $nama </h1>";
    }


    function create(){
      return view('konferensi/create');
    }


    function store(Request $request){
      $request->validate([
        'nama'=>'required',
        'singkatan'=>'required',
        'website'=>'required',
        'tempat'=>'required',
        'tanggal'=>'required',
        'topik'=>'required',
        'penyelenggara'=>'required'

      ], [
        'nama.required' => 'Nama wajib diisi',
        'singkatan.required' => 'Singkatan wajib diisi',
        'website.required' => 'Website wajib diisi',
        'tempat.required' => 'Tempat wajib diisi',
        'tanggal.required' => 'Bulan wajib diisi',
        'topik.required' => 'Topik wajib diisi',
        'penyelenggara.required' => 'penyelenggara wajib diisi',




      ]);
      $data = [
        'nama'=> $request->input('nama'),
        'singkatan'=> $request->input('singkatan'),
        'website'=> $request->input('website'),
        'tempat'=> $request->input('tempat'),
        'tanggal'=> $request->input('tanggal'),
        'topik'=> $request->input('topik'),
        'penyelenggara'=> $request->input('penyelenggara')
      ];
      ModelsKonferensi::create($data);
      return redirect('konferensi');

    }

    function edit($id){
      
      $data = ModelsKonferensi::where('id', $id)->first();
      return view('konferensi/edit ')->with('data', $data);
      

    }

    function show($id){
      $data = ModelsKonferensi::where('id', $id)->first();
      return view('konferensi/detail')->with('data', $data);
    }

    function update(Request $request, $id){
      $request->validate([
        'nama'=>'required',
        'singkatan'=>'required',
        'website'=>'required',
        'tempat'=>'required',
        'tanggal'=>'required',
        'topik'=>'required',
        'penyelenggara'=>'required'

      ],
      [
        'nama.required' => 'Nama wajib diisi',
        'singkatan.required' => 'Singkatan wajib diisi',
        'website.required' => 'Website wajib diisi',
        'tempat.required' => 'Tempat wajib diisi',
        'tanggal.required' => 'Bulan wajib diisi',
        'topik.required' => 'Topik wajib diisi',
        'penyelenggara.required' => 'penyelenggara wajib diisi',




      ]);

      $data = [
        'nama'=> $request->input('nama'),
        'singkatan'=> $request->input('singkatan'),
        'website'=> $request->input('website'),
        'tempat'=> $request->input('tempat'),
        'tanggal'=> $request->input('tanggal'),
        'topik'=> $request->input('topik'),
        'penyelenggara'=> $request->input('penyelenggara')
      ];
      ModelsKonferensi::where('id', $id)->update($data);
      return redirect('/konferensi')->with('success','Berhasil melakukan update data');

    }

    public function destroy($id){
      ModelsKonferensi::where('id', $id)->delete();
      return redirect('/konferensi')->with('success', 'Berhasil melakukan delete data');
    }

}
