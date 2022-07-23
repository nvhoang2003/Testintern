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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/'], function (){
    Route::get('signup',[
        'uses' => 'TestController@form',
        'as' => 'signup.form'
    ]);

    Route::post('signup',[
        'uses' => 'TestController@signup',
        'as' => 'signup.signup'
    ]);

    Route::get('login',[
        'uses' => 'loginController@login',
        'as' => 'login.form'
    ]);

    Route::post('login',[
        'uses' => 'loginController@signin',
        'as' => 'login.signin'
    ]);

    Route::get('update/{email}',[
        'uses' => 'UpdateController@edit',
        'as' => 'update.edit'
    ]);
    Route::post('update/{email}',[
        'uses' => 'UpdateController@update',
        'as' => 'update.update'
    ]);
});
