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

//test
Route::get('/test', 'PostsController@test');

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ

Route::get('/top','PostsController@index');
//プロフィール
Route::get('/profile','UsersController@profile');
Route::post('/update_prof','UsersController@profUp');

//フォロー・フォロワーリスト
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');
//ユーザー検索
Route::get('/user-search','FollowsController@userSearch');
Route::get('/now-searching','FollowsController@userSearch');
//フォローする
Route::post('/following','FollowsController@follow');
//リムる
Route::post('/removing','FollowsController@remove');
//フレンドプロフィール
Route::post('/my_friend', 'FollowsController@friendsProf');
Route::get('/my_friend', 'FollowsController@friendsProf');
//プロフィール:フォローする
Route::post('/p-following','FollowsController@followProf');
//プロフィール:リムる
Route::post('/p-removing','FollowsController@removeProf');

//ログアウト
Route::get('/logout','Auth\LoginController@logout');
//投稿
Route::post('/index', 'PostsController@index');
Route::get('/index', 'PostsController@index');
Route::post('post/create', 'PostsController@create');
Route::post('post/update', 'PostsController@update');
Route::get('post/{id}/delete', 'PostsController@delete');
