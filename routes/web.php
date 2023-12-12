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

Route::get('/about', 'App\Http\Controllers\WelcomeController@about')->name('about');


Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@postLogin');

    Route::get('/register', 'RegisterController@register')->name('register');
    Route::post('/register', 'RegisterController@postRegister');

    Route::get('/logout', 'AuthController@logout')->name('logout');
});

// Các route khi đăng nhập với quyền ADMIN
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/account', 'AdminController@manageAccount')->name('account');
    Route::get('/post', 'AdminController@managePost')->name('post');
    Route::get('/topic', 'AdminController@manageTopic')->name('topic');

    Route::get('/delete-account/{id}', 'AdminController@deleteAccount')->name('deleteAccount');
    Route::get('/delete-post-user/{id}', 'AdminController@deletePostUser')->name('deletePostUser');

    Route::get('/create-topic', 'AdminController@showCreateTopic')->name('showCreateTopic');
    Route::post('/create-topic', 'AdminController@createTopic')->name('createTopic');

    Route::get('/update-topic/{id}', 'AdminController@showUpdateTopic')->name('showUpdateTopic');
    Route::post('/update-topic/{id}', 'AdminController@updateTopic')->name('updateTopic');

});

// Các route khi đăng nhập với quyền USER
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'user', 'middleware' => 'user'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::get('/profile', 'ProfileController@profile')->name('profile');

    Route::get('/update/{id}', 'ProfileController@showUpdate')->name('update');
    Route::post('/update/{id}', 'ProfileController@update')->name('update');
    Route::patch('/update/{id}', 'ProfileController@update')->name('update');

    // Post (Bài đăng)
    Route::get('/create-post', 'PostController@create')->name('createPost');
    Route::post('/create-post', 'PostController@store')->name('storePost');

    Route::post('/update-post/{id}', 'PostController@updatePost')->name('updatePost');
    Route::get('/delete-post/{id}', 'PostController@deletePost')->name('deletePost');

    Route::get('/post/{postId}', 'PostController@detailPost')->name('detailPost');
    Route::get('/collection/{collectionId}', 'CollectionController@detailCollection')->name('detailCollection');

    // Xử lý trong xem chi tiết Post
    Route::post('/save-post', 'PostController@savePost')->name('savePost'); // Lưu hình ảnh (Post) vào bộ sưu tập (Collection)
    Route::post('/like-post', 'PostController@likePost')->name('likePost'); // Like hình ảnh (Post)
    Route::post('/posts/{post}/comments', 'PostController@storeComment')->name('post.comments.store'); // Bình luận bài đăng (Post)

    // Collection (Bộ sưu tập)
    Route::post('/create-collection', 'CollectionController@createCollection')->name('createCollection');
    Route::post('/update-collection/{id}', 'CollectionController@updateCollection')->name('updateCollection');
    Route::get('/delete-collection/{id}', 'CollectionController@deleteCollection')->name('deleteCollection');

    // Comment (Bình luận)
    Route::post('/update-comment/{id}/{postId}', 'PostController@updateComment')->name('updateComment');
    Route::get('/delete-comment/{id}/{postId}', 'PostController@deleteComment')->name('deleteComment');

});
