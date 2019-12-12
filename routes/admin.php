<?php

Route::get('/admin/login', 'Admin\AuthController@login')->name('admin.login');
Route::post('/admin/login', 'Admin\AuthController@authenticate')->name('admin.authenticate');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web', 'admin']], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    # Posts
    Route::get('/posts', 'PostController@index')->name('admin.post.index');
    Route::get('/post/create', 'PostController@create')->name('admin.post.create');
    Route::get('/post/{id}/edit', 'PostController@edit')->name('admin.post.edit');
    Route::post('/post/store', 'PostController@store')->name('admin.post.store');
    Route::post('/post/{id}/update', 'PostController@update')->name('admin.post.update');
	Route::get('/post/{id}/delete', 'PostController@destroy')->name('admin.post.delete');

    # Clips
    Route::get('/clips', 'ClipController@index')->name('admin.clip.index');
    Route::get('/clip/create', 'ClipController@create')->name('admin.clip.create');
    Route::get('/clip/{id}/edit', 'ClipController@edit')->name('admin.clip.edit');
    Route::post('/clip/store', 'ClipController@store')->name('admin.clip.store');
    Route::post('/clip/{id}/update', 'ClipController@update')->name('admin.clip.update');

    # Concerts
    Route::get('/concerts', 'ConcertController@index')->name('admin.concert.index');
    Route::get('/concert/create', 'ConcertController@create')->name('admin.concert.create');
    Route::get('/concert/{id}/edit', 'ConcertController@edit')->name('admin.concert.edit');
    Route::post('/concert/store', 'ConcertController@store')->name('admin.concert.store');
    Route::post('/concert/{id}/update', 'ConcertController@update')->name('admin.concert.update');

    # Pages
    Route::get('/pages', 'PageController@index')->name('admin.page.index');
    Route::get('/page/create', 'PageController@create')->name('admin.page.create');
    Route::get('/page/{id}/edit', 'PageController@edit')->name('admin.page.edit');
    Route::post('/page/store', 'PageController@store')->name('admin.page.store');
    Route::post('/page/{id}/update', 'PageController@update')->name('admin.page.update');

    # Articles
    Route::get('/articles', 'ArticleController@index')->name('admin.article.index');
    Route::get('/article/create', 'ArticleController@create')->name('admin.article.create');
    Route::get('/article/{id}/edit', 'ArticleController@edit')->name('admin.article.edit');
    Route::post('/article/store', 'ArticleController@store')->name('admin.article.store');
    Route::post('/article/{id}/update', 'ArticleController@update')->name('admin.article.update');

    # Singer
    Route::get('/singers', 'SingerController@index')->name('admin.singer.index');
    Route::get('/singer/create', 'SingerController@create')->name('admin.singer.create');
    Route::get('/singer/{id}/edit', 'SingerController@edit')->name('admin.singer.edit');
    Route::post('/singer/store', 'SingerController@store')->name('admin.singer.store');
    Route::post('/singer/{id}/update', 'SingerController@update')->name('admin.singer.update');

    # Comments
    Route::get('/comments', 'CommentController@index')->name('admin.comment.index');
    Route::get('/comment/{id}/active', 'CommentController@active')->name('admin.comment.active');
    Route::get('/comment/{id}/noactive', 'CommentController@noActive')->name('admin.comment.noactive');
});
