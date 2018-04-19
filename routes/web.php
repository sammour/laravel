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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/coucou/{name}', 'BonjourController@niddecoucous');

Route::get('/', 'ArticleController@index')->name('ArticlesIndex')->middleware('auth');
Route::get('/articles', 'ArticleController@index')->name('ArticlesIndex')->middleware('auth');
Route::get('/articles/show/{id}', 'ArticleController@show')->name('ArticlesShow')->middleware('auth');
Route::get('/articles/add', 'ArticleController@add')->middleware('auth');
Route::post('/articles/add', 'ArticleController@store')->middleware('auth');

Route::get('/articles/edit/{id}', 'ArticleController@edit')->middleware('auth')->name('ArticlesEdit');
Route::post('/articles/edit/{id}', 'ArticleController@update')->middleware('auth');

Route::delete('/articles/delete/{id}', 'ArticleController@delete')->middleware('auth')->name('ArticlesDelete');

Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('tag', 'TagController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
