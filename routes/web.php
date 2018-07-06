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

Auth::routes();

Route::get('/auth/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('/auth/authenticate', 'Auth\LoginController@authenticate')->name('auth.authenticate');

Route::get('/auth/singup', 'Auth\RegisterController@showRegistrationForm')->name('auth.signup');
Route::post('/auth/register', 'Auth\RegisterController@register')->name('auth.register');

Route::group(['prefix' => 'cms', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'Cms\CmsController@dashboard')->name('cms.dashboard');
});
