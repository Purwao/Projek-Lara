<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Models\OrderDetail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tes', function () {
    return view('tes');
});

Route::get('/',[FrontController::class,'index']);

Route::get('/show/{id}',[FrontController::class,'show']);

Route::get('/register',[FrontController::class,'register']);

Route::get('/login', [FrontController::class,'login']);

Route::post('/postregister', [FrontController::class,'store']);

Route::post('/postlogin',[FrontController::class,'postlogin']);

Route::get('/logout', [FrontController::class,'logout']);

Route::get('/beli/{idmenu}',[CartController::class,'beli']);

Route::get('/cart',[CartController::class,'cart']);

Route::get('/hapus/{idmenu}',[CartController::class,'hapus']);

Route::get('/batal',[CartController::class,'batal']);

Route::get('tambah/{idmenu}',[CartController::class,'tambah']);

Route::get('kurang/{idmenu}',[CartController::class,'kurang']);

Route::get('/checkout',[CartController::class,'checkout']);

Route::get('/admin', [AuthController::class, 'index'] );

Route::get('admin/logout',[AuthController::class,'logout']);

Route::post('/admin/postlogin',[AuthController::class,'postlogin']);

Route::group(['prefix' => 'admin', 'middleware' =>['auth'] ] ,function(){

    Route::group(['Middleware' => ['CekLogin:admin']],function(){
        Route::resource('user',UserController::class);
    });

    Route::group(['Middleware' => ['CekLogin:kasir']],function(){
        Route::resource('order',OrderController::class);
    });

    Route::group(['Middleware' => ['CekLogin:manager']],function(){
        Route::resource('kategori',KategoriController::class);
        Route::resource('menu',MenuController::class);
        Route::resource('order',OrderController::class);
        Route::get('select',[MenuController::class,'select']);
        Route::post('postmenu/{idmenu}',[MenuController::class,'update']);
        Route::resource('orderdetail',OrderDetailController::class);
        Route::resource('pelanggan',PelangganController::class);
    });
});
