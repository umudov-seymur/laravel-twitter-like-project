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

Route::redirect('/', '/tweets', 301);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'TweetController@index')->name('home');
    Route::resource('tweets', 'TweetController');

    Route::group(['prefix' => 'profiles'], function () {
        Route::get('/{user}-{name?}', 'ProfileController@show')->name('profile');
        Route::post('/{user}/follow', 'FollowController@store')->name('follow');
    });
});

Auth::routes();
