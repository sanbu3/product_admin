<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');


//Test
Route::get('/test', function () {
    return view('test\axiostest');
});


///test/axios控制器
Route::get('/test/axios', [App\Http\Controllers\TestController::class, 'axios'])->name('test.axios');
Auth::routes();//是一个路由组，里面包含了登录、注册、退出等路由，这些路由都是在Auth\LoginController.php中定义的
//登录、注册 //Auth::routes();
Route::get('/login', function () {
    return view('userdefined.login');
})->name('login');
Route::get('/register', function () {
    return view('userdefined.register');
})->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//商品
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
//接收搜索关键字
Route::get('/products/search/{keyword}', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
//购物车

//auth中间件
Route::middleware(['auth'])->group(function () {
    Route::get('/products/item/{id}', [App\Http\Controllers\ProductController::class, 'item'])->name('products.item');
});
