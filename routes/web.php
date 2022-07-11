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

// Route::get('hello',function () {
//     return '<html><body><h1>Hello</h1><p>This is sample page.</p></body></html>';
//  });

//  Route::get('hello', 'HelloController@index');
//  Route::get('hello/other', 'HelloController@other');

// Route::get('hello', 'HelloController@index');

// Route::post('hello', 'HelloController@post');

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
//--------実習用----------
Route::get('Jissyu', 'JissyuController@index');

Route::get('jissyu3', 'Jissyu3_1Controller@index');
Route::post('jissyu3', 'Jissyu3_1Controller@post');

Route::get('jissyu3_2', 'Jissyu3_2Controller@index');
Route::post('jissyu3_2', 'Jissyu3_2Controller@post');

//-----------kouka-----
Route::get('kouka1_1', 'Kouka1_1Controller@index');

Route::get('kouka1_2', 'Kouka1_2Controller@index');
Route::post('kouka1_2', 'Kouka1_2Controller@post');


Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/show', 'HelloController@show');

Route::get('person', 'PersonController@index');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

Route::get('board', 'BoardController@index');

Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');

Route::get('hello/rest', 'HelloController@rest');

Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');