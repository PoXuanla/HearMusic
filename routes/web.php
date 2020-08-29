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

Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::namespace('AccountSetting')->prefix('accounts/manage')->group(function(){
        Route::prefix('/profile')->group(function(){
            Route::GET('/','BasicInformationController@index')->name('profile.index');
            Route::PUT('/','BasicInformationController@update')->name('profile.update');
        });
    });
    Route::namespace('Manage')->prefix('music/manage')->group(function(){
        Route::GET('/likes/',function(){
            return view('/musicFavorites/myMusicFavorites/likes/main');
        })->name('manage.like');
        Route::resource('songs', 'MusicController');

    });
    Route::get('/{account}','PersonalFileController@index')->name('personalPage');
//    Route::get('/{name}',function(){
//        return view('/personalPage/main');
//    })->name('personalPage');
});

//Route::get('/home', 'HomeController@index')->name('home');
