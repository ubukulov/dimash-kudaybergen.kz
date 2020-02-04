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

Route::get('/', 'IndexController@welcome')->name('home');
Route::get('/post/{alias}/{id}', 'PostController@show')->name('post.show');
Route::get('/articles', 'ArticleController@index')->name('articles');
Route::get('/article/{alias}/{id}', 'ArticleController@show')->name('article.show');
Route::get('/singer', 'SingerController@index')->name('singer');
Route::get('/singer/{alias}/{id}', 'SingerController@show')->name('singer.show');
Route::get('/clip/{alias}/{id}', 'ClipController@show')->name('clip.show');
Route::get('/page/{alias}', 'PageController@show')->name('page.show');

# Comments
Route::post('/comment/create', 'CommentController@create');
Route::post('/comments', 'CommentController@index');

# Search
Route::post('/search', 'SearchController@search')->name('search');
