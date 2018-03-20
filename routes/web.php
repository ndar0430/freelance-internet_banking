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
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {

    Route::resource('home', 'HomeController');


    Route::group(['middleware' => ['role:normal-user'], 'prefix' => 'check_balance'], function() {

        Route::get('/', ['uses' => 'BankAccountController@checkBalance', 'as' => 'bank.checkbalance']);
        Route::get('/create', ['uses' => 'BankAccountController@viewSendMoney', 'as' => 'bank.viewsendmoney']);
        Route::post('/create', ['uses' => 'BankAccountController@sendMoney', 'as' => 'bank.sendmoney']);
        
    
    
    });

    //Role
    Route::group(['middleware' => ['role:super_admin']], function() {
        Route::resource('roleuser', 'RoleUserController');
    });


    


    //registered user list
    Route::group(['middleware' => ['role:admin|super_admin'], 'prefix' => 'registered_users'], function() {
        Route::get('/', ['uses' => 'UserController@index', 'as' => 'users.list']);
        
        Route::get('/bank', ['uses' => 'BankAccountController@index', 'as' => 'bank.index']);
        Route::get('/create/{id}', ['uses' => 'BankAccountController@create', 'as' => 'bank.create']);
        Route::post('/create/{id}', ['uses' => 'BankAccountController@store', 'as' => 'bank.store']);
        Route::get('/edit/{id}', ['uses' => 'BankAccountController@edit', 'as' => 'bank.edit']);
        Route::post('/edit/{id}', ['uses' => 'BankAccountController@update', 'as' => 'bank.update']);

    
        
        
    });

    //unregistered user list
    Route::group(['middleware' => ['role:admin|super_admin'], 'prefix' => 'unregistered_users'], function() {
    Route::get('/', ['uses' => 'UserDetailsController@index', 'as' => 'signup.list']);

    //generate user id
    Route::get('/register/{id}', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register/{id}', 'Auth\RegisterController@register');

    });

    
});

//Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/register', ['uses' => 'UserDetailsController@create', 'as' => 'signup.create']);
Route::post('/register', ['uses' => 'UserDetailsController@store', 'as' => 'signup.store']);
