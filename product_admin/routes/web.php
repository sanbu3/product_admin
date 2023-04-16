<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Auth::routes(); //登录、注册

//Test
Route::get('/test', function () {
    return view('test\axiostest');
});
//searchresult
Route::get('/s', function () {
    return view('products.searchresult');
});
///test/axios控制器
Route::get('/test/axios', [App\Http\Controllers\TestController::class, 'axios'])->name('test.axios');

//登录、注册
Route::get('/login', function () {
    return view('userdefined.login');
})->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//商品
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
//接收搜索关键字
Route::get('/products/search/{keyword}', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
//购物车
