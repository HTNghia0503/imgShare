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

    Route::get('/post/{postId}', 'HomeController@detailPost')->name('detailPost');

    // Xử lý trong xem chi tiết Post
    Route::post('/save-post', 'PostController@savePost')->name('savePost'); // Lưu hình ảnh (Post) vào bộ sưu tập (Collection)
    Route::post('/like-post', 'PostController@likePost')->name('likePost'); // Like hình ảnh (Post)
    Route::post('/posts/{post}/comments', 'PostController@storeComment')->name('post.comments.store'); // Bình luận bài đăng (Post)

    // Image (Hình ảnh)
    // Route::get('/view-full-image/{postId}', 'PostController@viewFullImage')->name('viewFullImage');

    // Collection (Bộ sưu tập)
    Route::post('/create-collection', 'CollectionController@createCollection')->name('createCollection');
    Route::get('/get-collection', 'CollectionController@getCollection')->name('getCollection');

});
