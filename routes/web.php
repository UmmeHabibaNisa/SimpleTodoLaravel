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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', 'TodoController@show') ;
Route::get('addnew', 'TodoController@create') ;
Route::post('storetodo', 'TodoController@store') ;
Route::get('edit/{todo}', 'TodoController@edit') ;
Route::post('update/{todo}', 'TodoController@update') ;
Route::get('delete/{todo}', 'TodoController@destroy') ;
Route::post('checkbox', 'TodoController@checkBox') ;





