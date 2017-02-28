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


Route::get('/blogs/{userId}', 'PostsController@viewBlogs');

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/category/{categ}', 'PostsController@showCateg');

Route::post('/blogs', 'PostsController@updateBlog');
Route::get('/posts/update/{blogId}', 'PostsController@viewUpdate');
Route::post('/blogspublish', 'PostsController@updatePublishBlog');


Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::post('/posts/{post}/comments/visitors', 'CommentsController@storeVisitor');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/login/admin', [
		'uses' => 'AdminController@authenticate',
		'as'   => 'login.admin'
	]);

Route::get('/login/admin/author', 'AdminController@showAuthor');
Route::get('/login/admin/blog', 'AdminController@showBlog');
Route::post('/userenable', 'AdminController@updateUser');
Route::post('/adminpublish', 'AdminController@updateBlog');

Route::get('auth/google', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\RegisterController@handleProviderCallback');
