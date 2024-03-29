<?php


Route::get('/', 'TasksController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', 'TasksController');
    //Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
