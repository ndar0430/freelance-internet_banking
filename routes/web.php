<?php

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
    return view('welcome');
});

//Register User ID
Route::group(['prefix' => 'admin'], function() {

    //user list
    Route::group(['prefix' => 'users'], function() {
    Route::get('/list', ['uses' => 'UserDetailsController@index', 'as' => 'signup.list']);
    });

    //generate user id
    Route::get('/register/{id}', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register/{id}', 'Auth\RegisterController@register');
});

//Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/register', ['uses' => 'UserDetailsController@create', 'as' => 'signup.create']);
Route::post('/register', ['uses' => 'UserDetailsController@store', 'as' => 'signup.store']);
