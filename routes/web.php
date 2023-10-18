<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@postLogin');

    Route::get('/register', 'RegisterController@register')->name('register');
    Route::post('/register', 'RegisterController@postRegister');
});

// Các route khi đăng nhập với quyền ADMIN
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/post', 'AdminController@managePost')->name('post');
    Route::get('/topic', 'AdminController@manageTopic')->name('topic');
});

// Các route khi đăng nhập với quyền USER
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'user', 'middleware' => 'user'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@profile')->name('profile');

    Route::get('/update', 'ProfileController@showUpdate')->name('update');

    // Post (Bài đăng)
    Route::get('/create-post', 'PostController@create')->name('createPost');
    Route::post('/create-post', 'PostController@store')->name('storePost');

    // Collection (Bộ sưu tập)
    Route::post('/create-collection', 'CollectionController@createCollection')->name('createCollection');
    Route::get('/get-collection', 'CollectionController@getCollection')->name('getCollection');

});
