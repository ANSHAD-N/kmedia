<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\content_controller;


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






Route::resource('news','App\Http\Controllers\content_controller');




Route::get('detail/{id}', [content_controller::class,'show_detail']);
Route::get('/', [content_controller::class,'show']);
Route::get('/video', [content_controller::class,'showv']);
Route::get('/trending', [content_controller::class,'showtrending']);
Route::get('addview/{id}', [content_controller::class,'addview']);
Route::get('addvote/{id}', [content_controller::class,'addvote']);
Route::post('/search', [content_controller::class,'search']);




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::post('/submit', [content_controller::class,'store']);
    Route::post('update/{id}', [content_controller::class,'update']);
    Route::post('/submitad', [content_controller::class,'storead']);
    Route::get('/home', [content_controller::class,'adminshow'])->name('home');
    Route::get('/admin', [content_controller::class,'adminshow'])->name('admin');
    Route::get('admin_detail/{id}', [content_controller::class,'show_detailadmin']);
    Route::get('del/{id}', [content_controller::class,'destroy']);
    Route::get('/ad', function () {
        return view('news.ad');
    });
    Route::get('/upload', function () {
        return view('news.upload');
    });
    Route::get('/register', function () {
        return view('register');
    });
});





