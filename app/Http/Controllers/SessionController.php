<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=> 'required',
            'password' => 'required'
        ],
        [
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]
        );

        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];


        if(Auth::attempt($infologin)){

            return redirect('home')->with('success', 'Berhasil login');
           // return 'sukses';


        }else{

            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
            

            
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }

    function register(){
        return view('sesi/register');
    }
    function create(Request $request){
        Session::flash('name', $request->email);
        Session::flash('email', $request->email);
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:6'
        ],
        [
            'name.required'=>'Email wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=> 'Silahkan masukan email yang valid',
            'email.unique'=> 'Email sudah pernah dipakai, silakan pilih email yang lain',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Minimum password yang diizinkan adalah 6 karakter'
        ]
        );

        $data =[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'isAdmin' => '0'
            
        ];
        User::create($data);

        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];


        if(Auth::attempt($infologin)){

            return redirect('home')->with('success', 'Berhasil regster');
           // return 'sukses';


        }else{

            return redirect('sesi/register')->withErrors('Data yang diberikan tidak valid');
            

            
        }

    }
}
