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

Route::get('/','HomeController@index')->name('home');

Route::get('/timeline','DashboardController')->name('timeline');
Route::post('/logout','Auth\LoginController@logout')->middleware('auth')->name('logout');
Route::group(['middleware' => 'guest'], function (){
    Route::get('/login','Auth\LoginController@index')->name('login.form');
    Route::post('/login','Auth\LoginController@login')->name('login');
    Route::get('/register','Auth\RegisterController@index')->name('register.form');
    Route::post('/register','Auth\RegisterController@store')->name('register');
});

Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function (){
    Route::post('/','Postcontroller@store')->name('post.add');
    Route::post('/{post}/like','PostLikesController@store')->name('post.like');
});
