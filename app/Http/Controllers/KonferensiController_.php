<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Konferensi;
use App\Models\Konferensi as ModelsKonferensi;

class KonferensiController extends Controller
{
    //
    function index()
    {
        
       // $data = ModelsKonferensi::all();
       //$data = ModelsKonferensi::orderBy('nama', 'asc')->get();
       $data = ModelsKonferensi::orderBy('nama', 'asc')->paginate(1);
        return view('konferensi/index')->with('data', $data);

    }

    function detail($id){
      $data = ModelsKonferensi::where('id', $id)->first();
      return view('konferensi/detail')->with('data', $data);
      //return "<h1>saya konferensi dari controller dengan nama $nama </h1>";
    }

    function create(){

    }

    function delete(){
      
    }

}
