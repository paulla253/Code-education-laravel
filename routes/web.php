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

Auth::routes();

Route::get('/home', 'HomeController@index');

#pode acessar apenas quando estiver logado.
Route::group(['middleware'=>'auth'],function(){
    //não irá criar a rota show.
    Route::resource('categories','CategoriesController',['except' => 'show']);
    Route::resource('books','BooksController',['except' => 'show']);
    #agregar nomes as rotas filhas de trashed.
    Route::group(['prefix'=>'trashed','as'=>'trashed.'],function(){
        Route::resource('books','BooksTrashedController',['except' =>
            ['create','store','edit','destroy']]);
    });
});

