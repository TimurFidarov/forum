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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});




Route::get('/threads', 'ThreadsController@index');
Route::get('/threads/create', 'ThreadsController@Create');
Route::get('/threads/{channel}', 'ThreadsController@index');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::group(['middleware' => 'auth'], function() {
    Route::post('/threads', 'ThreadsController@store');
    Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
});



