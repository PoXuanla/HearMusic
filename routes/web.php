<?php

use Illuminate\Support\Facades\Auth;
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

//Route::POST('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'MusicController@index')->name('home');
Route::get('/{name}',function(){
    return view('/personalPage/main');
})->name('personalPage');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
