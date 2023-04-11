<?php

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

//Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ

Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');
//フォロー・フォロワーリスト
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');
//ユーザー検索
Route::get('/user-search','FollowsController@userSearch');

//ログアウト
Route::get('/logout','Auth\LoginController@logout');
//投稿
Route::get('post/create-form', 'PostsController@createForm');
Route::post('/index', 'PostsController@index');
Route::get('/index', 'PostsController@index');
Route::get('post/create-form', 'PostsController@createForm');
Route::post('post/create', 'PostsController@create');
Route::get('post/{id}/update-form', 'PostsController@updateForm');
Route::post('post/update', 'PostsController@update');
Route::get('post/{id}/delete', 'PostsController@delete');
