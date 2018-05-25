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

//for loading controllers
Route::get('/', 'Home@index');

Route::post('/feed', ['as' => 'feed', 'uses' => 'Home@feed']);

Route::post('/comments', ['as' => 'comments', 'uses' => 'Home@comments']);

Route::get('/post/{url?}', ['as' => 'post', 'uses' => 'Home@post']);

Route::get('/profile/{id?}', ['as' => 'profile', 'uses' => 'Users@profile']);

Route::get('/user/pending', ['as' => 'profile', 'uses' => 'Users@pending']);
Route::get('/user/logout', ['as' => 'logout', 'uses' => 'Users@logout']);

// for admins
Route::get('/admin/pending', ['as' => 'profile', 'uses' => 'Admin@pending']);
Route::post('/admin/approve_post', ['as' => 'approve_post', 'uses' => 'Admin@approve_post']);

////////////////////////////////
///
///
Route::get('/predictions', ['as' => 'predictions', 'uses' => 'Home@predictions']);

//sign up routes
Route::get('/signup', ['as' => 'signup', 'uses' => 'Signup@index']);
Route::post('/signup', ['as' => 'signup', 'uses' => 'Signup@signup']);

/////login routes
Route::get('/login', ['as' => 'login', 'uses' => 'Login@index']);
Route::post('/login', ['as' => 'login', 'uses' => 'Login@login']);

/////create post
Route::get('/create/post', ['as' => 'create/post', 'uses' => 'Create@post']);
Route::post('/create/post', ['as' => 'create/post', 'uses' => 'Create@post_post']);

//database testing routes
Route::get('/accounts', ['as' => 'accounts', 'uses' => 'Users@accounts']);



