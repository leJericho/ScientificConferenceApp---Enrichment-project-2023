<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\User;
use App\Models\Konferensi;

class CartController extends Controller
{
    public function addToCart(Request $request){
      /*  $rules = Validator::make($request->all(),[
            'qty'=>['required','min:1','numeric']
        ]);
        $rules->validate(); */

        $konferensiid = $request->id;
        $userid = auth()->user()->id;
        $cart = Book::where('user_id',$userid)
                ->where('conference_id',$konferensiid)->first();
        if($cart === null){
            $cart = new Book();
            $cart->user_id = $userid;
            $cart->conference_id = $konferensiid;
            $cart->save();
            return redirect('/konferensi')->with('success', 'Konferensi Berhasil di save!');
        }
        else{
           // $cart->qty = $qty;
            $cart->save();
            return redirect('/konferensi')->with('success', 'Konferensi sudah ada!');
        }
      //  return redirect()->route('konferensi',['id'=>$konferensiid]);
    }

    public function delete($id){
      Book::where('id', $id)->delete();
      return redirect('/mykonferensi/index')->with('success', 'Berhasil melakukan delete data');
    }

    function index(Request $request)
    {

     // $tanggal = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','December'];

      if($request->has('search')){
        $data = Book::where('singkatan','LIKE','%' .$request->search.'%')->where(Book::where('user_id','LIKE',auth()->user()->id))->orwhere('topik','LIKE','%' .$request->search.'%')->where(Book::where('user_id','LIKE',auth()->user()->id))->paginate(5);
      }  else{
       // =$data = ModelsKonferensi::all();
       //$data = ModelsKonferensi::orderBy('nama', 'asc')->get();
      // $data = Book::where('user_id','LIKE',auth()->user()->id)->orderByRaw('Field(tanggal,Januari,Febuari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,December)')->paginate(5);
      $data = Book::where('user_id','LIKE',auth()->user()->id)->paginate(5);
      //data = Book::where('user_id','LIKE',auth()->user()->id)->join("Konferensi","conference.id","=","Book.conference_id")->orderByRaw('Field(tanggal,Januari,Febuari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,December)')->paginate(5);
      }
        return view('mykonferensi/index')->with('data', $data);
       
       
       
       


        
     
    }

    function detail($id){
      $data = Book::where('id', $id)->first();
      return view('mykonferensi/detail')->with('data', $data);
      //return "<h1>saya konferensi dari controller dengan nama $nama </h1>";
    }
}
