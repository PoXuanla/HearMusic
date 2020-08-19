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
    Route::get('/{name}',function(){
        return view('/personalPage/main');
    })->name('personalPage');
    Route::get('accounts/manage/profile/edit/',function(){
       return view('/accountSetting/basicInformation/main');
    })->name('accountSetting');
});


//Route::get('/home', 'HomeController@index')->name('home');
