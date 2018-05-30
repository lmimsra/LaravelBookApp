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
use Illuminate\Support\Facades\Route;

//ダッシュボード表示
Route::get('/', 'BooksController@index');

//本を追加
Route::post('/books','BooksController@registration');

//本を削除
Route::delete('/book/{book}','BooksController@delete');

//本の編集画面へ遷移
Route::post('/book/edit/{book}','BooksController@goToUpdate');

//本を更新
Route::post('/book/update', 'BooksController@update');

Route::post('/pass','TestRestController@restPost');

Auth::routes();

Route::get('/', 'BooksController@index')->name('home');
