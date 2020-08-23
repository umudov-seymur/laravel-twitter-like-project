<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tweets', 301);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'TweetController@index')->name('home');

    // tweets and like action
    Route::group(['prefix' => 'tweets', 'as' => 'tweets.'], function () {
        Route::resource('/', 'TweetController')
            ->only('index', 'store', 'destroy')
            ->parameters(['' => 'tweet']);

        // tweet like or dislike
        Route::post('/{tweet}/like', 'TweetLikeController@store')->name('like.store');
        Route::delete('/{tweet}/like', 'TweetLikeController@destroy')->name('like.destroy');
    });

    // profile and follow action
    Route::group(['prefix' => 'profiles/{user:username}'], function () {
        Route::get('', 'ProfileController@show')->name('profile');

        // profile edit page
        Route::group(['middleware' => ['password.confirm', 'can:edit,user']], function () {
            Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
            Route::patch('/edit', 'ProfileController@update')->name('profile.update');
        });

        // follow controller
        Route::post('/follow', 'FollowController@store')->name('follow');
    });

    Route::get('/explore', 'ExploreController');
});

Auth::routes();
