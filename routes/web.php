<?php

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
    if(session('username') !== null) {
        return redirect("home");
    }
    else {
        return view('welcome');
    }
});

Route::get("/login", "LoginController@login")->name("login");
Route::get("/logout", "LoginController@logout")->name("logout");
Route::post("/login", "LoginController@checkLogin");

Route::get('/register', "RegisterController@index")->name('register');
Route::post('/register', "RegisterController@create");
Route::get('/register/email/{query}', "RegisterController@checkEmail");
Route::get("/register/username/{q}", "RegisterController@checkUsername");

Route::post('/post/like', 'LikeController@like')->name('post_like');
Route::post('/post/unlike', 'LikeController@unlike')->name('post_unlike');
Route::post('/post/fetch_like', 'LikeController@fetch_like')->name('post_fetch_like');

Route::post('/post/comments/upload', 'CommentController@upload')->name('post_comment_upload');
Route::post('/post/fetch_comments', 'CommentController@fetch_comments')->name('post_fetch_comments');

Route::get('/profilo', "App\Http\Controllers\ProfiloController@index")->name('profilo');
Route::get('/profilo/fetch_foto', "App\Http\Controllers\ProfiloController@fetch_foto")->name('fetch_foto');

Route::get('/cerca', "App\Http\Controllers\CercaController@index")->name('cerca');
Route::get('/cerca/{type}/{oggetto}', "App\Http\Controllers\CercaController@cerca")->name('cerca_fetch');
Route::Post('/cerca/carica/', "App\Http\Controllers\CercaController@download")->name('download');


Route::get('/home', "HomeController@index")->name('home');

Route::get('/feed', "FeedController@feed")->name("feed");
Route::get("/feed/checklike/{foto_id}", "FeedController@fetchlike")->name('checklike');
Route::get('/feed/email', "FeedController@fetch_email")->name("fetch_email");
