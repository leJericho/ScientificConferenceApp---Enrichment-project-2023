<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(Request $request)
    {
        
      if($request->has('search')){
        $data = ModelsUser::where('name','LIKE','%' .$request->search.'%')->orwhere('email','LIKE','%' .$request->search.'%')->paginate(5);
      }  else{
      
        $data = ModelsUser::orderBy('name', 'asc')->paginate(5);
      }
        return view('user/index')->with('data', $data);

    }

    function detail($id){
      $data = ModelsUser::where('id', $id)->first();
      return view('user/detail')->with('data', $data);
      //return "<h1>saya konferensi dari controller dengan nama $nama </h1>";
    }


    function create(){
      return view('user/create');
    }


    function store(Request $request){
      $request->validate([
        'name'=> 'required',
        'email'=> 'required|email|unique:users',
        'password' => 'required|min:6',
        'isAdmin' => 'required'
       

      ], [
        'name.required'=>'Email wajib diisi',
        'email.required'=>'Email wajib diisi',
        'email.email'=> 'Silahkan masukan email yang valid',
        'email.unique'=> 'Email sudah pernah dipakai, silakan pilih email yang lain',
        'password.required'=>'Password wajib diisi',
        'password.min'=>'Minimum password yang diizinkan adalah 6 karakter',
        'isAdmin.required' => 'Role wajib diisi',
        




      ]);
      $data = [
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>Hash::make($request->input('password')),
        'IsAdmin'=> $request->input('IsAdmin'),
        
      ];
      ModelsUser::create($data);
      return redirect('user');

    }

    function edit($id){
      
      $data = ModelsUser::where('id', $id)->first();
      return view('user/edit ')->with('data', $data);
      

    }

    function show($id){
      $data = ModelsUser::where('id', $id)->first();
      return view('user/detail')->with('data', $data);
    }

    function update(Request $request, $id){
      $request->validate([
        'name'=> 'required',
        'email'=> 'required|email|unique:users',
        'password' => 'required|min:6',
        'isAdmin' => 'required'

      ],
      [
        'name.required'=>'Email wajib diisi',
        'email.required'=>'Email wajib diisi',
        'email.email'=> 'Silahkan masukan email yang valid',
        'email.unique'=> 'Email sudah pernah dipakai, silakan pilih email yang lain',
        'password.required'=>'Password wajib diisi',
        'password.min'=>'Minimum password yang diizinkan adalah 6 karakter',
        'isAdmin.required' => 'Role wajib diisi',




      ]);

      $data = [
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>Hash::make($request->input('password')),
        'IsAdmin'=> $request->input('IsAdmin'),
      ];
      ModelsUser::where('id', $id)->update($data);
      return redirect('/user')->with('success','Berhasil melakukan update data');

    }

    public function destroy($id){
      ModelsUser::where('id', $id)->delete();
      return redirect('/user')->with('success', 'Berhasil melakukan delete data');
    }
}
