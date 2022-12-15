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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function(){
    //'guest'はapp/Http/Kernel.php→app/Http/Middleware/RedirectIfAuthenticated.phpに記載。リダイレクト先はデフォルトで指定あり。
    Route::namespace('Auth')->group(function(){
        Route::get('/register', 'Register\RegisterController@registerView')->name('registerView');
        Route::post('/register/post', 'RegisterController@registerPost')->name('registerPost');
        Route::get('/login', 'Login\LoginController@loginView')->name('loginView');
        Route::post('/login/post', 'LoginController@loginPost')->name('loginPost');
    });
});

Route::group(['middleware' => 'auth'], function(){
    Route::namespace('Admin')->group(function(){
        Route::namespace('Post')->group(function(){
            Route::get('/logout', 'LoginController@logout');
            Route::get('/top', 'PostsController@index')->name('top.show');
        });
        Route::namespace('BulletinBoard')->group(function(){
            Route::get('/bulletin_board/posts/{keyword?}', 'PostsController@show')->name('post.show');
            Route::get('/bulletin_board/input', 'PostsController@postInput')->name('post.input');
            Route::get('/bulletin_board/like', 'PostsController@likeBulletinBoard')->name('like.bulletin.board');
            Route::get('/bulletin_board/my_post', 'PostsController@myBulletinBoard')->name('my.bulletin.board');
            Route::post('/bulletin_board/create', 'PostsController@postCreate')->name('post.create');
            Route::post('/create/main_category', 'PostsController@mainCategoryCreate')->name('main.category.create');
            Route::post('/create/sub_category', 'PostsController@subCategoryCreate')->name('sub.category.create');
            Route::get('/bulletin_board/post/{id}', 'PostsController@postDetail')->name('post.detail');
            Route::post('/bulletin_board/edit', 'PostsController@postEdit')->name('post.edit');
            Route::get('/bulletin_board/delete/{id}', 'PostsController@postDelete')->name('post.delete');
            Route::post('/comment/create', 'PostsController@commentCreate')->name('comment.create');
            Route::post('/like/post/{id}', 'PostsController@postLike')->name('post.like');
            Route::post('/unlike/post/{id}', 'PostsController@postUnLike')->name('post.unlike');
        });
    });
});
