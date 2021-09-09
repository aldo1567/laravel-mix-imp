<?php

use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});

Route::get('/to-do-list','ToDoListController@index');
Route::post('/to-do-list','ToDoListController@store');
Route::get('/to-do-list/{id}','ToDoListController@show');
Route::get('/to-do-list/{id}/edit','ToDoListController@edit');
Route::patch('/to-do-list/{id}/','ToDoListController@update');
Route::delete('/to-do-list/{id}/','ToDoListController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
