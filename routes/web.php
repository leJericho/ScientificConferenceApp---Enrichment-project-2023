<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\KonferensiController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/test', function (){
    return view('welcome');
});

Route::get('/faq', function (){
    return view('/FAQs/FAQs');
});

Route::get('/home', function (){
    return view('/Home/home');
})->middleware('isLogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isGuest');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isGuest');
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isGuest');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isGuest');

Route::resource('konferensi', KonferensiController::class)->middleware('isLogin');
Route::resource('user', App\Http\Controllers\UserController::class)->middleware('isAdmin');


Route::post('/addToCart/{id}',[App\Http\Controllers\CartController::class,'addToCart'])->name('addToCart');


//Route::resource('mykonferensi', CartController::class)->middleware('isLogin');
Route::get('/mykonferensi', function (){
    return redirect('/mykonferensi/index');
});
Route::get('mykonferensi/index', [CartController::class, 'index'])->middleware('OnlyUser');
Route::get('mykonferensi/{id}', [CartController::class, 'detail'])->middleware('OnlyUser');
Route::post('mykonferensi/{id}', [CartController::class, 'delete'])->middleware('OnlyUser');

//Route::get('konferensi/{id}', [CartController::class, 'detail']);