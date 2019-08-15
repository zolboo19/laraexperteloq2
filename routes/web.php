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


//posts
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::post('posts/create', 'PostController@store')->name('posts.store');


//products
Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::post('products/create', 'ProductController@store')->name('products.store');

//books
Route::get('books', 'BookController@index')->name('books.index');
Route::get('books/create', 'BookController@create')->name('books.create');
Route::post('books/create', 'BookController@store')->name('books.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
